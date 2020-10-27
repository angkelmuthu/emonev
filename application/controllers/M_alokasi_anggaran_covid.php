<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_alokasi_anggaran_covid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_alokasi_anggaran_covid_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        error_reporting(E_ALL & ~E_NOTICE);;
        error_reporting(0);

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_alokasi_anggaran_covid/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_alokasi_anggaran_covid/index/';
            $config['first_url'] = base_url() . 'index.php/m_alokasi_anggaran_covid/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_alokasi_anggaran_covid_model->total_rows($q);
        $m_alokasi_anggaran_covid = $this->M_alokasi_anggaran_covid_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        #$this->pagination->initialize($config);

        $data = array(
            'm_alokasi_anggaran_covid_data' => $m_alokasi_anggaran_covid,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_alokasi_anggaran_covid/m_alokasi_anggaran_covid_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_alokasi_anggaran_covid_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_satker' => $row->id_satker,
        'kegiatan' => $row->kegiatan,
		'alokasi' => $row->alokasi,
        'tahap' => $row->tahap,
		'create_date' => $row->create_date,
	    );
            $this->template->load('template','m_alokasi_anggaran_covid/m_alokasi_anggaran_covid_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_alokasi_anggaran_covid'));
        }
    }

    public function create($id=NULL)
    {
        $level = 0;
        if(!empty($id)){
                $row = $this->M_alokasi_anggaran_covid_model->get_by_id($id);
                
                if(!empty($row)){
                    $level = $row->level + 1;
                    $param = $id;
                    $pagu_digunakan = $this->M_alokasi_anggaran_covid_model->pagu_digunakan($param);
                }
        }

        //print_r($row);
    
        $data = array(
        'button' => 'Create',
        'action' => site_url('m_alokasi_anggaran_covid/create_action/'.$id.''),
	    'id' => set_value('id'),
	    'id_satker' => (!empty($row)) ? $row->id_satker : set_value('id_satker'),
        'kegiatan' => (!empty($row->kegiatan)) ? $row->kegiatan : set_value('id_kegiatan'),
        'id_sub_kegiatan' => (!empty($row->id_sub_kegiatan)) ? $row->id_sub_kegiatan : set_value('id_sub_kegiatan'),
        'id_output' => (!empty($row->id_output)) ? $row->id_output : set_value('id_output'),
	    'alokasi' => set_value('alokasi'),
        'alokasi_akhir' => (!empty($row)) ? $row->alokasi_akhir : set_value('alokasi'),
        'tahap' => set_value('tahap'),
        'level' => $level,
        'sumber_dana' => (!empty($row->sumber_dana))? $row->sumber_dana : set_value('sumber_dana'),
        'pagu_digunakan' => (!empty($pagu_digunakan)) ? $pagu_digunakan[0]['pagu_digunakan'] : 0,
	    'create_date' => set_value('create_date'),
        'id_parent' => $id
	);
        $this->template->load('template','m_alokasi_anggaran_covid/m_alokasi_anggaran_covid_form', $data);
    }

    public function create_action($id=NULL)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($id);
        } else {
            $data = array(
		'id_satker' => $this->input->post('id_satker',TRUE),
        'kegiatan' => $this->input->post('id_kegiatan',TRUE),
        'id_sub_kegiatan' => $this->input->post('id_sub_kegiatan',TRUE),
        'id_output' => $this->input->post('id_output',TRUE),
		'alokasi' => save_auto_numeric($this->input->post('alokasi',TRUE)),
        'alokasi_akhir' => save_auto_numeric($this->input->post('alokasi',TRUE)),
        'tahap' => $this->input->post('tahap',TRUE),
        'level' => $this->input->post('level',TRUE),
        'id_parent' => $this->input->post('id_parent',TRUE),
        'sumber_dana' => $this->input->post('sumber_dana',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->M_alokasi_anggaran_covid_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_alokasi_anggaran_covid'));
        }
    }

    public function update($id)
    {   
        $level = 0;
        if(!empty($id)){
                $row = $this->M_alokasi_anggaran_covid_model->get_by_id($id);
                
                if(!empty($row)){
                    $level = $row->level + 1;
                    $param = array('id_satker'=>$row->id_satker,
                               'kegiatan'=>$row->kegiatan,
                               'id_sub_kegiatan'=>$row->id_sub_kegiatan,
                               'id_output' => $row->id_output,
                               'level' => $row->level
                              );
                    $pagu_digunakan = $this->M_alokasi_anggaran_covid_model->pagu_digunakan($param);
                }
        }
        $row = $this->M_alokasi_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_alokasi_anggaran_covid/update_action'),
		'id' => set_value('id', $row->id),
		'id_satker' => set_value('id_satker', $row->id_satker),
        'kegiatan' => set_value('id_satker', $row->kegiatan),
		'alokasi' => set_value('alokasi', $row->alokasi),
        'alokasi_akhir' => set_value('alokasi_akhir', $row->alokasi_akhir),
        'tahap' => set_value('tahap', $row->tahap),
		'create_date' => set_value('create_date', $row->create_date),
        'level'=>$level,
        'pagu_digunakan' => (!empty($pagu_digunakan)) ? $pagu_digunakan[0]['pagu_digunakan'] : 0
	    );
            $this->template->load('template','m_alokasi_anggaran_covid/m_alokasi_anggaran_covid_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_alokasi_anggaran_covid'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_satker' => $this->input->post('id_satker',TRUE),
        'kegiatan' => $this->input->post('id_kegiatan',TRUE),
		'alokasi' => save_auto_numeric($this->input->post('alokasi',TRUE)),
        'alokasi_akhir' => save_auto_numeric($this->input->post('alokasi_akhir',TRUE)),
        'tahap' => $this->input->post('tahap',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->M_alokasi_anggaran_covid_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_alokasi_anggaran_covid'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_alokasi_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $this->M_alokasi_anggaran_covid_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_alokasi_anggaran_covid'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_alokasi_anggaran_covid'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
    	$this->form_validation->set_rules('alokasi', 'alokasi', 'callback_cek_alokasi');
        $this->form_validation->set_rules('id_sub_kegiatan', 'id_sub_kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_kegiatan', 'kegiatan', 'required');
        $this->form_validation->set_rules('id_output', 'Output', 'required');
    	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
        $this->form_validation->set_rules('tahap', 'Tahap', 'trim');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function cek_alokasi($str){
         if ($str == '' ){
                        
                        $this->form_validation->set_message('cek_alokasi', 'The required');
                        return FALSE;
         }else{
                if($this->input->post('level') > 2){
                   $row = $this->M_alokasi_anggaran_covid_model->get_by_id($this->input->post('id_parent'));
                   $pagu_digunakan = $this->M_alokasi_anggaran_covid_model->pagu_digunakan($this->input->post('id_parent'));

                   $alokasi_available = ($row->alokasi_akhir - $pagu_digunakan[0]['pagu_digunakan']);
                   if(save_auto_numeric($str) > $alokasi_available){
                    $this->form_validation->set_message('cek_alokasi', 'Alokasi Tidak boleh melebihi sisa pagu ');
                    return FALSE;
                   }else{ return true; }
                }
                return TRUE;
         }
    }



    function unggahExcel(){
        //error_reporting(E_ALL & ~E_NOTICE);;
        error_reporting(0);
        ini_set('display_errors', 0);
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        if ($this->input->post('getItem')) {
            
            $type = explode('.', $_FILES["import"]["name"]); // data file
            $type = strtolower($type[count($type)-1]); // data type like .jpg
           
            // exit(dump($type));
            $inputFileName = "./assets/upload/tmp_alokasi_covid/".uniqid(rand()).'.'.$type; // hash unik
            //  echo $type;
            // exit();
            //echo '<br><br><br><br><br>';
            //print_r($kodeBarang);

            if(in_array($type, array("xls", "xlsx"))) {
                if(is_uploaded_file($_FILES["import"]["tmp_name"])) {
                    if(move_uploaded_file($_FILES["import"]["tmp_name"],$inputFileName)) {
                       
                        //  Read your Excel workbook
                        try {
                            $inputFileType = IOFactory::identify($inputFileName);
                            $objReader = IOFactory::createReader($inputFileType);
                            $objPHPExcel = $objReader->load($inputFileName);
                        } catch(Exception $e) {
                            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                        }

                       //function cek_duplikat_data_and_insert($no_urut,$kode_satker,$id_kegiatan,$output,$akun_belanja,$tahap,$alokasi)
                        //  Get worksheet dimensions
                        $sheet = $objPHPExcel->getSheet(0);
                        $highestRow = $sheet->getHighestRow();
                        $highestColumn = $sheet->getHighestColumn();

                            $cek = '';
                            for ($row = 2; $row <= $highestRow; $row++) 
                            {               //  Read a row of data into an array                
                                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);

                                if(!empty($rowData[0][2]))
                                {
                                    //echo $rowData[0][4];
                                    $cek .= $this->cek_duplikat_data_and_insert($rowData[0][0],$rowData[0][1],$rowData[0][3],$rowData[0][4],$rowData[0][5],'2',$rowData[0][6]);
                                }
                            }  

                            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                            </button><strong> '.$cek.'</strong></div>');
                            redirect(site_url('m_alokasi_anggaran_covid'));                  
                        
                    }
                }
            }
        }else{
            echo 'tidak di post';
        }
        
    }


    function cek_duplikat_data_and_insert($no_urut,$kode_satker,$id_kegiatan,$output,$akun_belanja,$tahap,$alokasi){
         // get id output
         $query_m_output = $this->db->get_where('m_sub_kegiatan_anggaran_covid', array('kode' => ''.$output.''), 1);
         $datas_m_output = $query_m_output->result_array();

         // get id akun belanja
         $query_m_belanja = $this->db->get_where('m_output_anggaran_covid', array('kode_output' => ''.$akun_belanja.''), 1);
         $datas_m_belanja = $query_m_belanja->result_array();

         $pesan_eror = '';
         $this->db->select('m_alokasi_anggaran_covid.id');
         $this->db->from('m_alokasi_anggaran_covid');
         $this->db->join('m_satker','m_satker.id_satker = m_alokasi_anggaran_covid.id_satker');
         $this->db->where('m_satker.kode_satker',''.$kode_satker.'');
         $this->db->where('m_alokasi_anggaran_covid.kegiatan',''.$id_kegiatan.'');
         $this->db->where('m_alokasi_anggaran_covid.id_sub_kegiatan',''.$output.'');
         $this->db->where('m_alokasi_anggaran_covid.tahap',''.$tahap.'');
         
         $data = $this->db->get();
         $result = $data->result_array();


         

         if(count($result) > 0){
            $pesan_eror .= 'No Urut '.$no_urut.' Gagal disave, data duplicate<br>';
         }else{
            $query = $this->db->get_where('m_satker', array('kode_satker' => $kode_satker), 1);
            $datas = $query->result_array();
            if(!empty($datas)){
                // cek satker
                 $sql = $this->db->get_where('m_alokasi_anggaran_covid', array('id_satker' => $datas[0]['id_satker']), 1);
                 $ds = $sql->result_array();
                 if(empty($ds)){
                    $d_in = array('id_satker' =>''.$datas[0]['id_satker'].'' ,
                                   'kegiatan'=>'0',
                                   'level'=>'0',
                                   'tahap'=>'0',
                                   'alokasi' => '0',
                                   'alokasi_akhir'=>'0',
                                   'create_date'=>''.date('Y-m-d H:i:s').'' 
                                     );
                    $this->db->insert('m_alokasi_anggaran_covid',$d_in);
                 }

                 //cek kegiatan
                 // cek satker
                 $sql2 = $this->db->get_where('m_alokasi_anggaran_covid', array('id_satker' => $datas[0]['id_satker'],'kegiatan' => ''.$id_kegiatan.''), 1);
                 $ds2 = $sql2->result_array();
                 if(empty($ds2)){
                    $d_in2 = array('id_satker' =>''.$datas[0]['id_satker'].'' ,
                                   'kegiatan'=>''.$id_kegiatan.'',
                                   'level'=>'1',
                                   'tahap'=>'0',
                                   'alokasi' => '0',
                                   'alokasi_akhir'=>'0',
                                   'create_date'=>''.date('Y-m-d H:i:s').'' 
                                     );
                    $this->db->insert('m_alokasi_anggaran_covid',$d_in2);
                 }

               
               $max_id = $this->db->query("SELECT MAX(id) as id FROM m_alokasi_anggaran_covid;");
               $g_max_id = $max_id->result_array(); 
               $d_ins = array('id_satker' =>''.$datas[0]['id_satker'].'' ,
                              'kegiatan'=>''.$id_kegiatan.'',
                              'id_sub_kegiatan'=>$datas_m_output[0]['id'],
                              'id_output'=>(!empty($akun_belanja)) ? $datas_m_belanja[0]['id'] : 0,
                              'level'=>(!empty($akun_belanja)) ? 3 : 2,
                              'tahap'=>''.$tahap.'',
                              'alokasi' => ''.$alokasi.'',
                              'alokasi_akhir'=>''.$alokasi.'',
                              'create_date'=>''.date('Y-m-d H:i:s').'',
                              'sumber_dana'=>'Babun',
                              'id_parent'=>$g_max_id[0]['id'] 
                             );
               $this->db->insert('m_alokasi_anggaran_covid',$d_ins);
            }else{
               $pesan_eror .= 'No Urut '.$no_urut.' gagal disave, kode satker tidak ditemukan'; 
            }
            
         }
        
        return $pesan_eror;
    }

}

/* End of file M_alokasi_anggaran_covid.php */
/* Location: ./application/controllers/M_alokasi_anggaran_covid.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-27 16:41:58 */
/* http://harviacode.com */