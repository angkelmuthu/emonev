<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = $this->Dashboard_model->get_all_dash();
        $dash = array(
            'k_dash' => $data,
        );
        $this->template->load('template', 'dashboard', $dash);
    }
    public function master_rs($id)
    {
        $row2 = $this->Dashboard_model->get_master_rs($id);
        $masterrs = array(
            'masterrs' => $row2,
        );
        $this->template->load('template', 'dash_detail', $masterrs);
    }
    public function detail($id)
    {
        $row = $this->Dashboard_model->get_kunjungan_day_by($id);
        $kjngn_day = array(
            'kjngn_day' => $row,
        );
        $this->template->load('template', 'dash_detail', $kjngn_day);
    }
}
