<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('pelanggan');
    if($user_session){
        redirect('');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci ->session->userdata('pelanggan');
    if(!$user_session){
        redirect('auth/login');
    }
}

function check_already_admin_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('admin');
    if ($user_session) {
        redirect('admin/dashboard');
    }
}

function check_admin_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('admin');
    if (!$user_session) {
        redirect('admin/auth');
    }
}