<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Putrichemical extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Produk_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Stok_model');
    }

    public function index()
    {
        $data['judul'] = 'Beranda';
        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/beranda', $data);
        $this->load->view('pelanggan/templates/footer');
        // $this->load->view('pelanggan/index', $data);
    }


    public function login()
    {
        $data['judul'] = 'Login';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/login', $data);
        $this->load->view('pelanggan/templates/footer', $data);
    }

    public function daftar()
    {
        $data['judul'] = 'Login';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/daftar', $data);
        $this->load->view('pelanggan/templates/footer', $data);
    }

    public function produk()
    {
        $data['judul'] = 'Produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/produk', $data);
        $this->load->view('pelanggan/templates/footer', $data);
    }
}
