<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        check_admin_not_login();
        $this->load->model('pembelian_m');
        $this->load->model('produk_m');

        $data = [
            'produk' => $this->produk_m->getProduk(),
            'pembelian' => $this->pembelian_m->getPembelian(),
            'pelanggan' => $this->db->get('pelanggan')->result(),
        ];
        // var_dump($data);
        $this->template->load('template_admin/template', 'admin/dashboard', $data);
    }
}
