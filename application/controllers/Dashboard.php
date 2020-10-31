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
        if (!empty($_GET['th'])) {
            $tahun_default = $_GET['th'];
        } else {
            $tahun_default = $this->Dashboard_model->get_tahun_row()->tahun;
        }
        $data = array(
            'dt_bar' => $this->Dashboard_model->barchart_prop($tahun_default),
            'dt_progres' => $this->Dashboard_model->progres($tahun_default),
            'dt_tahun' => $this->Dashboard_model->get_tahun(),
        );
        $this->template->load('template', 'dashboard', $data);
    }
    public function sub($prop)
    {
        $data = array(
            'dt_sub' => $this->Dashboard_model->getby_prop($prop),
        );
        $this->template->load('template', 'dashboard_sub', $data);
    }
}
