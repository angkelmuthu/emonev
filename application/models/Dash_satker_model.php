<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dash_satker_model extends CI_Model
{

    public $table = 't_kunjungan';
    public $id = 'kdrs';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all dash
    function barchart($tahun_default)
    {
        $satker = $this->session->userdata('id_satker');
        $date = new DateTime("now");
        //$curr_date = $date->format('Y');
        $this->db->select('a.nama_dak_sub_bidang,sum(a.nilai_alokasi) as alokasi,sum(a.ttl_rincian) as rka,sum(a.ttl_realisasi) as realisasi');
        $this->db->from('v_dak_alokasi a');
        $this->db->join('m_provinsi b', 'a.id_provinsi=b.id_provinsi', 'left');
        $this->db->where('a.id_satker', $satker);
        $this->db->where('a.tahun', $tahun_default);
        $this->db->group_by('a.id_dak_sub_bidang');
        $query = $this->db->get();
        return $query->result();
    }
    function progres($tahun_default)
    {
        $satker = $this->session->userdata('id_satker');
        $date = new DateTime("now");
        //$curr_date = $date->format('Y');
        $this->db->select('sum(a.nilai_alokasi) as alokasi,sum(a.ttl_rincian) as rka,sum(a.ttl_realisasi) as realisasi');
        $this->db->from('v_dak_alokasi a');
        $this->db->where('a.id_satker', $satker);
        $this->db->where('a.tahun', $tahun_default);
        $query = $this->db->get();
        return $query->result();
    }
    function get_tahun()
    {
        $satker = $this->session->userdata('id_satker');
        $this->db->select('tahun');
        $this->db->from('v_dak_alokasi');
        $this->db->where('id_satker', $satker);
        $this->db->order_by('tahun', 'DESC');
        $this->db->group_by('tahun');
        $query = $this->db->get();
        return $query->result();
    }
    function get_tahun_row()
    {
        $satker = $this->session->userdata('id_satker');
        $this->db->select('tahun');
        $this->db->from('v_dak_alokasi');
        $this->db->where('id_satker', $satker);
        $this->db->order_by('tahun', 'DESC');
        $this->db->group_by('tahun');
        $query = $this->db->get();
        return $query->row();
    }
}
