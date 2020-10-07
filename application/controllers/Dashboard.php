<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Produk_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Pengiriman_model');
        $this->load->model('Stok_model');
        $this->load->model('Laporan_model');
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['lappenjualan'] = $this->Laporan_model->getLaporanPenjualan();
        $data['lapbarang'] = $this->Laporan_model->getLaporanBarang();
        $data['totalpendapatan'] = $this->Laporan_model->getTotalPendapatan();
        $data['totalpiutang'] = $this->Laporan_model->getTotalPiutang();
        $data['stokkurang'] = $this->Laporan_model->getStokKurang();
        $data['order'] = $this->Laporan_model->getCountOrder();
        $this->load->view('header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }
}
