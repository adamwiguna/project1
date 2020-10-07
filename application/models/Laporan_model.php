<?php

class Laporan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Produk_model');
    }

    public function getLaporanPenjualan()
    {
        $this->db->select('year(TglOrder) as tahun, monthname(TglOrder) as bulan, sum(TotalBayar) as penjualan');
        $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        $this->db->order_by('tahun ASC, bulan DESC');
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getLaporanPenjualanFilter()
    {
        $this->db->select('year(TglOrder) as tahun, monthname(TglOrder) as bulan, sum(TotalBayar) as penjualan');
        $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        if ($this->input->post('bulan') != 'NULL' && $this->input->post('tahun') != 'NULL') {
            $this->db->where('monthname(TglOrder)', $this->input->post('bulan'));
            $this->db->where('year(TglOrder)', $this->input->post('tahun'));
        } else if ($this->input->post('bulan') != 'NULL') {
            $this->db->where('monthname(TglOrder)', $this->input->post('bulan'));
        } else if ($this->input->post('tahun') != 'NULL') {
            $this->db->where('year(TglOrder)', $this->input->post('tahun'));
        }
        $this->db->order_by('tahun ASC, bulan DESC');
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getTotalPenjualanFilter()
    {
        $this->db->select('sum(TotalBayar) as TB');
        // $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        // $this->db->order_by('TglOrder ASC');
        if ($this->input->post('bulan') != 'NULL' && $this->input->post('tahun') != 'NULL') {
            $this->db->where('monthname(TglOrder)', $this->input->post('bulan'));
            $this->db->where('year(TglOrder)', $this->input->post('tahun'));
        } else if ($this->input->post('bulan') != 'NULL') {
            $this->db->where('monthname(TglOrder)', $this->input->post('bulan'));
        } else if ($this->input->post('tahun') != 'NULL') {
            $this->db->where('year(TglOrder)', $this->input->post('tahun'));
        }
        $query = $this->db->get('tbtransaksi');
        return $query->row_array();
    }

    public function getLaporanPendapatan()
    {
        // $this->db->select('year(TglOrder) as tahun, monthname(TglOrder) as bulan, sum(TotalBayar) as penjualan');
        // $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        $this->db->order_by('TglOrder ASC');
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getTotalPendapatan()
    {
        $this->db->select('sum(TotalBayar) as TB');
        // $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        // $this->db->order_by('TglOrder ASC');
        $query = $this->db->get('tbtransaksi');
        return $query->row_array();
    }

    public function getCountOrder()
    {
        $this->db->select('count(TotalBayar) as tb');
        // $this->db->group_by('year(TglOrder), month(TglOrder)');
        $this->db->where('StatusSimpan', SQL_NO_NULLS);
        $this->db->where('(StatusBayar', NULL);
        $this->db->or_where('StatusKirim)', NULL);
        // $this->db->order_by('TglOrder ASC');
        $query = $this->db->get('tbtransaksi');
        return $query->row_array();
    }

    public function getLaporanPiutang()
    {
        $this->db->where('StatusBayar', NULL);
        $this->db->where('StatusKirim', SQL_NO_NULLS);
        $this->db->order_by('TglOrder ASC');
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getTotalPiutang()
    {
        $this->db->select('sum(TotalBayar) as TB');
        $this->db->where('StatusBayar', NULL);
        $this->db->where('StatusKirim', SQL_NO_NULLS);
        $query = $this->db->get('tbtransaksi');
        return $query->row_array();
    }

    public function getStokKurang()
    {
        $this->db->select('sum(Stok) as TB');
        $this->db->where('Stok < 0');
        $query = $this->db->get('tbproduk');
        return $query->row_array();
    }

    public function getLaporanBarang()
    {
        $this->db->select('year(TglOrder) as tahun, monthname(TglOrder) as bulan, sum(Jumlah) as Jumlah, NamaProduk');
        $this->db->join('tbtransaksi', 'tbtransaksi.KodeTransaksi = tbdetailtransaksi.KodeTransaksi');
        $this->db->join('tbproduk', 'tbproduk.KodeProduk = tbdetailtransaksi.KodeProduk');
        $this->db->group_by('NamaProduk');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        $this->db->order_by('Jumlah DESC');
        // $this->db->where('year(TglOrder)', '2020');
        $query = $this->db->get('tbdetailtransaksi');
        return $query->result_array();
    }

    public function getLaporanBarangFilter()
    {
        $this->db->select('year(TglOrder) as tahun, monthname(TglOrder) as bulan, sum(Jumlah) as Jumlah, NamaProduk');
        $this->db->join('tbtransaksi', 'tbtransaksi.KodeTransaksi = tbdetailtransaksi.KodeTransaksi');
        $this->db->join('tbproduk', 'tbproduk.KodeProduk = tbdetailtransaksi.KodeProduk');
        $this->db->group_by('NamaProduk');
        $this->db->where('StatusBayar', SQL_NO_NULLS);
        if ($this->input->post('bulan') != '' && $this->input->post('tahun') != '') {
            $this->db->where('monthname(TglOrder)', $this->input->post('bulan'));
            $this->db->where('year(TglOrder)', $this->input->post('tahun'));
        } else if ($this->input->post('bulan') != '') {
            $this->db->where('monthname(TglOrder)', $this->input->post('bulan'));
        } else if ($this->input->post('tahun') != '') {
            $this->db->where('year(TglOrder)', $this->input->post('tahun'));
        }
        $this->db->order_by('Jumlah DESC');
        // $this->db->where('year(TglOrder)', '2020');
        $query = $this->db->get('tbdetailtransaksi');
        return $query->result_array();
    }
}
