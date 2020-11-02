<?php
class Blokir extends CI_Controller
{


    function index()
    {
        //$this->load->view('auth/blokir_akses');
        $role = $this->session->userdata('id_user_level');
        if ($role == '1' || $role == '2') {
            return redirect('dashboard');
        } elseif ($role == '3') {
            return redirect('dash_satker');
        } elseif ($role == '4') {
            return redirect('welcome');
        }
    }
}
