<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Stok_model');
        $this->load->model('Transaksi_model');
    }

    public function tambahStok()
    {
        $data['judul'] = 'Tambah Stok';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['user'] = $this->User_model->getAllUser();
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('stok/tambahstok', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->Stok_model->tambahStok();
            redirect('stok/riwayatstok/');
        }
    }

    public function riwayatStok()
    {
        $data['judul'] = 'Riwayat Stok';
        $data['stok'] = $this->Stok_model->getAllRiwayatStok();
        $this->load->view('header', $data);
        $this->load->view('stok/riwayatstok', $data);
        $this->load->view('footer');
    }

    public function hapusriwayatstok($kode)
    {
        $data['riwayat'] = $this->Stok_model->getDataByKode($kode);
        $this->Stok_model->hapusRiwayat($kode);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('stok/riwayatstok/');
    }
}
