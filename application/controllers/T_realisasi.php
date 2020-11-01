<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_realisasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_realisasi_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->load('template', 't_realisasi/t_realisasi_list');
	}

	public function realisasi($idrincian)
	{
		$row = $this->T_realisasi_model->get_rincian($idrincian);
		$data = array(
			'id_rincian' => $row->id_rincian,
			'nama_menu_kegiatan' => $row->nama_menu_kegiatan,
			'nama_dak_komponen' => $row->nama_dak_komponen,
			'id_dak_alokasi' => $row->id_dak_alokasi,
			'nama_dak_rincian' => $row->nama_dak_rincian,
			'id_jenis_output' => $row->id_jenis_output,
			'nama_jenis_output' => $row->nama_jenis_output,
			'nama_alkes' => $row->nama_alkes,
			'id_dak_rincian' => $row->id_dak_rincian,
			'volume' => $row->volume,
			'harga_satuan' => $row->harga_satuan,
			'satuan' => $row->satuan,
			'total' => $row->total,
			'nama_sarana' => $row->nama_sarana,
			'nama_ruangan' => $row->nama_ruangan,
			'nama_instalasi' => $row->nama_instalasi,
			'nip_pengisi' => $row->nip_pengisi,
			'nama_pengisi' => $row->nama_pengisi,
			'jabatan_pengisi' => $row->jabatan_pengisi,
			'created_by' => $row->created_by,
			'created_date' => $row->created_date,
			// alokasi
			'id_alokasi' => $row->id_dak_alokasi,
			'id_dak_sub_bidang' => $row->id_dak_sub_bidang,
			'id_dak_kelompok' => $row->id_dak_kelompok,
			'id_satker' => $row->id_satker,
			'tahun' => $row->tahun,
			'nilai_alokasi' => $row->nilai_alokasi,
			'nama_dak_sub_bidang' => $row->nama_dak_sub_bidang,
			'dak_kelompok' => $row->dak_kelompok,
			'satker' => $row->satker,
			'realisasi' => $this->T_realisasi_model->get_realisasi($idrincian),
		);
		$this->template->load('template', 't_realisasi/t_realisasi_list', $data);
	}

	public function cari()
	{
		$this->template->load('template', 't_realisasi/t_realisasi_alokasi');
	}

	function get_alokasi()
	{
		$tahun = $this->input->post('tahun');
		$data = $this->T_realisasi_model->get_alokasi($tahun);
		echo json_encode($data);
	}

	public function read($id_alokasi, $idrincian, $idrealisasi)
	{
		$row = $this->T_realisasi_model->get_by_realisasi($idrealisasi);
		if ($row) {
			$data = array(
				'realisasi' => $this->T_realisasi_model->get_by_realisasi($idrealisasi),
			);
			$this->template->load('template', 't_realisasi/t_realisasi_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_realisasi/realisasi/' . $idrincian . '/' . $id_alokasi));
		}
	}

	public function create($idrincian, $idalokasi)
	{
		//$idrincian = $this->uri->segment(3);
		//$row = $this->T_realisasi_model->get_rincian($idrincian);
		$data = array(

			'button' => 'Simpan',
			'action' => site_url('t_realisasi/create_action'),
			'id_realisasi' => set_value('id_realisasi'),
			'id_rincian' => set_value('id_rincian'),
			'id_user' => set_value('id_user'),
			'periode' => set_value('periode'),
			'realisasi_fisik' => set_value('realisasi_fisik'),
			'realisasi_harga_satuan' => set_value('realisasi_harga_satuan'),
			'realisasi_satuan' => set_value('realisasi_satuan'),
			'realisasi_persen' => set_value('realisasi_persen'),
			'realisasi_nilai' => set_value('realisasi_nilai'),
			'id_progress' => set_value('id_progress'),
			'id_rincian_hambatan' => set_value('id_rincian_hambatan'),
			'rencana_tindak_lanjut' => set_value('rencana_tindak_lanjut'),
			//'pemanfaatan' => set_value('pemanfaatan'),
			'keterangan' => set_value('keterangan'),
			'nip_pengisi' => set_value('nip_pengisi'),
			'nama_pengisi' => set_value('nama_pengisi'),
			'jabatan_pengisi' => set_value('jabatan_pengisi'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdeleted' => set_value('isdeleted'),
			'dt_rincian' => $this->T_realisasi_model->get_rincian_id($idrincian),
			// 'id_rincian' => $row->id_rincian,
			// 'nama_menu_kegiatan' => $row->nama_menu_kegiatan,
			// 'id_dak_alokasi' => $row->id_dak_alokasi,
			// 'nama_dak_rincian' => $row->nama_dak_rincian,
			// 'id_dak_rincian' => $row->id_dak_rincian,
			// 'volume' => $row->volume,
			// 'harga_satuan' => $row->harga_satuan,
			// 'satuan' => $row->satuan,
			// 'total' => $row->total,
		);
		$this->template->load('template', 't_realisasi/t_realisasi_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Maaf, Data yang anda masukkan tidak lengkap.</strong></div>');
			redirect(site_url('t_realisasi/create/' . $this->input->post('id_rincian')));
		} else {
			$data = array(
				'id_rincian' => $this->input->post('id_rincian', TRUE),
				'id_user' => $this->input->post('id_user', TRUE),
				'periode' => $this->input->post('periode', TRUE),
				'realisasi_fisik' => $this->input->post('realisasi_fisik', TRUE),
				'realisasi_harga_satuan' => str_replace('.', '', $this->input->post('realisasi_harga_satuan', TRUE)),
				'realisasi_satuan' => $this->input->post('realisasi_satuan', TRUE),
				'realisasi_persen' => str_replace('%', '', $this->input->post('realisasi_persen', TRUE)),
				'realisasi_nilai' => str_replace('.', '', $this->input->post('realisasi_nilai', TRUE)),
				'id_progress' => $this->input->post('id_progress', TRUE),
				'id_rincian_hambatan' => $this->input->post('id_rincian_hambatan', TRUE),
				'rencana_tindak_lanjut' => $this->input->post('rencana_tindak_lanjut', TRUE),
				'pemanfaatan' => $this->input->post('pemanfaatan', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'nip_pengisi' => $this->input->post('nip_pengisi', TRUE),
				'nama_pengisi' => $this->input->post('nama_pengisi', TRUE),
				'jabatan_pengisi' => $this->input->post('jabatan_pengisi', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdeleted' => $this->input->post('isdeleted', TRUE),
			);
			$id_rincian = $this->input->post('id_rincian');
			$alokasi = $this->input->post('alokasi');
			$this->T_realisasi_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
			redirect(site_url('t_realisasi/realisasi/' . $id_rincian . '/' . $alokasi));
		}
	}

	public function update($idrincian, $idalokasi, $id)
	{
		$row = $this->T_realisasi_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_realisasi/update_action'),
				'id_realisasi' => set_value('id_realisasi', $row->id_realisasi),
				'id_rincian' => set_value('id_rincian', $row->id_rincian),
				'id_user' => set_value('id_user', $row->id_user),
				'periode' => set_value('periode', $row->periode),
				'realisasi_fisik' => set_value('realisasi_fisik', $row->realisasi_fisik),
				'realisasi_harga_satuan' => set_value('realisasi_harga_satuan', $row->realisasi_harga_satuan),
				'realisasi_satuan' => set_value('realisasi_satuan', $row->realisasi_satuan),
				'realisasi_persen' => set_value('realisasi_persen', $row->realisasi_persen),
				'realisasi_nilai' => set_value('realisasi_nilai', $row->realisasi_nilai),
				'id_progress' => set_value('id_progress', $row->id_progress),
				'id_rincian_hambatan' => set_value('id_rincian_hambatan', $row->id_rincian_hambatan),
				'rencana_tindak_lanjut' => set_value('rencana_tindak_lanjut', $row->rencana_tindak_lanjut),
				'pemanfaatan' => set_value('pemanfaatan', $row->pemanfaatan),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'nip_pengisi' => set_value('nip_pengisi'),
				'nama_pengisi' => set_value('nama_pengisi'),
				'jabatan_pengisi' => set_value('jabatan_pengisi'),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdeleted' => set_value('isdeleted', $row->isdeleted),
				'dt_rincian' => $this->T_realisasi_model->get_rincian_id($idrincian),
			);
			$this->template->load('template', 't_realisasi/t_realisasi_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_realisasi'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Maaf, Data yang anda masukkan tidak lengkap.</strong></div>');
			redirect(site_url('t_realisasi/create/' . $this->input->post('id_rincian')));
		} else {
			$data = array(
				'id_rincian' => $this->input->post('id_rincian', TRUE),
				'id_user' => $this->input->post('id_user', TRUE),
				'periode' => $this->input->post('periode', TRUE),
				'realisasi_fisik' => $this->input->post('realisasi_fisik', TRUE),
				'realisasi_harga_satuan' => str_replace('.', '', $this->input->post('realisasi_harga_satuan', TRUE)),
				'realisasi_satuan' => $this->input->post('realisasi_satuan', TRUE),
				'realisasi_persen' => str_replace('%', '', $this->input->post('realisasi_persen', TRUE)),
				'realisasi_nilai' => str_replace('.', '', $this->input->post('realisasi_nilai', TRUE)),
				'id_progress' => $this->input->post('id_progress', TRUE),
				'id_rincian_hambatan' => $this->input->post('id_rincian_hambatan', TRUE),
				'rencana_tindak_lanjut' => $this->input->post('rencana_tindak_lanjut', TRUE),
				'pemanfaatan' => $this->input->post('pemanfaatan', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'nip_pengisi' => $this->input->post('nip_pengisi', TRUE),
				'nama_pengisi' => $this->input->post('nama_pengisi', TRUE),
				'jabatan_pengisi' => $this->input->post('jabatan_pengisi', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdeleted' => $this->input->post('isdeleted', TRUE),
			);
			$id_rincian = $this->input->post('id_rincian');
			$alokasi = $this->input->post('alokasi');
			$this->T_realisasi_model->update($this->input->post('id_realisasi', TRUE), $data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
			redirect(site_url('t_realisasi/realisasi/' . $id_rincian . '/' . $alokasi));
		}
	}

	public function delete($id)
	{
		$row = $this->T_realisasi_model->get_by_id($id);

		if ($row) {
			$this->T_realisasi_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_realisasi'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_realisasi'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_rincian', 'id rincian', 'trim|required');
		$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
		$this->form_validation->set_rules('periode', 'periode', 'trim|required');
		$this->form_validation->set_rules('realisasi_fisik', 'realisasi fisik', 'trim|required');
		$this->form_validation->set_rules('realisasi_harga_satuan', 'realisasi harga satuan', 'trim|required');
		$this->form_validation->set_rules('realisasi_satuan', 'realisasi satuan', 'trim|required');
		$this->form_validation->set_rules('realisasi_persen', 'realisasi persen', 'trim|required');
		$this->form_validation->set_rules('realisasi_nilai', 'realisasi nilai', 'trim|required');
		$this->form_validation->set_rules('id_progress', 'id progress', 'trim|required');
		//$this->form_validation->set_rules('id_rincian_hambatan', 'id rincian hambatan', 'trim|required');
		//$this->form_validation->set_rules('rencana_tindak_lanjut', 'rencana tindak lanjut', 'trim|required');
		$this->form_validation->set_rules('pemanfaatan', 'pemanfaatan', 'trim|required');
		//$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('nip_pengisi', 'nip pengisi', 'trim|required');
		$this->form_validation->set_rules('nama_pengisi', 'nama pengisi', 'trim|required');
		$this->form_validation->set_rules('jabatan_pengisi', 'jabatan pengisi', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

		$this->form_validation->set_rules('id_realisasi', 'id_realisasi', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file T_realisasi.php */
/* Location: ./application/controllers/T_realisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-28 13:47:06 */
/* http://harviacode.com */