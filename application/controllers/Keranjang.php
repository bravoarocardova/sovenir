<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('cart');
	}

	public function index()
	{
		$cart = $this->cart->contents();
		if (empty($cart)) {
			echo "<script>
                        alert('Keranjang Kosong, silahkan pilih barang dulu');
                        document.location.href='" . base_url('auth') . "';
                    </script>";
		} else {
			$this->template->load('template/template', 'produk/keranjang', ['keranjang' => $cart]);
		}
	}

	public function hapus($rowid)
	{
		$data = [
			'rowid' => $rowid,
			'qty' => 0
		];
		$this->cart->update($data);
		redirect('keranjang');
	}

	public function checkout()
	{
		$data = [
			'keranjang' => $this->cart->contents(),
			'pelanggan' => $this->session->userdata('pelanggan'),
		];
		$this->template->load('template/template', 'produk/checkout', $data);
	}

	public function proses_checkout()
	{
		$this->load->model('checkout_m');

		$post = $this->input->post(NULL, TRUE);
		$produk = $this->cart->contents();
		$checkout = $this->checkout_m->prosesCheckout($post, $produk);
		if ($checkout) {
			$this->cart->destroy();
			redirect('riwayat/nota/' . $checkout);
		} else {
			redirect('keranjang');
		}
	}
}
