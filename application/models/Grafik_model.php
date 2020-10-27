<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function mSatker(){
        $this->db->select('m_dak_alokasi.id_dak_kelompok,m_dak_kelompok.nama,m_satker_jenis.id_satker_jenis, m_satker_jenis.nama as jenis_satker,nilai_alokasi');
        $this->db->from('m_dak_alokasi');
        $this->db->join('m_dak_kelompok','m_dak_kelompok.id_dak_kelompok = m_dak_alokasi.id_dak_kelompok');
        $this->db->join('m_satker','m_satker.id_satker = m_dak_alokasi.id_satker');
        $this->db->join('m_satker_jenis','m_satker_jenis.id_satker_jenis = m_satker.id_jenis_satker');

        $sql = $this->db->get();
        $data = $sql->result_array();

        //echo $this->db->last_query();;

        return $data;
    }


    public function grafik_covid($id_satker=null){
        $whereSatker = '';
        if(!empty($id_satker)){
          $query = $this->db->get_where('m_satker', array('nama' => ''.str_replace('%20',' ', $id_satker).''),1);
          $d = $query->result_array();
          $whereSatker = "AND mac.id_satker = '".$d[0]['id_satker']."'";   
        }
        $sql = $this->db->query("select mac.id,rac.id_alokasi_covid,kac.nama_kegiatan,rac.jenis_input, rac.inputan_nilai, m_satker.nama,m_satker.id_satker,mac.alokasi_akhir,mac.kegiatan,mac.id_sub_kegiatan,sumber_dana,level,rac.kategori_kontrak
                        from m_alokasi_anggaran_covid mac
                        LEFT JOIN realisasi_anggaran_covid rac on mac.id = rac.id_alokasi_covid 
                        LEFT JOIN m_kegiatan_anggaran_covid  kac on mac.kegiatan = kac.id
                        LEFT join m_satker on mac.id_satker = m_satker.id_satker
                        LEFT JOIN m_sub_kegiatan_anggaran_covid ON m_sub_kegiatan_anggaran_covid.id = mac.id_sub_kegiatan
                        where 1=1 ".$whereSatker."
                        order by mac.id_satker;");

        $data = $sql->result_array();

        //echo $this->db->last_query();

        return $data;
    }
}