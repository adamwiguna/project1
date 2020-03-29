<?php

class Produk_model extends CI_Model
{
    public function getAllProduk()
    {
        $query = $this->db->get('tbproduk');
        return $query->result_array();
    }

    public function getDataByKode($kode)
    {
        return $this->db->get_where('tbproduk', ['KodeProduk' => $kode])->row_array();
    }

    public function tambah()
    {
        $data = [
            "KategoriProduk" => $this->input->post('kategori', true),
            "NamaProduk" => $this->input->post('nama', true),
            "Satuan" => $this->input->post('satuan', true),
            "Harga" => $this->input->post('harga', true),
            "Stok" => $this->input->post('stok', true),
            "Keterangan" => $this->input->post('keterangan', true),
            "Foto" => $this->input->post('foto', true)
        ];
        $this->db->insert('tbproduk', $data);
    }

    public function hapus($kode)
    {
        $this->db->where('KodeProduk', $kode);
        $this->db->delete('tbproduk');
    }

    public function ubah()
    {
        $data = [
            "KategoriProduk" => $this->input->post('kategori', true),
            "NamaProduk" => $this->input->post('nama', true),
            "Satuan" => $this->input->post('satuan', true),
            "Harga" => $this->input->post('harga', true),
            "Stok" => $this->input->post('stok', true),
            "Keterangan" => $this->input->post('keterangan', true),
            "Foto" => $this->input->post('foto', true)
        ];

        $this->db->where('KodeProduk', $this->input->post('kode'));
        $this->db->update('tbproduk', $data);
    }
}
