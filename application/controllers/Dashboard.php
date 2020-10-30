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
        $data = array(
            'dt_bar' => $this->Dashboard_model->barchart_prop(),
            'dt_progres' => $this->Dashboard_model->progres(),
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
