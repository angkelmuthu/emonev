<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DAK REALISASI TRIWULAN</h2>
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
									<td width='200'>Periode <?php echo form_error('periode') ?></td>
									<td colspan="2">
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" name="periode" id="TriwulanI" class="custom-control-input" value="Triwulan I">
												<label class="custom-control-label" for="TriwulanI">Triwulan I</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" name="periode" id="TriwulanII" class="custom-control-input" value="Triwulan II">
												<label class="custom-control-label" for="TriwulanII">Triwulan II</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" name="periode" id="TriwulanIII" class="custom-control-input" value="Triwulan III">
												<label class="custom-control-label" for="TriwulanIII">Triwulan III</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" name="periode" id="TriwulanIV" class="custom-control-input" value="Triwulan IV">
												<label class="custom-control-label" for="TriwulanIV">Triwulan IV</label>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Satuan <?php echo form_error('realisasi_satuan') ?></td>
									<td>Alokasi : <input type="text" class="form-control" value="<?php echo $satuan; ?>" readonly /></td>
									<td>Realisasi : <input type="text" class="form-control" name="realisasi_satuan" id="realisasi_satuan" placeholder="Realisasi Satuan" value="<?php echo $realisasi_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Volume <?php echo form_error('realisasi_fisik') ?></td>
									<td>Alokasi : <input type="text" class="form-control" value="<?php echo $volume; ?>" readonly /></td>
									<td>Realisasi : <input type="text" class="form-control" name="realisasi_fisik" id="realisasi_fisik" placeholder="Realisasi Fisik" value="<?php echo $realisasi_fisik; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Harga Satuan <?php echo form_error('realisasi_harga_satuan') ?></td>
									<td>Alokasi : <input type="text" class="form-control" value="<?php echo $harga_satuan; ?>" readonly /></td>
									<td>Realisasi : <input type="text" class="form-control" name="realisasi_harga_satuan" id="realisasi_harga_satuan" placeholder="Realisasi Harga Satuan" value="<?php echo $realisasi_harga_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Dana <?php echo form_error('realisasi_nilai') ?></td>
									<td>Alokasi : <input type="text" class="form-control" name="alokasi_nilai" id="alokasi_nilai" value="<?php echo $total; ?>" readonly /></td>
									<td>Realisasi : <input type="text" class="form-control" name="realisasi_nilai" id="realisasi_nilai" placeholder="Realisasi Nilai" value="<?php echo $realisasi_nilai; ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Persentase Realisasi (%) <?php echo form_error('realisasi_persen') ?></td>
									<td colspan="2"><input type="text" class="form-control" name="realisasi_persen" id="realisasi_persen" placeholder="Realisasi Persen" value="" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Progress <?php echo form_error('id_progress') ?></td>
									<td colspan="2">
										<!-- <input type="text" class="form-control" name="id_progress" id="id_progress" placeholder="Id Progress" value="<?php echo $id_progress; ?>" /> -->
										<?php echo select2_dinamis('id_progress', 'm_progress_jenis', 'nama_progres', 'id_progres_jenis') ?>
									</td>
								</tr>
								<tr>
									<td width='200'>Hambatan <?php echo form_error('id_rincian_hambatan') ?></td>
									<td colspan="2"><?php echo select2_dinamis('id_rincian_hambatan', 'm_hambatan_rincian', 'nama_rincian_hambatan', 'id_rincian_hambatan') ?></td>
								</tr>
								<tr>
									<td width='200'>Rencana Tindak Lanjut <?php echo form_error('rencana_tindak_lanjut') ?></td>
									<td colspan="2"> <textarea class="form-control" non_pks="3" name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" placeholder="Rencana Tindak Lanjut"><?php echo $rencana_tindak_lanjut; ?></textarea></td>
								</tr>
								<tr>
									<td width='200'>Pemanfaatan <?php echo form_error('pemanfaatan') ?></td>
									<td colspan="2"> <textarea class="form-control" non_pks="3" name="pemanfaatan" id="pemanfaatan" placeholder="Pemanfaatan"><?php echo $pemanfaatan; ?></textarea></td>
								</tr>
								<tr>
									<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
									<td colspan="2"> <textarea class="form-control" non_pks="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
								</tr>
								<input type="hidden" name="id_rincian" value="<?php echo $this->uri->segment(3); ?>" />
								<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_users') ?>" />
								<input type="hidden" name="created_by" value="<?php echo $this->session->userdata('nama') ?>" />
								<input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
								<input type="hidden" name="updated_by" value="<?php echo $this->session->userdata('nama') ?>" />
								<input type="hidden" name="updated_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
								<input type="hidden" name="isdeleted" value="0" />
								<tr>
									<td></td>
									<td>
										<input type="hidden" name="id_realisasi" value="<?php echo $id_realisasi; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_realisasi/realisasi/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#realisasi_fisik, #realisasi_harga_satuan").keyup(function() {
			var harga = $("#realisasi_harga_satuan").val();
			var jumlah = $("#realisasi_fisik").val();
			var alokasi_nilai = $("#alokasi_nilai").val();

			var total = parseInt(harga) * parseInt(jumlah);
			var persen = (total / alokasi_nilai) * 100;
			$("#realisasi_nilai").val(total);
			$("#realisasi_persen").val(persen);
		});
	});
</script>