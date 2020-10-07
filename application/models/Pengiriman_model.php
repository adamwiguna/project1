<?php

class Pengiriman_model extends CI_Model
{
    public function buatPengiriman()
    {
        $data = [
            "KodeTransaksi" => $this->input->post('kode', true),
            "TglKirim" => $this->input->post('tanggal', true),
            "Pengirim" => $this->input->post('pengirim', true),
            "Penerima" => $this->input->post('penerima', true),
            "BuktiKirim" => "nophoto.jpg",
        ];
        if (@$_FILES['bukti']['name'] != null) {
            $data['BuktiKirim'] = $this->upload->data('file_name');
        }
        $this->db->insert('tbkirim', $data);

        $this->db->where('KodeTransaksi', $this->input->post('kode', true));
        $data = [
            "StatusTransaksi" => 'Sudah Kirim',
            "StatusKirim" => 'Sudah',
        ];

        $this->db->update('tbtransaksi', $data);
    }

    public function getPengirimanByKode($kode)
    {
        return $this->db->get_where('tbkirim', ['KodeTransaksi' => $kode])->row_array();
    }

    public function konfirmasi($kode)
    {
        $this->db->where('KodeTransaksi', $this->input->post('kode', true));
        $data = [
            "StatusTransaksi" => 'Siap Dikirim'
        ];

        $this->db->update('tbtransaksi', $data);
    }
}
