<?php

class Stok_model extends CI_Model
{
    public function getAllRiwayatStok()
    {
        $this->db->order_by('Dibuat', 'DESC');
        $query = $this->db->get('tbstok');
        return $query->result_array();
    }

    public function getDataByKode($kode)
    {
        return $this->db->get_where('tbstok', ['KodeStok' => $kode])->row_array();
    }

    public function getDataByKodeDetail($kode)
    {
        return $this->db->get_where('tbstok', ['KodeDetail' => $kode])->row_array();
    }

    public function tambahStok()
    {
        $data = [
            "KodeProduk" => $this->input->post('produk', true),
            "Jumlah" => $this->input->post('jumlah', true),
            "Tanggal" => $this->input->post('tanggal', true),
            "Tipe" => 'Masuk',
            "Keterangan" => $this->input->post('keterangan', true),
        ];
        $this->db->insert('tbstok', $data);

        $this->updateStok($this->input->post('produk', true), (int) $this->input->post('jumlah', true));
    }

    public function stokKeluar($data)
    {
        // $data = [
        //     "KodeProduk" => $this->input->post('produk', true),
        //     "Jumlah" => $this->input->post('jumlah', true),
        //     "Tanggal" => $this->input->post('tanggal', true),
        //     "Tipe" => 'Keluar',
        //     "Keterangan" => $this->input->post('keterangan', true),
        // ];
        $this->db->insert('tbstok', $data);

        $this->updateStok($data['KodeProduk'], $data['Jumlah']);
    }

    public function updateStok($kode, $jumlah)
    {
        echo $jumlah;
        $stok['produk'] = $this->Produk_model->getDataByKode($kode);
        $stok = $stok['produk']['Stok'] + ($jumlah);
        echo $stok;
        $stok = [
            "Stok" => $stok
        ];
        $this->db->where('KodeProduk', $kode);
        $this->db->update('tbproduk', $stok);
    }

    public function hapusRiwayat($kode)
    {
        $riwayat['stok'] = $this->Stok_model->getDataByKode($kode);
        $this->updateStok($riwayat['stok']['KodeProduk'], (-$riwayat['stok']['Jumlah']));
        $this->db->where('KodeStok', $kode);
        $this->db->delete('tbstok');
    }
}
