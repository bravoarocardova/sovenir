<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function index()
    {
        check_admin_not_login();
        $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $this->template->load('template_admin/template', 'admin/pelanggan',$data);
    }

    public function hapus($id)
    {
        check_admin_not_login();
        if ($this->db->delete('pelanggan', ['id_pelanggan' => $id])) {
            echo "<script>
                    alert('Berhasil dihapus');
                    document.location.href='" . base_url('/admin/pelanggan') . "';
                </script>";
        }else{
            echo "<script>
                    alert('Gagal menghapus user');
                    document.location.href='" . base_url('/admin/pelanggan') . "';
                </script>";
        }
    }

}