<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_hambatan_rincian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_hambatan_rincian_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_hambatan_rincian/m_hambatan_rincian_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_hambatan_rincian_model->json();
    }

    public function read($id)
    {
        $row = $this->M_hambatan_rincian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rincian_hambatan' => $row->id_rincian_hambatan,
		'id_hambatan' => $row->id_hambatan,
		'nama_rincian_hambatan' => $row->nama_rincian_hambatan,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_hambatan_rincian/m_hambatan_rincian_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_hambatan_rincian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_hambatan_rincian/create_action'),
	    'id_rincian_hambatan' => set_value('id_rincian_hambatan'),
	    'id_hambatan' => set_value('id_hambatan'),
	    'nama_rincian_hambatan' => set_value('nama_rincian_hambatan'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_hambatan_rincian/m_hambatan_rincian_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_hambatan' => $this->input->post('id_hambatan',TRUE),
		'nama_rincian_hambatan' => $this->input->post('nama_rincian_hambatan',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_hambatan_rincian_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_hambatan_rincian'));
        }
    }

    public function update($id)
    {
        $row = $this->M_hambatan_rincian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_hambatan_rincian/update_action'),
		'id_rincian_hambatan' => set_value('id_rincian_hambatan', $row->id_rincian_hambatan),
		'id_hambatan' => set_value('id_hambatan', $row->id_hambatan),
		'nama_rincian_hambatan' => set_value('nama_rincian_hambatan', $row->nama_rincian_hambatan),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_hambatan_rincian/m_hambatan_rincian_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_hambatan_rincian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rincian_hambatan', TRUE));
        } else {
            $data = array(
		'id_hambatan' => $this->input->post('id_hambatan',TRUE),
		'nama_rincian_hambatan' => $this->input->post('nama_rincian_hambatan',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_hambatan_rincian_model->update($this->input->post('id_rincian_hambatan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_hambatan_rincian'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_hambatan_rincian_model->get_by_id($id);

        if ($row) {
            $this->M_hambatan_rincian_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_hambatan_rincian'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_hambatan_rincian'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_hambatan', 'id hambatan', 'trim|required');
	$this->form_validation->set_rules('nama_rincian_hambatan', 'nama rincian hambatan', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_rincian_hambatan', 'id_rincian_hambatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_hambatan_rincian.php */
/* Location: ./application/controllers/M_hambatan_rincian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-30 08:47:56 */
/* http://harviacode.com */