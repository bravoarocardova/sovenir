<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('produk_m');
	}

	public function index()
	{
		$data["produk"] = $this->produk_m->getProduk();
		$this->template->load('template/template', 'produk/produk', $data);
	}

	public function search()
	{
		$key = $this->input->get('key');
		$data["produk"]	= $this->produk_m->search($key);
		$this->template->load('template/template', 'produk/produk', $data);
	}

	public function detail($id)
	{
		$data["produk"] = $this->produk_m->getProduk($id)[0];
		$this->template->load('template/template', 'produk/detail', $data);
	}

	public function add_to_cart()
	{
		check_not_login();
		$this->load->library('cart');

		$post = $this->input->post(NULL, TRUE);
		$data = [
			'id'       =>  $post['id_produk'],
			'qty'      =>  $post['qty'],
			'price'    =>  $post['harga'],
			'name'     =>  $post['nama'],
			'options' => array('berat' => $post['berat']),
		];

		$this->cart->insert($data);

		echo "<script>
				alert('Berhasil ditambahkan ke keranjang');
				document.location.href='" . base_url('keranjang') . "';
			</script>";
	}
}
