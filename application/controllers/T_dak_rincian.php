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

	// function fetch_komponen($id_alokasi)
	// {
	// 	$data = array(
	// 		'komponen' => $this->T_dak_rincian_model->fetch_komponen($id_alokasi),
	// 	);
	// }

	function fetch_subkomponen()
	{
		if ($this->input->post('id_dak_komponen')) {
			echo $this->T_dak_rincian_model->fetch_subkomponen($this->input->post('id_dak_komponen'));
		}
	}

	function fetch_rincian()
	{
		if ($this->input->post('id_dak_sub_komponen')) {
			echo $this->T_dak_rincian_model->fetch_rincian($this->input->post('id_dak_sub_komponen'));
		}
	}

	function fetch_vrincian()
	{
		$id_dak_rincian = $this->input->post('id_dak_rincian');
		$data = $this->T_dak_rincian_model->fetch_vrincian($id_dak_rincian);
		echo json_encode($data);
	}

	function fetch_fasyankes()
	{
		if ($this->input->post('fasyankes')) {
			echo $this->T_dak_rincian_model->fetch_fasyankes($this->input->post('fasyankes'));
		}
	}

	function fetch_instalasi()
	{
		if ($this->input->post('fasyankes')) {
			echo $this->T_dak_rincian_model->fetch_instalasi($this->input->post('fasyankes'));
		}
	}
	function fetch_ruangan()
	{
		if ($this->input->post('instalasi')) {
			echo $this->T_dak_rincian_model->fetch_ruangan($this->input->post('instalasi'));
		}
	}
	function fetch_sarana()
	{
		if ($this->input->post('ruangan')) {
			echo $this->T_dak_rincian_model->fetch_sarana($this->input->post('ruangan'));
		}
	}
	function fetch_alkes()
	{
		if ($this->input->post('sarana')) {
			echo $this->T_dak_rincian_model->fetch_alkes($this->input->post('sarana'));
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
				'id_satuan' => $row->id_satuan,
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
		$id_alokasi = $this->uri->segment(3);
		$row = $this->T_dak_rincian_model->get_valokasi($id_alokasi);
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
			'id_satuan' => set_value('id_satuan'),
			'total' => set_value('total'),
			'sarana' => set_value('sarana'),
			'nip_pengisi' => set_value('nip_pengisi'),
			'nama_pengisi' => set_value('nama_pengisi'),
			'jabatan_pengisi' => set_value('jabatan_pengisi'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdeleted' => set_value('isdeleted'),
			'id_dak_alokasi' => $row->id_dak_alokasi,
			'id_satker' => $row->id_satker,
			'satker' => $row->satker,
			'tahun' => $row->tahun,
			'nilai_alokasi' => $row->nilai_alokasi,
			'sisa_alokasi' => $row->sisa_alokasi,
			'id_dak_sub_bidang' => $row->id_dak_sub_bidang,
			'nama_dak_sub_bidang' => $row->nama_dak_sub_bidang,
			'komponen' => $this->T_dak_rincian_model->fetch_komponen($id_alokasi),
		);
		$this->template->load('template', 't_dak_rincian/t_dak_rincian_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			redirect(site_url('t_dak_rincian/create/' . $this->input->post('id_dak_alokasi')));
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
				'harga_satuan' => str_replace('.', '', $this->input->post('harga_satuan', TRUE)),
				'volume' => $this->input->post('volume', TRUE),
				'volume_perubahan' => $this->input->post('volume_perubahan', TRUE),
				'id_satuan' => $this->input->post('id_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'kode_satker_lokasi' => $this->input->post('kode_satker_lokasi', TRUE),
				'kode_nonsatker_lokasi' => $this->input->post('kode_nonsatker_lokasi', TRUE),
				'sarana' => $this->input->post('sarana', TRUE),
				'nip_pengisi' => $this->input->post('nip_pengisi', TRUE),
				'nama_pengisi' => $this->input->post('nama_pengisi', TRUE),
				'jabatan_pengisi' => $this->input->post('jabatan_pengisi', TRUE),
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
			redirect(site_url('t_dak_rincian/rincian/' . $this->input->post('id_dak_alokasi')));
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
				'id_satuan' => set_value('id_satuan', $row->satuan),
				'total' => set_value('total', $row->total),
				'sarana' => set_value('sarana', $row->sarana),
				'nip_pengisi' => set_value('nip_pengisi', $row->nip_pengisi),
				'nama_pengisi' => set_value('nama_pengisi', $row->nama_pengisi),
				'jabatan_pengisi' => set_value('jabatan_pengisi', $row->jabatan_pengisi),
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
				'id_satuan' => $this->input->post('id_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'sarana' => $this->input->post('sarana', TRUE),
				'nip_pengisi' => $this->input->post('nip_pengisi', TRUE),
				'nama_pengisi' => $this->input->post('nama_pengisi', TRUE),
				'jabatan_pengisi' => $this->input->post('jabatan_pengisi', TRUE),
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

	public function delete($id, $id_alokasi)
	{
		$row = $this->T_dak_rincian_model->get_by_id($id);

		if ($row) {
			$this->T_dak_rincian_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_dak_rincian/rincian/' . $id_alokasi));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian/rincian/' . $id_alokasi));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
		$this->form_validation->set_rules('id_dak_alokasi', 'id dak alokasi', 'trim|required');
		$this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'trim|required');
		//$this->form_validation->set_rules('id_dak_bidang', 'id dak bidang', 'trim|required');
		$this->form_validation->set_rules('id_dak_sub_bidang', 'id dak sub bidang', 'trim|required');
		$this->form_validation->set_rules('id_dak_komponen', 'id dak komponen', 'trim|required');
		$this->form_validation->set_rules('id_dak_komponen_sub', 'id dak komponen sub', 'trim|required');
		//$this->form_validation->set_rules('menu_kegiatan', 'menu kegiatan', 'trim|required');
		//$this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
		$this->form_validation->set_rules('id_dak_rincian', 'id dak rincian', 'trim|required');
		//$this->form_validation->set_rules('id_alkes', 'id alkes', 'trim|required');
		$this->form_validation->set_rules('id_jenis_output', 'id jenis output', 'trim|required');
		$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
		$this->form_validation->set_rules('volume', 'volume', 'trim|required');
		//$this->form_validation->set_rules('volume_perubahan', 'volume perubahan', 'trim|required');
		$this->form_validation->set_rules('id_satuan', 'id_satuan', 'trim|required');
		$this->form_validation->set_rules('total', 'total', 'trim|required');
		$this->form_validation->set_rules('sarana', 'sarana', 'trim|required');
		$this->form_validation->set_rules('nip_pengisi', 'nip pengisi', 'trim|required');
		$this->form_validation->set_rules('nama_pengisi', 'nama pengisi', 'trim|required');
		$this->form_validation->set_rules('jabatan_pengisi', 'jabatan pengisi', 'trim|required');
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
