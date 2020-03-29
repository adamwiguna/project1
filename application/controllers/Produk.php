<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['judul'] = 'Tambah Produk';
        $this->load->view('header', $data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function tambahProduk()
    {
        $data['judul'] = 'Tambah Produk';
        $data['kategori'] = ['Kitchen', 'Laundry', 'Housekeeping', 'Pool Chemical'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('produk/tambahproduk', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambah');
            $this->Produk_model->tambah();
            redirect('produk/listproduk');
        }
    }

    public function listProduk()
    {
        $data['judul'] = 'List Produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('header', $data);
        $this->load->view('produk/listproduk', $data);
        $this->load->view('footer');
    }

    public function hapus($kode)
    {
        $this->Produk_model->hapus($kode);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('produk/listproduk');
    }

    public function ubahProduk($kode)
    {
        $data['judul'] = 'Ubah Produk';
        $data['produk'] = $this->Produk_model->getDataByKode($kode);
        //mengirim data untuk menampilkan combobox/pilihan tapi harus ada tabel di db dan buat model nya
        //$data['level'] = $this->Level_model->getAllLevel();

        $data['kategori'] = ['Kitchen', 'Laundry', 'Housekeeping', 'Pool Chemical'];


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');
        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('produk/ubahproduk', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Diubah');
            $this->Produk_model->ubah();
            redirect('produk/listproduk');
        }
    }
}
