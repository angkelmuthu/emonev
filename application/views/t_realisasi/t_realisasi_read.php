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
						<table class="table table-bordered table-hover table-striped w-100" id="example">
							<?php foreach ($realisasi as $dt) { ?>
								<tr>
									<th>Periode</th>
									<td><?php echo $dt->periode ?></td>
								</tr>
								<tr>
									<th>Realisasi Satuan</th>
									<td><?php echo $dt->satuan ?></td>
								</tr>
								<tr>
									<th>Realisasi Volume</th>
									<td><?php echo $dt->realisasi_fisik ?></td>
								</tr>
								<tr>
									<th>Realisasi Harga Satuan</th>
									<td>Rp. <?php echo angka($dt->realisasi_harga_satuan) ?></td>
								</tr>
								<tr>
									<th>Realisasi Nilai</th>
									<td>Rp. <?php echo angka($dt->realisasi_nilai) ?></td>
								</tr>
								<tr>
									<th>Persentase</th>
									<td><?php echo $dt->realisasi_persen ?>%</td>
								</tr>
								<tr>
									<th>Progress</th>
									<td><?php echo $dt->nama_progres ?></td>
								</tr>
								<tr>
									<th>Hambatan</th>
									<td><?php echo $dt->nama_rincian_hambatan ?></td>
								</tr>
								<tr>
									<th>Rencana Tindak Lanjut</th>
									<td><?php echo $dt->rencana_tindak_lanjut ?></td>
								</tr>
								<tr>
									<th>Pemanfaatan</th>
									<td><?php echo $dt->pemanfaatan ?></td>
								</tr>
								<tr>
									<th>Keterangan</th>
									<td><?php echo $dt->keterangan ?></td>
								</tr>
								<tr>
									<th>Nama Penginput</th>
									<td><?php echo $dt->nama_pengisi ?></td>
								</tr>
								<tr>
									<th>Jabatan Penginput</th>
									<td><?php echo $dt->jabatan_pengisi ?></td>
								</tr>
								<tr>
									<th>Created By</th>
									<td><?php echo $dt->created_by ?></td>
								</tr>
								<tr>
									<th>Created Date</th>
									<td><?php echo $dt->created_date ?></td>
								</tr>
							<?php } ?>
						</table>
						<a href="<?php echo site_url('t_realisasi/realisasi/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>