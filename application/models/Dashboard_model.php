<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public $table = 't_kunjungan';
    public $id = 'kdrs';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all dash
    function get_all_dash()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $this->db->select('a.kdrs,SUM(a.rj) AS rj,SUM(a.ri) AS ri,SUM(a.igd) AS igd,b.nm_rs,SUM(c.lunas) AS lunas,SUM(c.hutang) AS hutang');
        $this->db->from('t_kunjungan a');
        $this->db->join('m_rs b', 'b.kdrs = a.kdrs', 'left');
        $this->db->join('t_pendapatan c', 'c.kdrs = a.kdrs', 'left');
        $this->db->where('DATE(a.tgl)', $curr_date);
        $this->db->group_by('a.kdrs');
        $query = $this->db->get();
        return $query->result();
    }
    // get data rs by kdrs
    function get_master_rs($id)
    {
        $this->db->select('*');
        $this->db->from('m_rs');
        $this->db->where('kdrs', $id);
        $query = $this->db->get();
        return $query->result();
    }
    // get data kunjungan hari ini by kdrs
    function get_kunjungan_day_by($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $this->db->select('*');
        $this->db->from('t_kunjungan');
        $this->db->where('kdrs', $id);
        $this->db->where('DATE(tgl)', $curr_date);
        $query = $this->db->get();
        return $query->result();
    }
}
