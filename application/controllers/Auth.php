<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

    public function index()
    {
        redirect('/auth/login');
    }

    public function login()
    {
        check_already_login();
        $this->load->view('auth/login');
    }

    public function daftar()
    {
        check_already_login();
        $this->load->view('auth/daftar');
    }

    public function proses()
    {
        $post = $this->input->post(NULL,TRUE);
        if (isset($post['login'])) {
            $user = $this->auth_m->login($post);
            
            if ($user->num_rows() > 0) {
                $row = $user->row();
                $params = [
                    'pelanggan' => $row
                ];
                $this->session->set_userdata($params);
                echo "<script>
                        alert('Login berhasil');
                        document.location.href='" . base_url() . "';
                    </script>";
            }else{
                echo "<script>
                        alert('Login gagal, username / password salah');
                        document.location.href='" . base_url('/auth') . "';
                    </script>";
            }
        } else if(isset($post['daftar'])){
            if ($this->auth_m->daftar($post) > 0) {
                echo "<script>
                        alert('Pendaftaran Berhasil, silahkan login untuk melanjutkan');
                        document.location.href='" . base_url('/auth') . "';
                    </script>";
            }else{
                echo "<script>
                        alert('Pendaftaran gagal, email sudah digunakan');
                        document.location.href='" . base_url('/auth/daftar') . "';
                    </script>";
            }
        }else {
            redirect('/auth');
        }
        
    }

    public function logout()
    {
        $params = [
            'pelanggan'
        ];
        $this->session->unset_userdata($params);
        redirect('auth/');
    }
}