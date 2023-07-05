<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_m');
    }

    public function index()
    {
        check_admin_not_login();
        $data['produk'] = $this->produk_m->getProduk();
        $this->template->load('template_admin/template', 'admin/produk/produk', $data);
    }

    public function tambah()
    {
        check_admin_not_login();
        $produk = new stdClass;
        $produk->id_produk = null;
        $produk->nama_produk = null;
        $produk->harga_produk = null;
        $produk->harga_beli = null;
        $produk->berat_produk = null;
        $produk->deskripsi_produk = null;
        $produk->stok_produk = null;
        $data = [
            'produk' => $produk,
            'page' => "tambah"
        ];
        $this->template->load('template_admin/template', 'admin/produk/produk_form', $data);
    }

    public function edit($id)
    {
        check_admin_not_login();
        $data = [
            'produk' => $this->produk_m->getProduk($id)[0],
            'page' => "edit"
        ];
        $this->template->load('template_admin/template', 'admin/produk/produk_form', $data);
    }

    public function hapus($id)
    {
        check_admin_not_login();
        $produk = $this->produk_m->getProduk($id)[0];
        if ($this->produk_m->hapus($id)) {
            if (file_exists(base_url('img/foto_produk/') . $produk->foto_produk)) {
                unlink(base_url('img/foto_produk/') . $produk->foto_produk);
            }
            echo "<script>
                        alert('Berhasil dihapus');
                        document.location.href='" . base_url('admin/produk') . "';
                    </script>";
        }
    }

    public function proses()
    {
        check_admin_not_login();
        $post = $this->input->post(NULL, TRUE);

        $config['upload_path'] = './img/foto_produk/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 4096;
        $config['file_name'] = 'produk-' . date('ymd') . time();
        $this->load->library('upload', $config);

        if (isset($post['tambah'])) {

            if (@$_FILES['foto']['error'] == 0) {
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');
                    $this->produk_m->tambahProduk($post);
                    redirect('admin/produk/');
                } else {
                    echo "<script>
                        alert('Gagal!!!');
                        document.location.href='" . base_url('admin/produk/tambah') . "';
                    </script>";
                }
            } else {
                echo "<script>
                        alert('Gagal!!!');
                        document.location.href='" . base_url('admin/produk/tambah') . "';
                    </script>";
            }
        } else if (isset($post['edit'])) {
            if (@$_FILES['foto']['error'] == 0) {
                $produk = $this->produk_m->getProduk($post['id_produk'])[0];

                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');
                    $this->produk_m->editProduk($post);
                    if (file_exists(base_url('img/foto_produk/') . $produk->foto_produk)) {
                        unlink(base_url('img/foto_produk/') . $produk->foto_produk);
                    }
                    redirect('admin/produk/');
                } else {
                    echo "<script>
                        alert('Gagal!!!');
                        document.location.href='" . base_url('admin/produk/edit/') . $post['id_produk'] . "';
                    </script>";
                }
            } else {
                $post['foto'] = null;
                $this->produk_m->editProduk($post);
                redirect('admin/produk/');
            }
        } else {
            redirect('admin/produk');
        }
    }
}
