<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        check_admin_not_login();
        $this->load->model('pembelian_m');
        $this->load->model('produk_m');

        $pendapatan = $this->db->select('*')->join('produk', 'pembelian_produk.id_produk = produk.id_produk')->get('pembelian_produk')->result();
        $total_pendapatan = 0;

        foreach ($pendapatan as $p) {
            $total_pendapatan += ($p->jumlah * $p->harga_produk) - ($p->jumlah * $p->harga_beli);
        }

        $data = [
            'produk' => $this->produk_m->getProduk(),
            'pembelian' => $this->pembelian_m->getPembelian(),
            'pelanggan' => $this->db->get('pelanggan')->result(),
            'terjual' => $this->db->select('sum(jumlah) as jumlah')->get('pembelian_produk')->result(),
            'total_pendapatan' => $total_pendapatan,
        ];
        // var_dump($data);
        $this->template->load('template_admin/template', 'admin/dashboard', $data);
    }
}
