<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('M_alokasi_anggaran_covid_model');
        $this->load->library('form_validation');
    }

    public function index() {
    	$this->load->model('Grafik_model');
        error_reporting(E_ALL & ~E_NOTICE);
        
        if($_SESSION['id_user_level'] == 3 OR $_SESSION['id_user_level'] == 4 ){
            $id_satker = $_SESSION['nama'];
        }else{
        	$id_satker = '';
        }
        $data['m_kegiatan'] =  $this->db->get('m_kegiatan_anggaran_covid')->result();
        $data['m_sub_kegiatan'] =  $this->db->get('m_sub_kegiatan_anggaran_covid')->result();
        $data['result'] = $this->Grafik_model->grafik_covid($id_satker);
        //if(empty($id_satker))
        $this->template->load('template','grafik/grafik_covid_v2',$data);
        //else
        //$this->template->load('grafik_detail','grafik/grafik_covid_v2',$data);
    }

    public function form() {
        //$this->load->view('table');
        $this->template->load('template', 'form');
    }
    
    function autocomplate(){
        autocomplate_json('tbl_user', 'full_name');
    }

    function __autocomplate() {
        $this->db->like('nama_lengkap', $_GET['term']);
        $this->db->select('nama_lengkap');
        $products = $this->db->get('pegawai')->result();
        foreach ($products as $product) {
            $return_arr[] = $product->nama_lengkap;
        }

        echo json_encode($return_arr);
    }

    function pdf() {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
        $pdf->Output();
    }

}
