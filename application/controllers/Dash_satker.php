<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dash_satker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dash_satker_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!empty($_GET['th'])) {
            $tahun_default = $_GET['th'];
        } else {
            $tahun_default = $this->Dash_satker_model->get_tahun_row()->tahun;
        }
        $data = array(
            'dt_bar' => $this->Dash_satker_model->barchart($tahun_default),
            'dt_progres' => $this->Dash_satker_model->progres($tahun_default),
            'dt_tahun' => $this->Dash_satker_model->get_tahun(),
        );
        $this->template->load('template', 'dash_satker', $data);
    }
    public function sub($prop)
    {
        $data = array(
            'dt_sub' => $this->Dash_satker_model->getby_prop($prop),
        );
        $this->template->load('template', 'dash_satker_sub', $data);
    }
}
