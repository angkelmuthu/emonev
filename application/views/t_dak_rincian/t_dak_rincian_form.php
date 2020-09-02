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
									<td width='200'>Satker <?php echo form_error('id_satker') ?></td>
									<td>
										<input type="text" class="form-control" name="satker" id="satker" placeholder="Id Satker" value="<?php echo $satker ?>" readonly />
										<input type="hidden" class="form-control" name="id_satker" id="id_satker" placeholder="Id Satker" value="<?php echo $id_satker ?>" readonly />
									</td>
								</tr>

								<tr>
									<td width='200'>Tahun Anggaran <?php echo form_error('tahun_anggaran') ?></td>
									<td><input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" placeholder="Tahun Anggaran" value="<?php echo $tahun; ?>" readonly /></td>
								</tr>
								<!-- <tr>
									<td width='200'>Id Dak Bidang <?php echo form_error('id_dak_bidang') ?></td>
									<td><input type="text" class="form-control" name="id_dak_bidang" id="id_dak_bidang" placeholder="Id Dak Bidang" value="<?php echo $id_dak_bidang; ?>" /></td>
								</tr> -->
								<tr>
									<td width='200'>Sub Bidang <?php echo form_error('id_dak_sub_bidang') ?></td>
									<td>
										<input type="text" class="form-control" name="nama_dak_sub_bidang" id="nama_dak_sub_bidang" placeholder="Id Dak Sub Bidang" value="<?php echo $nama_dak_sub_bidang; ?>" readonly />
										<input type="hidden" class="form-control" name="id_dak_sub_bidang" id="id_dak_sub_bidang" placeholder="Id Dak Sub Bidang" value="<?php echo $id_dak_sub_bidang; ?>" />
									</td>
								</tr>
								<tr>
									<td width='200'>Nilai Alokasi</td>
									<td><input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" placeholder="Tahun Anggaran" value="Rp. <?php echo angka($nilai_alokasi); ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Sisa Alokasi</td>
									<td><input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" placeholder="Tahun Anggaran" value="Rp. <?php echo angka($sisa_alokasi); ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Komponen <?php echo form_error('id_dak_komponen') ?></td>
									<td>
										<div class="form-group">
											<select name="id_dak_komponen" class="select2 form-control w-100" id="komponen">
												<?php
												foreach ($komponen as $row) {
													echo '<option value="' . $row->id_dak_komponen . '">' . $row->nama_dak_komponen . '</option>';
												}
												?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Sub Komponen <?php echo form_error('id_dak_komponen_sub') ?></td>
									<td>
										<select name="id_dak_komponen_sub" class="select2 form-control w-100" id="subkomponen">
											<option value="">Select Sub Komponen</option>
									</td>
								</tr>
								<tr>
									<td width='200'>Kegiatan <?php echo form_error('menu_kegiatan') ?></td>
									<td><input type="text" class="form-control" name="menu_kegiatan" id="menu_kegiatan" placeholder="Menu Kegiatan" value="<?php echo $menu_kegiatan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Sub Kegiatan <?php echo form_error('kegiatan') ?></td>
									<td><input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" value="<?php echo $kegiatan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Rincian Kegiatan<?php echo form_error('id_dak_rincian') ?></td>
									<td>
										<select name="id_dak_rincian" class="select2 form-control w-100" id="rincian">
											<option value="">Select Rincian Kegiatan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Alkes <?php echo form_error('id_alkes') ?></td>
									<td><input type="text" class="form-control" name="id_alkes" id="id_alkes" placeholder="Id Alkes" value="<?php echo $id_alkes; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Jenis Output <?php echo form_error('id_jenis_output') ?></td>
									<td><input type="text" class="form-control" name="id_jenis_output" id="id_jenis_output" placeholder="Id Jenis Output" value="<?php echo $id_jenis_output; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
									<td>
										<div class="form-group">
											<input type="text" data-inputmask="'alias': 'currency'" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>">
											<span class="help-block">Rp. 000.0000.000</span>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Volume <?php echo form_error('volume') ?></td>
									<td><input type="number" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td>
								</tr>
								<!-- <tr>
									<td width='200'>Volume Perubahan <?php echo form_error('volume_perubahan') ?></td>
									<td><input type="number" class="form-control" name="volume_perubahan" id="volume_perubahan" placeholder="Volume Perubahan" value="<?php echo $volume_perubahan; ?>" /></td>
								</tr> -->
								<tr>
									<td width='200'>Satuan <?php echo form_error('satuan') ?></td>
									<td><?php echo select2_dinamis('satuan', 'm_satuan', 'satuan', 'kdsatuan')
										?></td>
								</tr>
								<tr>
									<td width='200'>Total <?php echo form_error('total') ?></td>
									<td>
										<div class="form-group">
											<input type="text" data-inputmask="'alias': 'currency'" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>">
											<span class="help-block">Rp. 000.0000.000</span>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Sarana <?php echo form_error('sarana') ?></td>
									<td><input type="text" class="form-control" name="sarana" id="sarana" placeholder="Sarana" value="<?php echo $sarana; ?>" /></td>
								</tr>

								<tr>
									<td></td>
									<td>
										<input type="hidden" name="created_by" value="<?php echo $this->session->userdata('nama') ?>" readonly />
										<input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" readonly />
										<input type="hidden" name="updated_by" value="<?php echo $this->session->userdata('nama') ?>" readonly />
										<input type="hidden" name="updated_date" value="<?php echo date('Y-m-d H:s:i'); ?>" readonly />
										<input type="hidden" name="isdeleted" value="0" readonly />
										<input type="hidden" name="id_dak_alokasi" value="<?php echo $id_dak_alokasi; ?>" />
										<input type="hidden" name="id_rincian" value="<?php echo $id_rincian; ?>" />
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/inputmask/inputmask.bundle.js"></script>
<script>
	$(document).ready(function() {
		$(":input").inputmask();
	});
</script>
<script>
	$(document).ready(function() {
		$('#komponen').change(function() {
			var id_dak_komponen = $('#komponen').val();
			if (id_dak_komponen != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_subkomponen",
					method: "POST",
					data: {
						id_dak_komponen: id_dak_komponen
					},
					success: function(data) {
						$('#subkomponen').html(data);
						$('#rincian').html('<option value="">Select Rincian Kegiatan</option>');
					}
				});
			} else {
				$('#subkomponen').html('<option value="">Select Sub Komponen</option>');
				$('#rincian').html('<option value="">Select Rincian</option>');
			}
		});

		$('#subkomponen').change(function() {
			var id_dak_sub_komponen = $('#subkomponen').val();
			if (id_dak_sub_komponen != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_rincian",
					method: "POST",
					data: {
						id_dak_sub_komponen: id_dak_sub_komponen
					},
					success: function(data) {
						$('#rincian').html(data);
					}
				});
			} else {
				$('#rincian').html('<option value="">Select Rincian</option>');
			}
		});

	});
</script>