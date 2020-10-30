<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_alkes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_alkes_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_alkes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_alkes/index/';
            $config['first_url'] = base_url() . 'index.php/m_alkes/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_alkes_model->total_rows($q);
        $m_alkes = $this->M_alkes_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_alkes_data' => $m_alkes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_alkes/m_alkes_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_alkes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_alkes' => $row->id_alkes,
		'id_faskes' => $row->id_faskes,
		'kode_alkes' => $row->kode_alkes,
		'nama_alkes' => $row->nama_alkes,
		'kode_sarana' => $row->kode_sarana,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_alkes/m_alkes_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_alkes'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_alkes/create_action'),
	    'id_alkes' => set_value('id_alkes'),
	    'id_faskes' => set_value('id_faskes'),
	    'kode_alkes' => set_value('kode_alkes'),
	    'nama_alkes' => set_value('nama_alkes'),
	    'kode_sarana' => set_value('kode_sarana'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_alkes/m_alkes_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_faskes' => $this->input->post('id_faskes',TRUE),
		'kode_alkes' => $this->input->post('kode_alkes',TRUE),
		'nama_alkes' => $this->input->post('nama_alkes',TRUE),
		'kode_sarana' => $this->input->post('kode_sarana',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_alkes_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_alkes'));
        }
    }

    public function update($id)
    {
        $row = $this->M_alkes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_alkes/update_action'),
		'id_alkes' => set_value('id_alkes', $row->id_alkes),
		'id_faskes' => set_value('id_faskes', $row->id_faskes),
		'kode_alkes' => set_value('kode_alkes', $row->kode_alkes),
		'nama_alkes' => set_value('nama_alkes', $row->nama_alkes),
		'kode_sarana' => set_value('kode_sarana', $row->kode_sarana),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_alkes/m_alkes_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_alkes'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_alkes', TRUE));
        } else {
            $data = array(
		'id_faskes' => $this->input->post('id_faskes',TRUE),
		'kode_alkes' => $this->input->post('kode_alkes',TRUE),
		'nama_alkes' => $this->input->post('nama_alkes',TRUE),
		'kode_sarana' => $this->input->post('kode_sarana',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_alkes_model->update($this->input->post('id_alkes', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_alkes'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_alkes_model->get_by_id($id);

        if ($row) {
            $this->M_alkes_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_alkes'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_alkes'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_faskes', 'id faskes', 'trim|required');
	$this->form_validation->set_rules('kode_alkes', 'kode alkes', 'trim|required');
	$this->form_validation->set_rules('nama_alkes', 'nama alkes', 'trim|required');
	$this->form_validation->set_rules('kode_sarana', 'kode sarana', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_alkes', 'id_alkes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_alkes.xls";
        $judul = "m_alkes";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Faskes");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Alkes");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Alkes");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Sarana");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Isdeleted");

	foreach ($this->M_alkes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_faskes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_alkes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_alkes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_sarana);
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

/* End of file M_alkes.php */
/* Location: ./application/controllers/M_alkes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-30 08:36:28 */
/* http://harviacode.com */