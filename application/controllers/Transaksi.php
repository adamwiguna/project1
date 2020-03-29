<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['judul'] = 'Tambah User';
        $this->load->view('header', $data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function buatTransaksi()
    {
        $data['judul'] = 'Buat Transaksi';
        $data['user'] = $this->User_model->getAllUser();
        $this->form_validation->set_rules('kode', 'Kode Transaksi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/buattransaksi', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->Transaksi_model->buatTransaksi();
            $kode = $this->Transaksi_model->getKodeByNo($this->input->post('kode', true));
            redirect('transaksi/tambahproduk/' . $kode);
        }
    }

    public function tambahProduk($kode)
    {
        $data['judul'] = 'Pilih Produk';
        $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/pilihproduk', $data);
            $this->load->view('footer');
        } else {
            $this->Transaksi_model->tambahProduk();
            redirect('transaksi/tambahproduk/' . $kode);
        }
    }

    public function simpanTransaksi($kode)
    {
        $this->Transaksi_model->simpanTransaksi($kode);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('transaksi/listpesanan');
    }

    public function listPesanan()
    {
        $data['judul'] = 'List Pesanan';
        $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
        $data['belum'] = $this->Transaksi_model->getAllTransaksiByStatus('Belum Selesai');
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByStatus('Menunggu Pembayaran');
        $this->load->view('header', $data);
        $this->load->view('transaksi/listtransaksi', $data);
        $this->load->view('footer');
    }

    public function hapustransaksi($kode)
    {
        $this->Transaksi_model->hapusTransaksi($kode);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('transaksi/listpesanan');
    }
}
