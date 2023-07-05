<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

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
            'produk' => $this->pembelian_m->getPembelianProduk($id),
            'pembayaran' => $this->pembelian_m->getPembayaran($id),
        ];
        $this->template->load('template_admin/template', 'admin/pembelian/detail', $data);
    }

    public function kirim($id)
    {
        check_admin_not_login();
        if ($this->pembelian_m->kirim($id)) {
            echo "<script>
                        alert('Berhasil dikirim');
                        document.location.href='" . base_url('admin/pembelian/detail/' . $id) . "';
                    </script>";
        }
    }

    public function selesai($id)
    {
        check_admin_not_login();
        if ($this->pembelian_m->selesai($id)) {
            echo "<script>
                        alert('Berhasil diselesaikan');
                        document.location.href='" . base_url('admin/pembelian/detail/' . $id) . "';
                    </script>";
        }
    }

    public function batalkan($id)
    {
        check_admin_not_login();
        if ($this->pembelian_m->batalkan($id)) {
            echo "<script>
                        alert('Berhasil diselesaikan');
                        document.location.href='" . base_url('admin/pembelian/detail/' . $id) . "';
                    </script>";
        }
    }

    public function resi($id)
    {
        check_admin_not_login();
        if ($this->pembelian_m->resi($id, $this->input->post('resi'))) {
            echo "<script>
                        alert('Berhasil update resi');
                        document.location.href='" . base_url('admin/pembelian/detail/' . $id) . "';
                    </script>";
        }
    }
}
