<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Grafik_model');
    }

    public function satker()
    {
        error_reporting(E_ALL & ~E_NOTICE);
        $data['result'] = $this->Grafik_model->mSatker();
        $this->template->load('template', 'grafik/satker', $data);
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

    public function grafik_covid($id_satker=null){
        error_reporting(E_ALL & ~E_NOTICE);
        $data['m_kegiatan'] =  $this->db->get('m_kegiatan_anggaran_covid')->result();
        $data['m_sub_kegiatan'] =  $this->db->get('m_sub_kegiatan_anggaran_covid')->result();
        $data['result'] = $this->Grafik_model->grafik_covid($id_satker);
        if(empty($id_satker))
        $this->template->load('template','grafik/grafik_covid_v2',$data);
        else
        $this->template->load('grafik_detail','grafik/grafik_covid_v2',$data);
    }
}
