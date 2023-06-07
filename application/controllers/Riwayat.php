<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('riwayat_m');
	}

	public function index()
	{
		$pelanggan = $this->session->userdata('pelanggan');
		$data = [
			'pelanggan' => $pelanggan,
			'pembelian' => $this->riwayat_m->getPembelianByPelanggan($pelanggan->id_pelanggan)
		];
		$this->template->load('template/template', 'riwayat/riwayat', $data);
	}

	public function nota($id)
	{
		$data = [
			'pembelian' => $this->riwayat_m->getPembelian($id),
			'produk' => $this->riwayat_m->getProduk($id),
			'pembayaran' => $this->riwayat_m->getPembayaran($id),
		];

		$this->template->load('template/template', 'riwayat/nota', $data);
	}

	public function pembayaran($id)
	{
		$data = [
			'pembelian' => $this->riwayat_m->getPembelian($id)
		];

		$this->template->load('template/template', 'riwayat/pembayaran', $data);
	}

	public function proses_pembayaran()
	{
		$post = $this->input->post(NULL, TRUE);
		$config['upload_path'] = './img/bukti/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 3096;
		$config['file_name'] = 'bukti-' . date('ymd') . time();
		$this->load->library('upload', $config);
		if (isset($post['kirim'])) {
			if (@$_FILES['bukti']['error'] == 0) {
				if ($this->upload->do_upload('bukti')) {
					$post['bukti'] = $this->upload->data('file_name');
					$this->riwayat_m->pembayaran($post);
					echo "<script>
						alert('Pembayaran Berhasil');
						document.location.href='" . base_url('riwayat') . "';
					</script>";
				} else {
					echo "<script>
						alert('Pembayaran Gagal!!!');
						document.location.href='" . base_url('riwayat/pembayaran/') . $post['id'] . "';
					</script>";
				}
			} else {
				echo "<script>
						alert('Pembayaran Gagal!!!');
						document.location.href='" . base_url('riwayat/pembayaran/') . $post['id'] . "';
					</script>";
			}
		}
	}

	public function selesai($id)
	{
		if ($this->riwayat_m->selesai($id)) {
			echo "<script>
                        alert('Berhasil diselesaikan');
                        document.location.href='" . base_url('riwayat/nota/' . $id) . "';
                    </script>";
		}
	}
}
