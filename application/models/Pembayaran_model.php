<?php

class Pembayaran_model extends CI_Model
{
    public function buatPembayaran()
    {
        $data = [
            "KodeTransaksi" => $this->input->post('kode', true),
            "NoTransaksi" => $this->input->post('no', true),
            "NoRek" => $this->input->post('norek', true),
            "AtasNama" => $this->input->post('atasnama', true),
            "NamaBank" => $this->input->post('bank', true),
            "JumlahBayar" => $this->input->post('bayar', true),
            "BuktiBayar" => $this->input->post('bukti', true),
            "TglBayar" => $this->input->post('tanggal', true),
        ];
        if (@$_FILES['bukti']['name'] != null) {
            $data['BuktiBayar'] = $this->upload->data('file_name');
        }
        $this->db->insert('tbpembayaran', $data);

        $this->db->where('KodeTransaksi', $this->input->post('kode', true));
        $data = [
            "StatusTransaksi" => 'Konfirmasi Pembayaran'
        ];

        $this->db->update('tbtransaksi', $data);
    }

    public function getPembayaranByKode($kode)
    {
        return $this->db->get_where('tbpembayaran', ['KodeTransaksi' => $kode])->row_array();
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
