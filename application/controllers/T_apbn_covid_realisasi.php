<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_apbn_covid_realisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_apbn_covid_realisasi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function realisasi($id_alokasi)
    {
        $data = array(
            'alokasi' => $this->T_apbn_covid_realisasi_model->get_alokasi_id($id_alokasi),
            'realisasi' => $this->T_apbn_covid_realisasi_model->get_realisasi($id_alokasi),
        );
        $this->template->load('template', 't_apbn_covid_realisasi/t_apbn_covid_realisasi_list', $data);
    }

    public function json($id_alokasi)
    {
        header('Content-Type: application/json');
        echo $this->T_apbn_covid_realisasi_model->json($id_alokasi);
    }

    public function index()
    {
        $kode_satker = $this->session->userdata('kode_satker');
        $data = array(
            'alokasi' => $this->T_apbn_covid_realisasi_model->get_alokasi($kode_satker),
        );
        $this->template->load('template', 't_apbn_covid_realisasi/t_apbn_covid_alokasi', $data);
    }

    public function read($id)
    {
        $row = $this->T_apbn_covid_realisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_realisasi' => $row->id_realisasi,
                'id_alokasi' => $row->id_alokasi,
                'volume' => $row->volume,
                'realisasi_persen' => $row->realisasi_persen,
                'realisasi_nilai' => $row->realisasi_nilai,
                'id_rincian_hambatan' => $row->id_rincian_hambatan,
                'tindak_lanjut' => $row->tindak_lanjut,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
            );
            $this->template->load('template', 't_apbn_covid_realisasi/t_apbn_covid_realisasi_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_apbn_covid_realisasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_apbn_covid_realisasi/create_action'),
            'id_realisasi' => set_value('id_realisasi'),
            'id_alokasi' => set_value('id_alokasi'),
            'volume' => set_value('volume'),
            'realisasi_persen' => set_value('realisasi_persen'),
            'realisasi_nilai' => set_value('realisasi_nilai'),
            'id_rincian_hambatan' => set_value('id_rincian_hambatan'),
            'tindak_lanjut' => set_value('tindak_lanjut'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
        );
        $this->template->load('template', 't_apbn_covid_realisasi/t_apbn_covid_realisasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_alokasi' => $this->input->post('id_alokasi', TRUE),
                'volume' => $this->input->post('volume', TRUE),
                'realisasi_persen' => $this->input->post('realisasi_persen', TRUE),
                'realisasi_nilai' => $this->input->post('realisasi_nilai', TRUE),
                'id_rincian_hambatan' => $this->input->post('id_rincian_hambatan', TRUE),
                'tindak_lanjut' => $this->input->post('tindak_lanjut', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
            );
            $id_alokasi = $this->input->post('id_alokasi');
            $this->T_apbn_covid_realisasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_apbn_covid_realisasi/realisasi/' . $id_alokasi));
        }
    }

    public function update($id)
    {
        $row = $this->T_apbn_covid_realisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_apbn_covid_realisasi/update_action'),
                'id_realisasi' => set_value('id_realisasi', $row->id_realisasi),
                'id_alokasi' => set_value('id_alokasi', $row->id_alokasi),
                'volume' => set_value('volume', $row->volume),
                'realisasi_persen' => set_value('realisasi_persen', $row->realisasi_persen),
                'realisasi_nilai' => set_value('realisasi_nilai', $row->realisasi_nilai),
                'id_rincian_hambatan' => set_value('id_rincian_hambatan', $row->id_rincian_hambatan),
                'tindak_lanjut' => set_value('tindak_lanjut', $row->tindak_lanjut),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
            );
            $this->template->load('template', 't_apbn_covid_realisasi/t_apbn_covid_realisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_apbn_covid_realisasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_realisasi', TRUE));
        } else {
            $data = array(
                'id_alokasi' => $this->input->post('id_alokasi', TRUE),
                'volume' => $this->input->post('volume', TRUE),
                'realisasi_persen' => $this->input->post('realisasi_persen', TRUE),
                'realisasi_nilai' => $this->input->post('realisasi_nilai', TRUE),
                'id_rincian_hambatan' => $this->input->post('id_rincian_hambatan', TRUE),
                'tindak_lanjut' => $this->input->post('tindak_lanjut', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
            );

            $this->T_apbn_covid_realisasi_model->update($this->input->post('id_realisasi', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_apbn_covid_realisasi'));
        }
    }

    public function delete($id, $id_alokasi)
    {
        $row = $this->T_apbn_covid_realisasi_model->get_by_id($id);

        if ($row) {
            $this->T_apbn_covid_realisasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_apbn_covid_realisasi/realisasi/' . $id_alokasi));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_apbn_covid_realisasi/realisasi/' . $id_alokasi));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_alokasi', 'id alokasi', 'trim|required');
        $this->form_validation->set_rules('volume', 'volume', 'trim|required');
        $this->form_validation->set_rules('realisasi_persen', 'realisasi persen', 'trim|required');
        $this->form_validation->set_rules('realisasi_nilai', 'realisasi nilai', 'trim|required');
        $this->form_validation->set_rules('id_rincian_hambatan', 'id rincian hambatan', 'trim|required');
        $this->form_validation->set_rules('tindak_lanjut', 'tindak lanjut', 'trim|required');
        $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');

        $this->form_validation->set_rules('id_realisasi', 'id_realisasi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_apbn_covid_realisasi.xls";
        $judul = "t_apbn_covid_realisasi";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Alokasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Volume");
        xlsWriteLabel($tablehead, $kolomhead++, "Realisasi Persen");
        xlsWriteLabel($tablehead, $kolomhead++, "Realisasi Nilai");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Rincian Hambatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Tindak Lanjut");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

        foreach ($this->T_apbn_covid_realisasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_alokasi);
            xlsWriteNumber($tablebody, $kolombody++, $data->volume);
            xlsWriteNumber($tablebody, $kolombody++, $data->realisasi_persen);
            xlsWriteLabel($tablebody, $kolombody++, $data->realisasi_nilai);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_rincian_hambatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->tindak_lanjut);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file T_apbn_covid_realisasi.php */
/* Location: ./application/controllers/T_apbn_covid_realisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-27 16:56:04 */
/* http://harviacode.com */