<?php

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Produk_model');
    }

    public function getAllProdukByKodeTransaksi($kode)
    {
        $this->db->where('KodeTransaksi', $kode);
        $query = $this->db->get('tbdetailtransaksi');
        return $query->result_array();
    }

    public function getAllTransaksi()
    {
        $this->db->group_by('NoTransaksi');
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getAllTransaksiByStatus($status)
    {
        $this->db->where('StatusTransaksi', $status);
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function hapusTransaksi($kode)
    {
        $this->db->where('KodeTransaksi', $kode);
        $this->db->delete('tbtransaksi');
    }

    public function buatTransaksi()
    {
        $data = [
            "NoTransaksi" => $this->input->post('kode', true),
            "KodeUser" => $this->input->post('nama', true),
            "TglOrder" => $this->input->post('tanggal', true),
            "StatusTransaksi" => 'Belum Selesai'
        ];
        $this->db->insert('tbtransaksi', $data);
    }


    public function tambahProduk()
    {
        $this->db->where('KodeProduk', $this->input->post('produk'));
        $a = $this->db->get('tbproduk')->row_array();
        $totalharga = ((int) $a["Harga"]) * ((int) $this->input->post('jumlah', true));
        var_dump($totalharga);
        $data = [
            "KodeTransaksi" => $this->input->post('kode', true),
            "KodeProduk" => $this->input->post('produk', true),
            "Jumlah" => $this->input->post('jumlah', true),
            "TotalBayar" => $totalharga
        ];
        $this->db->insert('tbdetailtransaksi', $data);
    }

    public function simpanTransaksi($kode)
    {

        $this->db->where('KodeTransaksi', $kode);
        $totalbayar = $this->db->get('tbdetailtransaksi')->result_array();
        var_dump($totalbayar);
        $total = 0;
        foreach ($totalbayar as $t) {
            $total = $total + $t['TotalBayar'];
        }
        $this->db->where('KodeTransaksi', $kode);
        $data = [
            "TotalBayar" => $total,
            "StatusTransaksi" => 'Menunggu Pembayaran'
        ];

        $this->db->update('tbtransaksi', $data);
    }

    public function getKodeByNo($no)
    {
        $this->db->select('KodeTransaksi');
        return $this->db->get_where('tbtransaksi', ['NoTransaksi' => $no])->row()->KodeTransaksi;
    }

    public function getTransaksiByKode($kode)
    {
        return $this->db->get_where('tbtransaksi', ['KodeTransaksi' => $kode])->row_array();
    }


    public function ubah()
    {
        $data = [
            "Username" => $this->input->post('username', true),
            "Password" => $this->input->post('password', true),
            "NamaLengkap" => $this->input->post('nama', true),
            "Alamat" => $this->input->post('alamat', true),
            "Telepon" => $this->input->post('telepon', true),
            "Email" => $this->input->post('email', true),
            "Level" => $this->input->post('level', true),
            "Foto" => $this->input->post('foto', true),
        ];

        $this->db->where('KodeUser', $this->input->post('kode'));
        $this->db->update('tbuser', $data);
    }
}
