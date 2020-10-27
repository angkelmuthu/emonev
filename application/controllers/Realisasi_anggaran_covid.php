<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisasi_anggaran_covid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Realisasi_anggaran_covid_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        //print_r($_SESSION);
        $data['result']  = $this->Realisasi_anggaran_covid_model->data_parent();
        //echo $this->db->last_query();
        $this->template->load('template','realisasi_anggaran_covid/realisasi_parent', $data);

    }

    public function rekap()
    {
        //print_r($_SESSION);
        $data['result']  = $this->Realisasi_anggaran_covid_model->data_parent();
        //echo $this->db->last_query();
        $this->template->load('template','realisasi_anggaran_covid/rekap', $data);

    }

    public function index_child($id=null,$jenis=null)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/realisasi_anggaran_covid/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/realisasi_anggaran_covid/index/';
            $config['first_url'] = base_url() . 'index.php/realisasi_anggaran_covid/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Realisasi_anggaran_covid_model->total_rows($q);
        $realisasi_anggaran_covid = $this->Realisasi_anggaran_covid_model->get_limit_data($config['per_page'], $start, $q,$id,$jenis);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'realisasi_anggaran_covid_data' => $realisasi_anggaran_covid,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('realisasi_anggaran_covid/realisasi_anggaran_covid_list', $data,FALSE);
    }

    public function read($id)
    {
        $row = $this->Realisasi_anggaran_covid_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_alokasi_covid' => $row->id_alokasi_covid,
		'inputan_nilai' => $row->inputan_nilai,
		'jenis_input' => $row->jenis_input,
		'alokasi_akhir' => $row->alokasi_akhir,
		'total_akumulasi_rp' => $row->total_akumulasi_rp,
		'total_akumulasi_percen' => $row->total_akumulasi_percen,
	    );
            $this->template->load('template','realisasi_anggaran_covid/realisasi_anggaran_covid_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('realisasi_anggaran_covid'));
        }
    }

    public function create($id_alokasi_covid=null,$jenis=null)
    {
        $result  = $this->Realisasi_anggaran_covid_model->data_parent($id_alokasi_covid);
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('realisasi_anggaran_covid/create_action'),
	    'id' => set_value('id'),
	    'id_alokasi_covid' => $id_alokasi_covid,
        'total_akumulasi_akhir' => ($jenis == 'kontrak') ? $result[0]['r_kontrak'] : $result[0]['r_pembayaran'] ,
	    'inputan_nilai' => set_value('inputan_nilai'),
        'kategori_kontrak' => set_value('kategori_kontrak'),
	    'jenis_input' => $jenis,
	    'alokasi_akhir' => $result[0]['alokasi_akhir'],
	    'id_sub_kegiatan' => '',
	    'total_akumulasi_rp' => set_value('total_akumulasi_rp'),
	    'total_akumulasi_percen' => set_value('total_akumulasi_percen'),
        'record' => $result
	);
        $this->template->load('template','realisasi_anggaran_covid/realisasi_anggaran_covid_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_alokasi_covid' => $this->input->post('id_alokasi_covid',TRUE),
		'id_sub_kegiatan' => $this->input->post('id_sub_kegiatan',TRUE),
        'total_akumulasi_akhir' => save_auto_numeric($this->input->post('total_akumulasi_akhir',TRUE)),
		'inputan_nilai' => save_auto_numeric($this->input->post('inputan_nilai',TRUE)),
        'kategori_kontrak' => $this->input->post('kategori_kontrak',TRUE),
		'jenis_input' => $this->input->post('jenis_input',TRUE),
		'alokasi_akhir' => save_auto_numeric($this->input->post('alokasi_akhir',TRUE)),
		'total_akumulasi_rp' => save_auto_numeric($this->input->post('total_akumulasi_rp',TRUE)),
		'total_akumulasi_percen' => $this->input->post('total_akumulasi_percen',TRUE),
        'create_date' => date('Y-m-d H:i:s')
	    );

            $this->Realisasi_anggaran_covid_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('realisasi_anggaran_covid'));
        }
    }

    public function update($id)
    {
        $row = $this->Realisasi_anggaran_covid_model->get_by_id($id);
        $result  = $this->Realisasi_anggaran_covid_model->data_parent($row->id_alokasi_covid);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('realisasi_anggaran_covid/update_action'),
		'id' => set_value('id', $row->id),
		'id_alokasi_covid' => set_value('id_alokasi_covid', $row->id_alokasi_covid),
		'id_sub_kegiatan' => set_value('id_sub_kegiatan', $row->id_sub_kegiatan),
        'total_akumulasi_akhir' => set_value('total_akumulasi_akhir', $row->total_akumulasi_rp),
        'kategori_kontrak' => set_value('kategori_kontrak', $row->kategori_kontrak),
		'inputan_nilai' => set_value('inputan_nilai', $row->inputan_nilai),
		'jenis_input' => set_value('jenis_input', $row->jenis_input),
		'alokasi_akhir' => set_value('alokasi_akhir', $row->alokasi_akhir),
		'total_akumulasi_rp' => set_value('total_akumulasi_rp', $row->total_akumulasi_rp),
		'total_akumulasi_percen' => set_value('total_akumulasi_percen', $row->total_akumulasi_percen),
        'record' => $result
	    );
            $this->template->load('template','realisasi_anggaran_covid/realisasi_anggaran_covid_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('realisasi_anggaran_covid'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_alokasi_covid' => $this->input->post('id_alokasi_covid',TRUE),
		'id_sub_kegiatan' => $this->input->post('id_sub_kegiatan',TRUE),
        'total_akumulasi_akhir' => save_auto_numeric($this->input->post('total_akumulasi_akhir',TRUE)),
		'inputan_nilai' => save_auto_numeric($this->input->post('inputan_nilai',TRUE)),
        'kategori_kontrak' => $this->input->post('kategori_kontrak',TRUE),
		'jenis_input' => $this->input->post('jenis_input',TRUE),
		'alokasi_akhir' => save_auto_numeric($this->input->post('alokasi_akhir',TRUE)),
		'total_akumulasi_rp' => save_auto_numeric($this->input->post('total_akumulasi_rp',TRUE)),
		'total_akumulasi_percen' => $this->input->post('total_akumulasi_percen',TRUE),
	    );

            $this->Realisasi_anggaran_covid_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('realisasi_anggaran_covid'));
        }
    }

    public function delete($id)
    {
        $row = $this->Realisasi_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $this->Realisasi_anggaran_covid_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('realisasi_anggaran_covid'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('realisasi_anggaran_covid'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_alokasi_covid', 'id alokasi covid', 'trim|required');
	$this->form_validation->set_rules('inputan_nilai', 'inputan nilai', 'trim|required');
	$this->form_validation->set_rules('jenis_input', 'jenis input', 'trim|required');
	$this->form_validation->set_rules('alokasi_akhir', 'alokasi akhir', 'trim|required');
	$this->form_validation->set_rules('total_akumulasi_rp', 'total akumulasi rp', 'trim|required');
	$this->form_validation->set_rules('total_akumulasi_percen', 'total akumulasi percen', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Realisasi_anggaran_covid.php */
/* Location: ./application/controllers/Realisasi_anggaran_covid.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-02 19:04:35 */
/* http://harviacode.com */