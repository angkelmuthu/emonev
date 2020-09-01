<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_dak_rincian extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_dak_rincian_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function rincian($id_alokasi)
	{
		$row = $this->T_dak_rincian_model->get_alokasi($id_alokasi);
		if ($row) {
			$data = array(
				'id_alokasi' => $id_alokasi,
				'id_dak_sub_bidang' => $row->id_dak_sub_bidang,
				'id_dak_kelompok' => $row->id_dak_kelompok,
				'id_satker' => $row->id_satker,
				'tahun' => $row->tahun,
				'nilai_alokasi' => $row->nilai_alokasi,
				'nama_dak_sub_bidang' => $row->nama_dak_sub_bidang,
				'dak_kelompok' => $row->dak_kelompok,
				'satker' => $row->satker,
				'dt_rincian' => $this->T_dak_rincian_model->get_rincian($id_alokasi),
			);
			$this->template->load('template', 't_dak_rincian/t_dak_rincian_list', $data);
		}
	}

	public function read($id)
	{
		$row = $this->T_dak_rincian_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_rincian' => $row->id_rincian,
				'id_satker' => $row->id_satker,
				'id_dak_alokasi' => $row->id_dak_alokasi,
				'tahun_anggaran' => $row->tahun_anggaran,
				'id_dak_bidang' => $row->id_dak_bidang,
				'id_dak_sub_bidang' => $row->id_dak_sub_bidang,
				'id_dak_komponen' => $row->id_dak_komponen,
				'id_dak_komponen_sub' => $row->id_dak_komponen_sub,
				'menu_kegiatan' => $row->menu_kegiatan,
				'kegiatan' => $row->kegiatan,
				'id_dak_rincian' => $row->id_dak_rincian,
				'id_alkes' => $row->id_alkes,
				'id_jenis_output' => $row->id_jenis_output,
				'harga_satuan' => $row->harga_satuan,
				'volume' => $row->volume,
				'volume_perubahan' => $row->volume_perubahan,
				'satuan' => $row->satuan,
				'total' => $row->total,
				'sarana' => $row->sarana,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'isdeleted' => $row->isdeleted,
			);
			$this->template->load('template', 't_dak_rincian/t_dak_rincian_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('t_dak_rincian/create_action'),
			'id_rincian' => set_value('id_rincian'),
			'id_satker' => set_value('id_satker'),
			'id_dak_alokasi' => set_value('id_dak_alokasi'),
			'tahun_anggaran' => set_value('tahun_anggaran'),
			'id_dak_bidang' => set_value('id_dak_bidang'),
			'id_dak_sub_bidang' => set_value('id_dak_sub_bidang'),
			'id_dak_komponen' => set_value('id_dak_komponen'),
			'id_dak_komponen_sub' => set_value('id_dak_komponen_sub'),
			'menu_kegiatan' => set_value('menu_kegiatan'),
			'kegiatan' => set_value('kegiatan'),
			'id_dak_rincian' => set_value('id_dak_rincian'),
			'id_alkes' => set_value('id_alkes'),
			'id_jenis_output' => set_value('id_jenis_output'),
			'harga_satuan' => set_value('harga_satuan'),
			'volume' => set_value('volume'),
			'volume_perubahan' => set_value('volume_perubahan'),
			'satuan' => set_value('satuan'),
			'total' => set_value('total'),
			'sarana' => set_value('sarana'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdeleted' => set_value('isdeleted'),
		);
		$this->template->load('template', 't_dak_rincian/t_dak_rincian_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id_satker' => $this->input->post('id_satker', TRUE),
				'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
				'tahun_anggaran' => $this->input->post('tahun_anggaran', TRUE),
				'id_dak_bidang' => $this->input->post('id_dak_bidang', TRUE),
				'id_dak_sub_bidang' => $this->input->post('id_dak_sub_bidang', TRUE),
				'id_dak_komponen' => $this->input->post('id_dak_komponen', TRUE),
				'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub', TRUE),
				'menu_kegiatan' => $this->input->post('menu_kegiatan', TRUE),
				'kegiatan' => $this->input->post('kegiatan', TRUE),
				'id_dak_rincian' => $this->input->post('id_dak_rincian', TRUE),
				'id_alkes' => $this->input->post('id_alkes', TRUE),
				'id_jenis_output' => $this->input->post('id_jenis_output', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'volume' => $this->input->post('volume', TRUE),
				'volume_perubahan' => $this->input->post('volume_perubahan', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'sarana' => $this->input->post('sarana', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdeleted' => $this->input->post('isdeleted', TRUE),
			);

			$this->T_dak_rincian_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
			redirect(site_url('t_dak_rincian'));
		}
	}

	public function update($id)
	{
		$row = $this->T_dak_rincian_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_dak_rincian/update_action'),
				'id_rincian' => set_value('id_rincian', $row->id_rincian),
				'id_satker' => set_value('id_satker', $row->id_satker),
				'id_dak_alokasi' => set_value('id_dak_alokasi', $row->id_dak_alokasi),
				'tahun_anggaran' => set_value('tahun_anggaran', $row->tahun_anggaran),
				'id_dak_bidang' => set_value('id_dak_bidang', $row->id_dak_bidang),
				'id_dak_sub_bidang' => set_value('id_dak_sub_bidang', $row->id_dak_sub_bidang),
				'id_dak_komponen' => set_value('id_dak_komponen', $row->id_dak_komponen),
				'id_dak_komponen_sub' => set_value('id_dak_komponen_sub', $row->id_dak_komponen_sub),
				'menu_kegiatan' => set_value('menu_kegiatan', $row->menu_kegiatan),
				'kegiatan' => set_value('kegiatan', $row->kegiatan),
				'id_dak_rincian' => set_value('id_dak_rincian', $row->id_dak_rincian),
				'id_alkes' => set_value('id_alkes', $row->id_alkes),
				'id_jenis_output' => set_value('id_jenis_output', $row->id_jenis_output),
				'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
				'volume' => set_value('volume', $row->volume),
				'volume_perubahan' => set_value('volume_perubahan', $row->volume_perubahan),
				'satuan' => set_value('satuan', $row->satuan),
				'total' => set_value('total', $row->total),
				'sarana' => set_value('sarana', $row->sarana),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdeleted' => set_value('isdeleted', $row->isdeleted),
			);
			$this->template->load('template', 't_dak_rincian/t_dak_rincian_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_rincian', TRUE));
		} else {
			$data = array(
				'id_satker' => $this->input->post('id_satker', TRUE),
				'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
				'tahun_anggaran' => $this->input->post('tahun_anggaran', TRUE),
				'id_dak_bidang' => $this->input->post('id_dak_bidang', TRUE),
				'id_dak_sub_bidang' => $this->input->post('id_dak_sub_bidang', TRUE),
				'id_dak_komponen' => $this->input->post('id_dak_komponen', TRUE),
				'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub', TRUE),
				'menu_kegiatan' => $this->input->post('menu_kegiatan', TRUE),
				'kegiatan' => $this->input->post('kegiatan', TRUE),
				'id_dak_rincian' => $this->input->post('id_dak_rincian', TRUE),
				'id_alkes' => $this->input->post('id_alkes', TRUE),
				'id_jenis_output' => $this->input->post('id_jenis_output', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'volume' => $this->input->post('volume', TRUE),
				'volume_perubahan' => $this->input->post('volume_perubahan', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'sarana' => $this->input->post('sarana', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdeleted' => $this->input->post('isdeleted', TRUE),
			);

			$this->T_dak_rincian_model->update($this->input->post('id_rincian', TRUE), $data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
			redirect(site_url('t_dak_rincian'));
		}
	}

	public function delete($id)
	{
		$row = $this->T_dak_rincian_model->get_by_id($id);

		if ($row) {
			$this->T_dak_rincian_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_dak_rincian'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
		$this->form_validation->set_rules('id_dak_alokasi', 'id dak alokasi', 'trim|required');
		$this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'trim|required');
		$this->form_validation->set_rules('id_dak_bidang', 'id dak bidang', 'trim|required');
		$this->form_validation->set_rules('id_dak_sub_bidang', 'id dak sub bidang', 'trim|required');
		$this->form_validation->set_rules('id_dak_komponen', 'id dak komponen', 'trim|required');
		$this->form_validation->set_rules('id_dak_komponen_sub', 'id dak komponen sub', 'trim|required');
		$this->form_validation->set_rules('menu_kegiatan', 'menu kegiatan', 'trim|required');
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
		$this->form_validation->set_rules('id_dak_rincian', 'id dak rincian', 'trim|required');
		$this->form_validation->set_rules('id_alkes', 'id alkes', 'trim|required');
		$this->form_validation->set_rules('id_jenis_output', 'id jenis output', 'trim|required');
		$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
		$this->form_validation->set_rules('volume', 'volume', 'trim|required');
		$this->form_validation->set_rules('volume_perubahan', 'volume perubahan', 'trim|required');
		$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
		$this->form_validation->set_rules('total', 'total', 'trim|required');
		$this->form_validation->set_rules('sarana', 'sarana', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

		$this->form_validation->set_rules('id_rincian', 'id_rincian', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file T_dak_rincian.php */
/* Location: ./application/controllers/T_dak_rincian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-01 16:32:34 */
/* http://harviacode.com */