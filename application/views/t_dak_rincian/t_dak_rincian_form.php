<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA T_DAK_RINCIAN</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<form action="<?php echo $action; ?>" method="post">

							<table class='table table-striped'>


								<tr>
									<td width='200'>Id Satker <?php echo form_error('id_satker') ?></td>
									<td><input type="text" class="form-control" name="id_satker" id="id_satker" placeholder="Id Satker" value="<?php echo $this->session->userdata('id_users') ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Id Dak Alokasi <?php echo form_error('id_dak_alokasi') ?></td>
									<td><input type="text" class="form-control" name="id_dak_alokasi" id="id_dak_alokasi" placeholder="Id Dak Alokasi" value="<?php echo $id_dak_alokasi; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tahun Anggaran <?php echo form_error('tahun_anggaran') ?></td>
									<td><input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" placeholder="Tahun Anggaran" value="<?php echo $tahun_anggaran; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Id Dak Bidang <?php echo form_error('id_dak_bidang') ?></td>
									<td><input type="text" class="form-control" name="id_dak_bidang" id="id_dak_bidang" placeholder="Id Dak Bidang" value="<?php echo $id_dak_bidang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Id Dak Sub Bidang <?php echo form_error('id_dak_sub_bidang') ?></td>
									<td><input type="text" class="form-control" name="id_dak_sub_bidang" id="id_dak_sub_bidang" placeholder="Id Dak Sub Bidang" value="<?php echo $id_dak_sub_bidang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Id Dak Komponen <?php echo form_error('id_dak_komponen') ?></td>
									<td>
										<div class="form-group">
											<select name="id_dak_komponen" class="select2 form-control w-100">
												<?php
												// $this->db->where('id_dak_alokasi', $_POST['idalokasi']);
												$row = $this->db->get('m_dak_komponen')->result();

												foreach ($row as $dt) { ?>
													<option value="<?php echo $dt->id_dak_komponen ?>"><?php echo $dt->nama_dak_komponen ?></option>
												<?php } ?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Id Dak Komponen Sub <?php echo form_error('id_dak_komponen_sub') ?></td>
									<td>
										<select name="id_dak_komponen_sub" class="select2 form-control w-100">
											<?php
											// $this->db->where('id_dak_alokasi', $_POST['idalokasi']);
											$row = $this->db->get('m_dak_komponen_sub')->result();

											foreach ($row as $dt) { ?>
												<option value="<?php echo $dt->id_dak_komponen_sub ?>"><?php echo $dt->nama_dak_komponen_sub ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Menu Kegiatan <?php echo form_error('menu_kegiatan') ?></td>
									<td><input type="text" class="form-control" name="menu_kegiatan" id="menu_kegiatan" placeholder="Menu Kegiatan" value="<?php echo $menu_kegiatan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kegiatan <?php echo form_error('kegiatan') ?></td>
									<td><input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" value="<?php echo $kegiatan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Id Dak Rincian <?php echo form_error('id_dak_rincian') ?></td>
									<td>
										<select name="id_dak_rincian" class="select2 form-control w-100">
											<?php
											// $this->db->where('id_dak_alokasi', $_POST['idalokasi']);
											$row = $this->db->get('m_dak_rincian')->result();

											foreach ($row as $dt) { ?>
												<option value="<?php echo $dt->id_dak_rincian ?>"><?php echo $dt->nama_dak_rincian ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Id Alkes <?php echo form_error('id_alkes') ?></td>
									<td><input type="text" class="form-control" name="id_alkes" id="id_alkes" placeholder="Id Alkes" value="<?php echo $id_alkes; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Id Jenis Output <?php echo form_error('id_jenis_output') ?></td>
									<td><input type="text" class="form-control" name="id_jenis_output" id="id_jenis_output" placeholder="Id Jenis Output" value="<?php echo $id_jenis_output; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
									<td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Volume <?php echo form_error('volume') ?></td>
									<td><input type="number" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Volume Perubahan <?php echo form_error('volume_perubahan') ?></td>
									<td><input type="number" class="form-control" name="volume_perubahan" id="volume_perubahan" placeholder="Volume Perubahan" value="<?php echo $volume_perubahan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Satuan <?php echo form_error('satuan') ?></td>
									<td><?php echo select2_dinamis('satuan', 'm_satuan', 'satuan', 'kdsatuan')
										?></td>
								</tr>
								<tr>
									<td width='200'>Total <?php echo form_error('total') ?></td>
									<td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Sarana <?php echo form_error('sarana') ?></td>
									<td><input type="text" class="form-control" name="sarana" id="sarana" placeholder="Sarana" value="<?php echo $sarana; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Created By <?php echo form_error('created_by') ?></td>
									<td><input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $this->session->userdata('nama') ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Created Date <?php echo form_error('created_date') ?></td>
									<td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Updated By <?php echo form_error('updated_by') ?></td>
									<td><input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $this->session->userdata('nama') ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Updated Date <?php echo form_error('updated_date') ?></td>
									<td><input type="text" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Isdeleted <?php echo form_error('isdeleted') ?></td>
									<td><input type="text" class="form-control" name="isdeleted" id="isdeleted" placeholder="Isdeleted" value="<?php echo $isdeleted; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id_rincian" value="<?php echo $id_rincian; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_dak_rincian') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
								</tr>
							</table>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>