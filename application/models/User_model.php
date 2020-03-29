<?php

class User_model extends CI_Model
{
    public function getAllUser()
    {
        $query = $this->db->get('tbuser');
        return $query->result_array();
    }

    public function hapus($kode)
    {
        $this->db->where('KodeUser', $kode);
        $this->db->delete('tbuser');
    }

    public function tambah()
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
        $this->db->insert('tbuser', $data);
    }

    public function getDataByKode($kode){
        return $this->db->get_where('tbuser',['KodeUser' => $kode])->row_array();
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
