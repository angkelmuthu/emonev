<?php
class Blokir extends CI_Controller
{


    function index()
    {
        //$this->load->view('auth/blokir_akses');
        $this->template->load('template', 'auth/blokir_akses');
    }
}
