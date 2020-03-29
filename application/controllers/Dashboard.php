<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->load->view('header', $data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
}
