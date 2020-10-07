<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Produk_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Stok_model');
        $this->load->model('Laporan_model');
    }

    public function lihatLaporanPenjualan()
    {
        $data['judul'] = 'Penjualan';
        $data['transaksi'] = $this->Laporan_model->getLaporanPenjualan();
        $data['filter'] = $this->Laporan_model->getLaporanPenjualan();
        $data['totalpendapatan'] = $this->Laporan_model->getTotalPendapatan();
        $data['belum'] = $this->Transaksi_model->getAllTransaksiByStatus('Belum Selesai');
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByBayar();
        $data['konfirmasi'] = $this->Transaksi_model->getAllTransaksiByStatus('Konfirmasi Pembayaran');
        $data['siapdikirim'] = $this->Transaksi_model->getAllTransaksiByKirim();
        $data['selesai'] = $this->Transaksi_model->getAllTransaksiBySelesai();
        $this->load->view('header', $data);
        $this->load->view('laporan/lappenjualan', $data);
        $this->load->view('footer');
    }
    public function lihatLaporanPenjualanfilter()
    {
        $data['judul'] = 'Penjualan';
        $data['filter'] = $this->Laporan_model->getLaporanPenjualan();
        $data['transaksi'] = $this->Laporan_model->getLaporanPenjualanFilter();
        $data['totalpendapatan'] = $this->Laporan_model->getTotalPenjualanFilter();
        $data['belum'] = $this->Transaksi_model->getAllTransaksiByStatus('Belum Selesai');
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByBayar();
        $data['konfirmasi'] = $this->Transaksi_model->getAllTransaksiByStatus('Konfirmasi Pembayaran');
        $data['siapdikirim'] = $this->Transaksi_model->getAllTransaksiByKirim();
        $data['selesai'] = $this->Transaksi_model->getAllTransaksiBySelesai();
        $this->load->view('header', $data);
        $this->load->view('laporan/lappenjualan', $data);
        $this->load->view('footer');
    }

    public function lihatLaporanBarang()
    {
        $data['judul'] = 'Barang Terjual';
        $data['filter'] = $this->Laporan_model->getLaporanPenjualan();
        $data['transaksi'] = $this->Laporan_model->getLaporanBarang();
        $this->load->view('header', $data);
        $this->load->view('laporan/lapbarang', $data);
        $this->load->view('footer');
    }
    public function lihatLaporanBarangFilter()
    {
        $data['judul'] = 'Barang Terjual';
        $data['filter'] = $this->Laporan_model->getLaporanPenjualan();
        $data['transaksi'] = $this->Laporan_model->getLaporanBarangFilter();
        $this->load->view('header', $data);
        $this->load->view('laporan/lapbarang', $data);
        $this->load->view('footer');
    }

    public function lihatLaporanKeuangan()
    {
        $data['judul'] = 'Keuangan';
        $data['pendapatan'] = $this->Laporan_model->getLaporanPendapatan();
        $data['totalpendapatan'] = $this->Laporan_model->getTotalPendapatan();
        $data['piutang'] = $this->Laporan_model->getLaporanPiutang();
        $data['totalpiutang'] = $this->Laporan_model->getTotalPiutang();
        $this->load->view('header', $data);
        $this->load->view('laporan/lapkeuangan', $data);
        $this->load->view('footer');
    }
}
