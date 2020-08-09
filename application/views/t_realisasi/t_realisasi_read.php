<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>Laporan Triwulan Read</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<table class="table table-striped">
							<tr>
								<td>Id Rincian</td>
								<td><?php echo $id_rincian; ?></td>
							</tr>
							<tr>
								<td>Id User</td>
								<td><?php echo $id_user; ?></td>
							</tr>
							<tr>
								<td>Periode</td>
								<td><?php echo $periode; ?></td>
							</tr>
							<tr>
								<td>Realisasi Fisik</td>
								<td><?php echo $realisasi_fisik; ?></td>
							</tr>
							<tr>
								<td>Realisasi Harga Satuan</td>
								<td><?php echo $realisasi_harga_satuan; ?></td>
							</tr>
							<tr>
								<td>Realisasi Satuan</td>
								<td><?php echo $realisasi_satuan; ?></td>
							</tr>
							<tr>
								<td>Realisasi Persen</td>
								<td><?php echo $realisasi_persen; ?></td>
							</tr>
							<tr>
								<td>Realisasi Nilai</td>
								<td><?php echo $realisasi_nilai; ?></td>
							</tr>
							<tr>
								<td>Id Progress</td>
								<td><?php echo $id_progress; ?></td>
							</tr>
							<tr>
								<td>Id Rincian Hambatan</td>
								<td><?php echo $id_rincian_hambatan; ?></td>
							</tr>
							<tr>
								<td>Rencana Tindak Lanjut</td>
								<td><?php echo $rencana_tindak_lanjut; ?></td>
							</tr>
							<tr>
								<td>Pemanfaatan</td>
								<td><?php echo $pemanfaatan; ?></td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td><?php echo $keterangan; ?></td>
							</tr>
							<tr>
								<td>Created By</td>
								<td><?php echo $created_by; ?></td>
							</tr>
							<tr>
								<td>Created Date</td>
								<td><?php echo $created_date; ?></td>
							</tr>
							<tr>
								<td>Updated By</td>
								<td><?php echo $updated_by; ?></td>
							</tr>
							<tr>
								<td>Updated Date</td>
								<td><?php echo $updated_date; ?></td>
							</tr>
							<tr>
								<td>Isdeleted</td>
								<td><?php echo $isdeleted; ?></td>
							</tr>
							<tr>
								<td></td>
								<td><a href="<?php echo site_url('t_realisasi') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
							</tr>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>