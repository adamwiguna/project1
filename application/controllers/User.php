<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['judul'] = 'Tambah User';
        $this->load->view('header', $data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function tambahUser()
    {
        $data['judul'] = 'Tambah User';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $data['level'] = ['Pelanggan', 'Pelanggan Tetap'];
        // $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');
        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('user/tambahuser');
            $this->load->view('footer');
        } else {
            $config['upload_path']          = './uploads/user/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']             = 'user-' . date('ymd') . '-' . date('(his)') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);
            if (@$_FILES['foto']['name'] != null) {
                if (!$this->upload->do_upload('foto')) {
                    echo "Gagal";
                } else {
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    $this->User_model->tambah();
                    redirect('user/listuser');
                }
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');
                $this->User_model->tambah();
                redirect('user/listuser');
            }
        }
    }

    public function ubahUser($kode)
    {
        $data['judul'] = 'Ubah User';
        $data['user'] = $this->User_model->getDataByKode($kode);
        //mengirim data untuk menampilkan combobox/pilihan tapi harus ada tabel di db dan buat model nya
        //$data['level'] = $this->Level_model->getAllLevel();

        $data['level'] = ['Pelanggan', 'Pelanggan Tetap'];


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');
        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('user/ubahuser', $data);
            $this->load->view('footer');
        } else {
            $config['upload_path']          = './uploads/user/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']             = 'user-' . date('ymd') . '-' . date('(his)') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);
            if (@$_FILES['foto']['name'] != null) {
                if (!$this->upload->do_upload('foto')) {
                    echo "Gagal";
                } else {
                    if ($data['user']['Foto'] != null) {
                        unlink('./uploads/user/' . $data['user']['Foto']);
                    }
                    $this->session->set_flashdata('flash', 'Diubah');
                    $this->User_model->ubah();
                    redirect('user/listuser');
                }
            } else {
                $this->session->set_flashdata('flash', 'Diubah');
                $this->User_model->ubah();
                redirect('user/listuser');
            }
        }
    }

    public function listUser()
    {
        $data['judul'] = 'List User';
        $data['produk'] = $this->User_model->getAllUser();
        $this->load->view('header', $data);
        $this->load->view('user/listuser', $data);
        $this->load->view('footer');
    }

    public function hapus($kode)
    {
        $data['user'] = $this->User_model->getDataByKode($kode);
        if ($data['user']['Foto'] != null) {
            unlink('./uploads/user/' . $data['user']['Foto']);
        }
        $this->User_model->hapus($kode);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/listuser');
    }

    public function detailUser($kode)
    {
        $data['judul'] = 'Detail User';
        $data['user'] = $this->User_model->getDataByKode($kode);

        $this->load->view('header', $data);
        $this->load->view('user/detailuser', $data);
        $this->load->view('footer');
    }
}
