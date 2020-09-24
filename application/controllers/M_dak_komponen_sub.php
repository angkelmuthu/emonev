<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_komponen_sub extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dak_komponen_sub_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_dak_komponen_sub/m_dak_komponen_sub_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_dak_komponen_sub_model->json();
    }

    public function read($id)
    {
        $row = $this->M_dak_komponen_sub_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dak_komponen_sub' => $row->id_dak_komponen_sub,
		'id_dak_komponen' => $row->id_dak_komponen,
		'kode_dak_komponen_sub' => $row->kode_dak_komponen_sub,
		'nama_dak_komponen_sub' => $row->nama_dak_komponen_sub,
		'isalkes' => $row->isalkes,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_dak_komponen_sub/m_dak_komponen_sub_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_komponen_sub'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dak_komponen_sub/create_action'),
	    'id_dak_komponen_sub' => set_value('id_dak_komponen_sub'),
	    'id_dak_komponen' => set_value('id_dak_komponen'),
	    'kode_dak_komponen_sub' => set_value('kode_dak_komponen_sub'),
	    'nama_dak_komponen_sub' => set_value('nama_dak_komponen_sub'),
	    'isalkes' => set_value('isalkes'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_dak_komponen_sub/m_dak_komponen_sub_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dak_komponen' => $this->input->post('id_dak_komponen',TRUE),
		'kode_dak_komponen_sub' => $this->input->post('kode_dak_komponen_sub',TRUE),
		'nama_dak_komponen_sub' => $this->input->post('nama_dak_komponen_sub',TRUE),
		'isalkes' => $this->input->post('isalkes',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_komponen_sub_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dak_komponen_sub'));
        }
    }

    public function update($id)
    {
        $row = $this->M_dak_komponen_sub_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dak_komponen_sub/update_action'),
		'id_dak_komponen_sub' => set_value('id_dak_komponen_sub', $row->id_dak_komponen_sub),
		'id_dak_komponen' => set_value('id_dak_komponen', $row->id_dak_komponen),
		'kode_dak_komponen_sub' => set_value('kode_dak_komponen_sub', $row->kode_dak_komponen_sub),
		'nama_dak_komponen_sub' => set_value('nama_dak_komponen_sub', $row->nama_dak_komponen_sub),
		'isalkes' => set_value('isalkes', $row->isalkes),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_dak_komponen_sub/m_dak_komponen_sub_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_komponen_sub'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dak_komponen_sub', TRUE));
        } else {
            $data = array(
		'id_dak_komponen' => $this->input->post('id_dak_komponen',TRUE),
		'kode_dak_komponen_sub' => $this->input->post('kode_dak_komponen_sub',TRUE),
		'nama_dak_komponen_sub' => $this->input->post('nama_dak_komponen_sub',TRUE),
		'isalkes' => $this->input->post('isalkes',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_komponen_sub_model->update($this->input->post('id_dak_komponen_sub', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dak_komponen_sub'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dak_komponen_sub_model->get_by_id($id);

        if ($row) {
            $this->M_dak_komponen_sub_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dak_komponen_sub'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_komponen_sub'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_dak_komponen', 'id dak komponen', 'trim|required');
	$this->form_validation->set_rules('kode_dak_komponen_sub', 'kode dak komponen sub', 'trim|required');
	$this->form_validation->set_rules('nama_dak_komponen_sub', 'nama dak komponen sub', 'trim|required');
	$this->form_validation->set_rules('isalkes', 'isalkes', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_dak_komponen_sub', 'id_dak_komponen_sub', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_dak_komponen_sub.xls";
        $judul = "m_dak_komponen_sub";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dak Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Dak Komponen Sub");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Dak Komponen Sub");
	xlsWriteLabel($tablehead, $kolomhead++, "Isalkes");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Isdeleted");

	foreach ($this->M_dak_komponen_sub_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dak_komponen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_dak_komponen_sub);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dak_komponen_sub);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isalkes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isdeleted);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_dak_komponen_sub.php */
/* Location: ./application/controllers/M_dak_komponen_sub.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-24 09:47:22 */
/* http://harviacode.com */