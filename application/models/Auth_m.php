<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model{

    public function login($post)
    {
        $this->db->where([
            'email_pelanggan' => $post['email'],
            'password_pelanggan' => $post['password']
        ]);
        return $this->db->get('pelanggan');
    }

    public function daftar($post)
    {
        if ($this->check_user_email($post['email']) == 0) {
            $value = [
                'nama_pelanggan' => $post['nama'],
                'email_pelanggan' => $post['email'],
                'password_pelanggan' => $post['password'],
                'telepon_pelanggan' => $post['telepon'],
                'alamat_pelanggan' => $post['alamat']
            ];
            return $this->db->insert('pelanggan',$value);
        }
        return false;
    }

    private function check_user_email($email)
    {
        return $this->db->get_where('pelanggan',['email_pelanggan' => $email])->num_rows();
    }

    public function loginAdmin($post)
    {
        $this->db->where([
            'username' => $post['user'],
            'password' => $post['pass']
        ]);
        return $this->db->get('admin')->result();
    }
}