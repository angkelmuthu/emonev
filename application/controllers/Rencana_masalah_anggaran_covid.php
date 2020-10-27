<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rencana_masalah_anggaran_covid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Rencana_masalah_anggaran_covid_model');
        $this->load->library('form_validation');
    }

    public function index($id_alokasi=null)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/rencana_masalah_anggaran_covid/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/rencana_masalah_anggaran_covid/index/';
            $config['first_url'] = base_url() . 'index.php/rencana_masalah_anggaran_covid/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Rencana_masalah_anggaran_covid_model->total_rows($q);
        $rencana_masalah_anggaran_covid = $this->Rencana_masalah_anggaran_covid_model->get_limit_data($config['per_page'], $start, $q,$id_alokasi);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rencana_masalah_anggaran_covid_data' => $rencana_masalah_anggaran_covid,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'id_alokasi'=>$id_alokasi
        );
        $this->load->view('rencana_masalah_anggaran_covid/rencana_masalah_anggaran_covid_list', $data);
    }

    public function read($id)
    {
        $row = $this->Rencana_masalah_anggaran_covid_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_alokasi' => $row->id_alokasi,
		'rencana_penarikan_dana' => $row->rencana_penarikan_dana,
		'rencana_penarikan_dana_sd' => $row->rencana_penarikan_dana_sd,
		'permasalahan' => $row->permasalahan,
		'rencana_tindak_lanjut' => $row->rencana_tindak_lanjut,
		'create_date' => $row->create_date,
	    );
            $this->template->load('template','rencana_masalah_anggaran_covid/rencana_masalah_anggaran_covid_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('rencana_masalah_anggaran_covid'));
        }
    }

    public function create($id_alokasi = null)
    {
        $rencana_penarikan_dana = $this->Rencana_masalah_anggaran_covid_model->get_last($id_alokasi);
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('rencana_masalah_anggaran_covid/create_action'),
	    'id' => set_value('id'),
	    'id_alokasi' => $id_alokasi,
        'penarikan_akhir' =>$rencana_penarikan_dana,
	    'rencana_penarikan_dana' => set_value('rencana_penarikan_dana'),
	    'rencana_penarikan_dana_sd' => set_value('rencana_penarikan_dana_sd'),
	    'permasalahan' => set_value('permasalahan'),
	    'rencana_tindak_lanjut' => set_value('rencana_tindak_lanjut'),
	    'create_date' => set_value('create_date'),
        'aksi'=>'create'
	);
        $this->template->load('template','rencana_masalah_anggaran_covid/rencana_masalah_anggaran_covid_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id_alokasi',TRUE));
        } else {
            $data = array(
		'id_alokasi' => $this->input->post('id_alokasi',TRUE),
		'rencana_penarikan_dana' => $this->input->post('rencana_penarikan_dana',TRUE),
		'rencana_penarikan_dana_sd' => $this->input->post('rencana_penarikan_dana_sd',TRUE),
		'permasalahan' => $this->input->post('permasalahan',TRUE),
		'rencana_tindak_lanjut' => $this->input->post('rencana_tindak_lanjut',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->Rencana_masalah_anggaran_covid_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('rencana_masalah_anggaran_covid/create/'.$this->input->post('id_alokasi',TRUE).''));
        }
    }

    public function update($id)
    {
        $row = $this->Rencana_masalah_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rencana_masalah_anggaran_covid/update_action'),
		'id' => set_value('id', $row->id),
		'id_alokasi' => set_value('id_alokasi', $row->id_alokasi),
		'rencana_penarikan_dana' => set_value('rencana_penarikan_dana', $row->rencana_penarikan_dana),
		'rencana_penarikan_dana_sd' => set_value('rencana_penarikan_dana_sd', $row->rencana_penarikan_dana_sd),
		'permasalahan' => set_value('permasalahan', $row->permasalahan),
		'rencana_tindak_lanjut' => set_value('rencana_tindak_lanjut', $row->rencana_tindak_lanjut),
		'create_date' => set_value('create_date', $row->create_date),
        'aksi'=>'update'
	    );
            $this->template->load('template','rencana_masalah_anggaran_covid/rencana_masalah_anggaran_covid_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('rencana_masalah_anggaran_covid'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_alokasi' => $this->input->post('id_alokasi',TRUE),
		'rencana_penarikan_dana' => $this->input->post('rencana_penarikan_dana',TRUE),
		'rencana_penarikan_dana_sd' => $this->input->post('rencana_penarikan_dana_sd',TRUE),
		'permasalahan' => $this->input->post('permasalahan',TRUE),
		'rencana_tindak_lanjut' => $this->input->post('rencana_tindak_lanjut',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->Rencana_masalah_anggaran_covid_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('rencana_masalah_anggaran_covid/create/'.$this->input->post('id_alokasi',TRUE).''));
        }
    }

    public function delete($id,$id_alokasi)
    {
        $row = $this->Rencana_masalah_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $this->Rencana_masalah_anggaran_covid_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('rencana_masalah_anggaran_covid/create/'.$id_alokasi.''));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('rencana_masalah_anggaran_covid/create/'.$id_alokasi.''));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_alokasi', 'id alokasi', 'trim|required');
	$this->form_validation->set_rules('rencana_penarikan_dana', 'rencana penarikan dana', 'trim|required|numeric');
	$this->form_validation->set_rules('rencana_penarikan_dana_sd', 'rencana penarikan dana sd', 'trim|required|numeric');
	$this->form_validation->set_rules('permasalahan', 'permasalahan', 'trim|required');
	$this->form_validation->set_rules('rencana_tindak_lanjut', 'rencana tindak lanjut', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rencana_masalah_anggaran_covid.php */
/* Location: ./application/controllers/Rencana_masalah_anggaran_covid.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-02 21:13:41 */
/* http://harviacode.com */