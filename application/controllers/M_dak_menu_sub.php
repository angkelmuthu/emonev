<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_menu_sub extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dak_menu_sub_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_dak_menu_sub/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_dak_menu_sub/index/';
            $config['first_url'] = base_url() . 'index.php/m_dak_menu_sub/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_dak_menu_sub_model->total_rows($q);
        $m_dak_menu_sub = $this->M_dak_menu_sub_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_dak_menu_sub_data' => $m_dak_menu_sub,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_dak_menu_sub/m_dak_menu_sub_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_dak_menu_sub_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dak_menu_sub' => $row->id_dak_menu_sub,
		'dak' => $row->dak,
		'id_dak_menu_group' => $row->id_dak_menu_group,
		'nama' => $row->nama,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_dak_menu_sub/m_dak_menu_sub_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_menu_sub'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dak_menu_sub/create_action'),
	    'id_dak_menu_sub' => set_value('id_dak_menu_sub'),
	    'dak' => set_value('dak'),
	    'id_dak_menu_group' => set_value('id_dak_menu_group'),
	    'nama' => set_value('nama'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_dak_menu_sub/m_dak_menu_sub_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'dak' => $this->input->post('dak',TRUE),
		'id_dak_menu_group' => $this->input->post('id_dak_menu_group',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_menu_sub_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dak_menu_sub'));
        }
    }

    public function update($id)
    {
        $row = $this->M_dak_menu_sub_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dak_menu_sub/update_action'),
		'id_dak_menu_sub' => set_value('id_dak_menu_sub', $row->id_dak_menu_sub),
		'dak' => set_value('dak', $row->dak),
		'id_dak_menu_group' => set_value('id_dak_menu_group', $row->id_dak_menu_group),
		'nama' => set_value('nama', $row->nama),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_dak_menu_sub/m_dak_menu_sub_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_menu_sub'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dak_menu_sub', TRUE));
        } else {
            $data = array(
		'dak' => $this->input->post('dak',TRUE),
		'id_dak_menu_group' => $this->input->post('id_dak_menu_group',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_menu_sub_model->update($this->input->post('id_dak_menu_sub', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dak_menu_sub'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dak_menu_sub_model->get_by_id($id);

        if ($row) {
            $this->M_dak_menu_sub_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dak_menu_sub'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_menu_sub'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('dak', 'dak', 'trim|required');
	$this->form_validation->set_rules('id_dak_menu_group', 'id dak menu group', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_dak_menu_sub', 'id_dak_menu_sub', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_dak_menu_sub.php */
/* Location: ./application/controllers/M_dak_menu_sub.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-24 09:55:38 */
/* http://harviacode.com */