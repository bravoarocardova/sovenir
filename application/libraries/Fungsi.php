<?php

class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    // public function user_login()
    // {
    //     $this->ci->load->model('user_m');
    //     $user_id = $this->ci->session->userdata('userid');
    //     return $this->ci->user_m->get($user_id)->row();
    // }


}