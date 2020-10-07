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
        $this->db->join('tbproduk', 'tbproduk.KodeProduk = tbdetailtransaksi.KodeProduk');
        $query = $this->db->get('tbdetailtransaksi');
        return $query->result_array();
    }

    public function getAllTransaksi()
    {
        $this->db->order_by('StatusSimpan ASC, tbtransaksi.StatusBayar ASC, StatusKirim ASC');
        // $this->db->join('tbpembayaran', 'tbpembayaran.KodeTransaksi = tbtransaksi.KodeTransaksi');
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getAllTransaksiBelum()
    {
        $this->db->order_by('StatusSimpan ASC, tbtransaksi.StatusBayar ASC, StatusKirim ASC');
        $this->db->where('StatusBayar', NULL);
        $this->db->or_where('StatusKirim', NULL);
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getCountOrder()
    {
        $this->db->select('max(TotalBayar) as order');
        // $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        // $this->db->order_by('TglOrder ASC');
        $query = $this->db->get('tbtransaksi');
        return $query->row_array();
    }

    public function getAllTransaksiByStatus($status)
    {
        $this->db->where('StatusTransaksi', $status);
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getAllTransaksiByBayar()
    {
        $this->db->where('StatusBayar', NULL);
        $this->db->where('StatusSimpan', SQL_NO_NULLS);
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getAllTransaksiByKirim()
    {
        $this->db->where('StatusKirim', NULL);
        $this->db->where('StatusSimpan', SQL_NO_NULLS);
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }
    public function getAllTransaksiBySelesai()
    {
        $this->db->where('StatusKirim', SQL_NO_NULLS);
        $this->db->where('StatusSimpan', SQL_NO_NULLS);
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
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

    public function getKodeByDetail($kodedetail)
    {
        $this->db->select('KodeTransaksi');
        return  $this->db->get_where('tbdetailtransaksi', ['KodeDetail' => $kodedetail])->row()->KodeTransaksi;
    }


    public function hapusTransaksi($kode)
    {
        $detail = $this->getAllProdukByKodeTransaksi($kode);
        foreach ($detail as $d) {
            $riwayat['stok'] = $this->Stok_model->getDataByKodeDetail($d['KodeDetail']);
            $this->Stok_model->hapusRiwayat($riwayat['stok']['KodeStok']);
        };
        $this->db->where('KodeTransaksi', $kode);
        $this->db->delete('tbtransaksi');
    }

    public function hapusDetailTransaksi($kode)
    {
        $this->db->where('KodeDetail', $kode);
        $this->db->delete('tbdetailtransaksi');
    }

    public function buatTransaksi()
    {
        $kodetransaksi = '' . $this->input->post('no', true) . '' . $this->input->post('kode', true);
        $data = [
            "NoTransaksi" => $kodetransaksi,
            "KodeUser" => $this->input->post('nama', true),
            "TglOrder" => $this->input->post('tanggal', true),
            "StatusTransaksi" => 'Belum Selesai',
            "NoUrut" => $this->input->post('no', true),
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

        $this->db->where('KodeTransaksi', $kode);
        $transaksi = $this->db->get('tbtransaksi')->row_array();

        $total = 0;
        foreach ($totalbayar as $t) {
            $total = $total + $t['TotalBayar'];
            $data = [
                "KodeProduk" => $t['KodeProduk'],
                "Jumlah" => (-$t['Jumlah']),
                "Tanggal" => $transaksi['TglOrder'],
                "Tipe" => 'Keluar',
                "KodeDetail" => $t['KodeDetail'],
                "Keterangan" => $transaksi['NoTransaksi'],
            ];
            $this->Stok_model->stokKeluar($data);
        }
        $this->db->where('KodeTransaksi', $kode);
        $data = [
            "TotalBayar" => $total,
            "StatusTransaksi" => 'Menunggu Pembayaran',
            "StatusSimpan" => 'Sudah',
        ];

        $this->db->update('tbtransaksi', $data);
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
