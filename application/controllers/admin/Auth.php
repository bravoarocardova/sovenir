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
        redirect('admin/auth/login');
    }
    
    public function login()
    {
        check_already_admin_login();
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('admin/auth');
    }

    public function proses()
    {
        $post = $this->input->post(NULL, TRUE);
        $admin = $this->auth_m->loginAdmin($post)[0];
        if($admin){
            $this->session->set_userdata('admin',$admin);
            echo "<script>
                        alert('Login berhasil');
                        document.location.href='" . base_url('admin/dashboard') . "';
                    </script>";

        }else{
            echo "<script>
                        alert('Login gagal, username / password salah');
                        document.location.href='" . base_url('admin/auth') . "';
                    </script>";
        }
    }

}
