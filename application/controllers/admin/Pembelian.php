<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembelian_m');
    }

    public function index()
    {
        check_admin_not_login();
        $data = [
            'pembelian' => $this->pembelian_m->getPembelian()
        ];
        $this->template->load('template_admin/template', 'admin/pembelian/pembelian', $data);
    }

    public function detail($id)
    {
        check_admin_not_login();
        $data = [
            'pembelian' => $this->pembelian_m->getPembelian($id)[0],
            'produk' => $this->pembelian_m->getPembelianProduk($id)
        ];
        $this->template->load('template_admin/template', 'admin/pembelian/detail', $data);
    }

}