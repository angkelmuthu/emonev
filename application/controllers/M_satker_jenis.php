<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_satker_jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_satker_jenis_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_satker_jenis/m_satker_jenis_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_satker_jenis_model->json();
    }

    public function read($id)
    {
        $row = $this->M_satker_jenis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_satker_jenis' => $row->id_satker_jenis,
		'nama_satker_jenis' => $row->nama_satker_jenis,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_satker_jenis/m_satker_jenis_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satker_jenis'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_satker_jenis/create_action'),
	    'id_satker_jenis' => set_value('id_satker_jenis'),
	    'nama_satker_jenis' => set_value('nama_satker_jenis'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_satker_jenis/m_satker_jenis_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_satker_jenis' => $this->input->post('nama_satker_jenis',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_satker_jenis_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_satker_jenis'));
        }
    }

    public function update($id)
    {
        $row = $this->M_satker_jenis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_satker_jenis/update_action'),
		'id_satker_jenis' => set_value('id_satker_jenis', $row->id_satker_jenis),
		'nama_satker_jenis' => set_value('nama_satker_jenis', $row->nama_satker_jenis),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_satker_jenis/m_satker_jenis_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satker_jenis'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satker_jenis', TRUE));
        } else {
            $data = array(
		'nama_satker_jenis' => $this->input->post('nama_satker_jenis',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_satker_jenis_model->update($this->input->post('id_satker_jenis', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_satker_jenis'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_satker_jenis_model->get_by_id($id);

        if ($row) {
            $this->M_satker_jenis_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_satker_jenis'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satker_jenis'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_satker_jenis', 'nama satker jenis', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_satker_jenis', 'id_satker_jenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_satker_jenis.php */
/* Location: ./application/controllers/M_satker_jenis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-24 09:07:59 */
/* http://harviacode.com */