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
        $this->load->model('Pembayaran_model');
        $this->load->model('Pengiriman_model');
        $this->load->model('Stok_model');
    }

    public function index()
    {
        $data['judul'] = 'Tambah User';
        $this->load->view('header', $data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function detailTransaksi($kode)
    {
        $data['judul'] = 'Detail Transaksi';
        $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        $data['pembayaran'] = $this->Pembayaran_model->getPembayaranByKode($kode);
        $data['pengiriman'] = $this->Pengiriman_model->getPengirimanByKode($kode);
        $this->load->view('header', $data);
        $this->load->view('transaksi/detailtransaksi', $data);
        $this->load->view('footer');
    }

    public function buatTransaksi()
    {
        $data['judul'] = 'Buat Transaksi';
        $data['user'] = $this->User_model->getAllUser();
        $this->form_validation->set_rules('no', 'no Transaksi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/buattransaksi', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->Transaksi_model->buatTransaksi();
            $kode = $this->Transaksi_model->getKodeByNo($this->input->post('no', true) . $this->input->post('kode', true));
            $this->session->set_userdata('Halaman', 'tambahproduk');
            redirect('transaksi/pilihproduk/' . $kode);
        }
    }

    public function pilihProduk($kode)
    {
        $this->session->set_userdata('Halaman', 'tambahproduk');
        redirect('transaksi/pilihprodukhal/' . $kode);
        // $data['judul'] = 'Pilih Produk';
        // $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        // $data['produk'] = $this->Produk_model->getAllProduk();
        // $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        // if ($this->session->userdata('Halaman') != 'tambahproduk') {
        //     redirect('transaksi/listpesanan');
        // }
        // $this->session->unset_userdata('Halaman');
        // $this->load->view('header', $data);
        // $this->load->view('transaksi/pilihproduk', $data);
        // $this->load->view('footer');
    }

    public function pilihProdukHal($kode)
    {
        $data['judul'] = 'Pilih Produk';
        $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        if ($this->session->userdata('Halaman') != 'tambahproduk') {
            redirect('transaksi/listpesanan');
        }
        $this->session->unset_userdata('Halaman');
        $this->load->view('header', $data);
        $this->load->view('transaksi/pilihproduk', $data);
        $this->load->view('footer');
    }

    public function tambahProduk($kode)
    {
        $data['judul'] = 'Pilih Produk';
        $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);

        $this->session->set_userdata('Halaman', 'tambahproduk');
        // if ($this->session->userdata('Halaman') != 'tambahproduk') {
        //     redirect('transaksi/buattransaksi');
        // }
        // $this->session->unset_userdata('Halaman');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {
            //$this->session->set_userdata('Halaman', 'tambahproduk');
            // $this->load->view('header', $data);
            // $this->load->view('transaksi/pilihproduk', $data);
            // $this->load->view('footer');
            redirect('transaksi/pilihproduk/' . $kode);
        } else {
            $this->Transaksi_model->tambahProduk();
            redirect('transaksi/pilihproduk/' . $kode);
        }
    }

    public function hapusdetailtransaksi($kodedetail)
    {
        $kode = $this->Transaksi_model->getKodeByDetail($kodedetail);
        $this->Transaksi_model->hapusDetailTransaksi($kodedetail);
        $this->session->set_userdata('Halaman', 'tambahproduk');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('transaksi/pilihprodukhal/' . $kode);
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
        $data['transaksi'] = $this->Transaksi_model->getAllTransaksiBelum();
        $data['belum'] = $this->Transaksi_model->getAllTransaksiByStatus('Belum Selesai');
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByBayar();
        $data['konfirmasi'] = $this->Transaksi_model->getAllTransaksiByStatus('Konfirmasi Pembayaran');
        $data['siapdikirim'] = $this->Transaksi_model->getAllTransaksiByKirim();
        $data['selesai'] = $this->Transaksi_model->getAllTransaksiBySelesai();
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



    public function pembayaran()
    {
        $data['judul'] = 'Pembayaran';
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByStatus('Menunggu Pembayaran');
        $data['user'] = $this->User_model->getAllUser();
        $this->form_validation->set_rules('kode', 'Kode Transaksi', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/pembayaran/pembayaran', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $kode = $this->input->post('kode', true);
            redirect('transaksi/buatpembayaran/' . $kode);
        }
    }

    public function buatPembayaran($kode)
    {
        $this->session->set_userdata('Halaman', 'pembayaran');
        redirect('transaksi/buatpembayaranhal/' . $kode);
        // $data['judul'] = 'List Pesanan';
        // $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        // $data['produk'] = $this->Produk_model->getAllProduk();
        // $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        // $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByStatus('Menunggu Pembayaran');
        // $data['user'] = $this->User_model->getAllUser();
        // $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
        // // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('header', $data);
        //     $this->load->view('transaksi/pembayaran/buatpembayaran', $data);
        //     $this->load->view('footer');
        // } else {
        //     $config['upload_path']          = './uploads/bukti/';
        //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //     $config['max_size']             = 2048;
        //     $config['file_name']             = 'buktibayar-' . date('ymd') . '-' . date('(his)') . '-' . substr(md5(rand()), 0, 10);
        //     $this->load->library('upload', $config);
        //     //  $this->input->post('bukti') = $this->upload->data('file_name');
        //     if (@$_FILES['bukti']['name'] != null) {
        //         if (!$this->upload->do_upload('bukti')) {
        //             echo "Gagal";
        //         } else {
        //             $this->session->set_flashdata('flash', 'Ditambahkan');
        //             $this->Pembayaran_model->buatPembayaran();
        //             redirect('transaksi/listpesanan/');
        //         }
        //     } else {
        //         $this->session->set_flashdata('flash', 'Ditambahkan');
        //         $this->Pembayaran_model->buatPembayaran();
        //         redirect('transaksi/listpesanan/');
        //     }
        // }
    }
    public function buatPembayaranHal($kode)
    {
        if ($this->session->userdata('Halaman') != 'pembayaran') {
            redirect('transaksi/listpesanan');
        }
        $this->session->unset_userdata('Halaman');
        $data['judul'] = 'Pembayaran';
        $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByStatus('Menunggu Pembayaran');
        $data['user'] = $this->User_model->getAllUser();
        $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/pembayaran/buatpembayaran', $data);
            $this->load->view('footer');
        } else {
            $config['upload_path']          = './uploads/bukti/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']             = 'buktibayar-' . date('ymd') . '-' . date('(his)') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);
            //  $this->input->post('bukti') = $this->upload->data('file_name');
            if (@$_FILES['bukti']['name'] != null) {
                if (!$this->upload->do_upload('bukti')) {
                    echo "Gagal";
                } else {
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    $this->Pembayaran_model->buatPembayaran();
                    redirect('transaksi/listpesanan/');
                }
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');
                $this->Pembayaran_model->buatPembayaran();
                redirect('transaksi/listpesanan/');
            }
        }
    }

    public function simpanPembayaran($kode)
    {
        $this->Pembayaran_model->buatpembayaran();
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('transaksi/listpesanan');
    }

    public function buatPengiriman($kode)
    {
        $this->session->set_userdata('Halaman', 'pengiriman');
        redirect('transaksi/buatpengirimanhal/' . $kode);
        // $data['judul'] = 'List Pesanan';
        // $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        // $data['produk'] = $this->Produk_model->getAllProduk();
        // $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        // $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByStatus('Menunggu Pembayaran');
        // $data['user'] = $this->User_model->getAllUser();
        // // $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
        // // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('header', $data);
        //     $this->load->view('transaksi/pengiriman/buatpengiriman', $data);
        //     $this->load->view('footer');
        // } else {
        //     $config['upload_path']          = './uploads/bukti/kirim';
        //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //     $config['max_size']             = 2048;
        //     $config['file_name']             = 'buktikirim-' . date('ymd') . '-' . date('(his)') . '-' . substr(md5(rand()), 0, 10);
        //     $this->load->library('upload', $config);
        //     //  $this->input->post('bukti') = $this->upload->data('file_name');
        //     if (@$_FILES['bukti']['name'] != null) {
        //         if (!$this->upload->do_upload('bukti')) {
        //             echo "Gagal";
        //         } else {
        //             $this->session->set_flashdata('flash', 'Ditambahkan');
        //             $this->Pengiriman_model->buatPengiriman();
        //             redirect('transaksi/listpesanan/');
        //         }
        //     } else {
        //         $this->session->set_flashdata('flash', 'Ditambahkan');
        //         $this->Pengiriman_model->buatPengiriman();
        //         redirect('transaksi/listpesanan/');
        //     }
        // }
    }

    public function buatPengirimanHal($kode)
    {
        if ($this->session->userdata('Halaman') != 'pengiriman') {
            redirect('transaksi/listpesanan');
        }
        $this->session->unset_userdata('Halaman');
        $data['judul'] = 'List Pesanan';
        $data['pesanan'] = $this->Transaksi_model->getAllProdukByKodeTransaksi($kode);
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        $data['pembayaran'] = $this->Transaksi_model->getAllTransaksiByStatus('Menunggu Pembayaran');
        $data['user'] = $this->User_model->getAllUser();
        // $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/pengiriman/buatpengiriman', $data);
            $this->load->view('footer');
        } else {
            $config['upload_path']          = './uploads/bukti/kirim';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']             = 'buktikirim-' . date('ymd') . '-' . date('(his)') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);
            //  $this->input->post('bukti') = $this->upload->data('file_name');
            if (@$_FILES['bukti']['name'] != null) {
                if (!$this->upload->do_upload('bukti')) {
                    echo "Gagal";
                } else {
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    $this->Pengiriman_model->buatPengiriman();
                    redirect('transaksi/listpesanan/');
                }
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');
                $this->Pengiriman_model->buatPengiriman();
                redirect('transaksi/listpesanan/');
            }
        }
    }

    public function simpanPengiriman($kode)
    {
        $this->Pengiriman_model->buatpengiriman();
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('transaksi/listpesanan');
    }

    public function konfirmasi()
    {
        $data['judul'] = 'Konfirmasi Pembayaran';
        $data['konfirmasi'] = $this->Transaksi_model->getAllTransaksiByStatus('Konfirmasi Pembayaran');
        $data['user'] = $this->User_model->getAllUser();
        $this->form_validation->set_rules('kode', 'Kode Transaksi', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/pembayaran/konfirmasi', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $kode = $this->input->post('kode', true);
            redirect('transaksi/proseskonfirmasi/' . $kode);
        }
    }

    public function proseskonfirmasi($kode)
    {
        $data['judul'] = 'Konfirmasi Pembayaran';
        $data['transaksi'] = $this->Transaksi_model->getTransaksiByKode($kode);
        $data['user'] = $this->User_model->getAllUser();
        $data['pembayaran'] = $this->Pembayaran_model->getPembayaranByKode($kode);

        $this->form_validation->set_rules('kode', 'Kode Transaksi', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('transaksi/pembayaran/proseskonfirmasi', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->Pembayaran_model->konfirmasi($kode);
            redirect('transaksi/listpesanan/');
        }
    }
}
