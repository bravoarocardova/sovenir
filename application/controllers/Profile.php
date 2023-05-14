<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('cart');
	}

	public function index()
	{
		$id_pelanggan = $this->session->userdata('pelanggan')->id_pelanggan;
		$data = [
			'profile' => $this->db->where("id_pelanggan", $id_pelanggan)->get('pelanggan')->result_array()[0]
		];

		$this->template->load('template/template', 'profile/profile', $data);
	}

	public function update_profile()
	{
		$id_pelanggan = $this->session->userdata('pelanggan')->id_pelanggan;
		$post = $this->input->post();
		$data = [
			"nama_pelanggan" => $post['nama'],
			'telepon_pelanggan' => $post['no_telp'],
			'email_pelanggan' => $post['email'],
			'alamat_pelanggan' => $post['alamat'],
		];

		if ($this->db->update("pelanggan", $data, ['id_pelanggan' => $id_pelanggan])) {
			$user = $this->db->where("id_pelanggan", $id_pelanggan)->get('pelanggan')->result()[0];
			$params = [
				'pelanggan' => $user
			];
			$this->session->set_userdata($params);
			echo "<script>
							alert('Berhasil Update profil');
							document.location.href='" . base_url('/profile') . "';
					</script>";
		} else {
			echo "<script>
							alert('Gagal Update profil');
							document.location.href='" . base_url('/profile') . "';
					</script>";
		}
	}

	public function update_paswword()
	{
		$id_pelanggan = $this->session->userdata('pelanggan')->id_pelanggan;
		$post = $this->input->post();
		$userLama = $this->db->where("id_pelanggan", $id_pelanggan)->get('pelanggan')->result()[0];
		if ($userLama->password_pelanggan != $post['pass']) {
			echo "<script>
								alert('Gagal Update password, password lama tidak cocok');
								document.location.href='" . base_url('/profile') . "';
						</script>";
			return;
		}

		$data = [
			'password_pelanggan' => $post['pass1'],
		];

		if ($this->db->update("pelanggan", $data, ['id_pelanggan' => $id_pelanggan])) {
			$user = $this->db->where("id_pelanggan", $id_pelanggan)->get('pelanggan')->result()[0];
			$params = [
				'pelanggan' => $user
			];
			$this->session->set_userdata($params);
			echo "<script>
							alert('Berhasil Update password');
							document.location.href='" . base_url('/profile') . "';
					</script>";
		} else {
			echo "<script>
							alert('Gagal Update password');
							document.location.href='" . base_url('/profile') . "';
					</script>";
		}
	}
}
