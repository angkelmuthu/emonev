<main id="js-page-content" role="main" class="page-content">
	<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<?php foreach ($dt_rincian as $dt) { ?>
					<div class="accordion accordion-hover" id="js_demo_accordion-5">
						<div class="card">
							<div class="card-header">
								<a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-5a" aria-expanded="false">
									<i class="fal fa-cube width-2 fs-xl"></i>
									DAK ALOKASI
									<span class="ml-auto">
										<span class="collapsed-reveal">
											<i class="fal fa-chevron-up fs-xl"></i>
										</span>
										<span class="collapsed-hidden">
											<i class="fal fa-chevron-down fs-xl"></i>
										</span>
									</span>
								</a>
							</div>
							<div id="js_demo_accordion-5a" class="collapse" data-parent="#js_demo_accordion-5">
								<div class="card-body">
									<table class="table table-bordered table-striped">
										<tr>
											<td>Satker</td>
											<td><?php echo $dt->satker ?></td>
											<td>Tahun Anggaran</td>
											<td><?php echo $dt->tahun ?></td>

										</tr>
										<tr>
											<td>Jenis DAK</td>
											<td><?php echo $dt->nama_dak_sub_bidang ?></td>
											<td>Nilai Alokasi</td>
											<td>Rp. <?php echo angka($dt->nilai_alokasi) ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-5b" aria-expanded="false">
									<i class="fal fa-cubes width-2 fs-xl"></i>
									RINCIAN KEGIATAN
									<span class="ml-auto">
										<span class="collapsed-reveal">
											<i class="fal fa-chevron-up fs-xl"></i>
										</span>
										<span class="collapsed-hidden">
											<i class="fal fa-chevron-down fs-xl"></i>
										</span>
									</span>
								</a>
							</div>
							<div id="js_demo_accordion-5b" class="collapse" data-parent="#js_demo_accordion-5">
								<div class="card-body">
									<table class="table table-bordered table-striped">
										<tr>
											<th>Kegiatan</th>
											<td><?php echo $dt->nama_menu_kegiatan; ?></td>
											<th>Sub Kegiatan</th>
											<td><?php echo $dt->nama_menu_kegiatan; ?></td>
										</tr>
										<tr>
											<th>Rincian</th>
											<td><?php echo $dt->nama_dak_rincian; ?></td>
											<th>Jenis Output</th>
											<td><?php echo $dt->nama_jenis_output; ?></td>
										</tr>

										<?php if ($dt->id_jenis_output == 2) {
											echo '<tr><td>Alat Kesehatan</td><td colspan=3>' . $dt->nama_alkes . '</td></tr>';
										} ?>
										<tr>
											<th>Volume</th>
											<td><?php echo $dt->volume; ?></td>
											<th>Satuan</th>
											<td><?php echo $dt->satuan; ?></td>
										</tr>
										<tr>
											<th>Harga Satuan</th>
											<td>Rp. <?php echo angka($dt->harga_satuan); ?></td>
											<th>Total Alokasi</th>
											<td>Rp. <?php echo angka($dt->total); ?></td>
										</tr>
										<tr>
											<th>Lokasi</th>
											<td colspan="3">
												<?php if (!empty($dt->nama_instalasi)) { ?>
													<span class="badge border border-primary text-primary">Pelayanan : <?php echo $dt->nama_instalasi; ?></span>
												<?php }
												if (!empty($dt->nama_ruangan)) { ?>
													<span class="badge border border-secondary text-secondary">Sub Pelayanan : <?php echo $dt->nama_ruangan; ?></span>
												<?php }
												if (!empty($dt->nama_sarana)) { ?>
													<span class="badge border border-success text-success">Ruangan : <?php echo $dt->nama_sarana; ?></span>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<th>Petugas Penginput</th>
											<td colspan="3">
												<span class="badge border border-success text-success">NIP : <?php echo $dt->nip_pengisi ?></span>
												<span class="badge border border-success text-success">Nama : <?php echo $dt->nama_pengisi ?></span>
												<span class="badge border border-success text-success">Jabatan : <?php echo $dt->jabatan_pengisi ?></span>
											</td>
										</tr>
										<tr>
											<th>Created Date</th>
											<td colspan="3"><?php echo $dt->created_date; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
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
						<?php
						$this->db->where('id_rincian', $this->uri->segment(3));
						$result = $this->db->get('v_rincian')->result();
						foreach ($result as $dt) {
							$id_rincian = $dt->id_rincian;
							$tahun = $dt->tahun;
							$nama_menu_kegiatan = $dt->nama_menu_kegiatan;
							$id_dak_alokasi = $dt->id_dak_alokasi;
							$nama_dak_rincian = $dt->nama_dak_rincian;
							$id_dak_rincian = $dt->id_dak_rincian;
							$volume = $dt->volume;
							$harga_satuan = $dt->harga_satuan;
							$satuan = $dt->satuan;
							$total = $dt->total;
							$sarana = $dt->nama_sarana;
							$ruangan = $dt->nama_ruangan;
							$instalasi = $dt->nama_instalasi;
						}
						?>
						<form action="<?php echo $action; ?>" method="post">

							<table class='table m-0'>
								<tr class="bg-info-500">
									<td colspan="3">Laporan Nilai Realiasi</td>
								</tr>
								<tr>
									<td width='200'>Periode <?php echo form_error('periode') ?></td>
									<td colspan="2">
										<div class="frame-wrap">
											<?php if ($tahun == 2019) { ?>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="periode" id="TriwulanIV" class="custom-control-input" value="Triwulan IV" checked>
													<label class="custom-control-label" for="TriwulanIV">Triwulan IV</label>
												</div>
											<?php } elseif ($tahun == 2020) { ?>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="periode" id="TriwulanIII" class="custom-control-input" value="Triwulan III">
													<label class="custom-control-label" for="TriwulanIII">Triwulan III</label>
												</div>
											<?php } else { ?>
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
											<?php } ?>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Satuan <br><span class="help-block">*wajib diisi</span></td>
									<!-- <td>Alokasi : <input type="text" class="form-control" value="<?php echo $satuan; ?>" readonly /></td> -->
									<td>Realisasi : <?php echo select2_dinamis('realisasi_satuan', 'm_satuan', 'satuan', 'id_satuan') ?></td>
								</tr>
								<tr>
									<td width='200'>Volume <br><span class="help-block">*wajib diisi</span></td>
									<!-- <td>Alokasi : <input type="text" class="form-control" value="<?php echo $volume; ?>" readonly /></td> -->
									<td>Realisasi : <input type="number" min="0" class="form-control" name="realisasi_fisik" id="realisasi_fisik" placeholder="Realisasi Fisik" value="<?php echo $realisasi_fisik; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Harga Satuan <br><span class="help-block">*wajib diisi</span></td>
									<!-- <td>Alokasi : <input type="text" class="form-control" value="<?php echo $harga_satuan; ?>" readonly /></td> -->
									<td>Realisasi : <input type="text" class="form-control" name="realisasi_harga_satuan" id="realisasi_harga_satuan" placeholder="Realisasi Harga Satuan" value="<?php echo $realisasi_harga_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Dana <?php echo form_error('realisasi_nilai') ?></td>
									<!-- <td>Alokasi : <input type="text" class="form-control" name="alokasi_nilai" id="alokasi_nilai" value="<?php echo $total; ?>" readonly /></td> -->
									<td>Realisasi : <input type="text" class="form-control" name="realisasi_nilai" id="realisasi_nilai" placeholder="Realisasi Nilai" value="<?php echo $realisasi_nilai; ?>" readonly /></td>
								</tr>
								<tr>
									<td width='200'>Persentase Realisasi (%) <?php echo form_error('realisasi_persen') ?></td>
									<td colspan="2"><input type="text" class="form-control" name="realisasi_persen" id="realisasi_persen" placeholder="Realisasi Persen" value="" readonly /></td>
								</tr>
								<tr class="bg-info-500">
									<td colspan="3">Progress/Hambatan & Keterangan Kegiatan </td>
								</tr>
								<tr>
									<td width='200'>Progress <br><span class="help-block">*wajib diisi</span></td>
									<td colspan="2">
										<!-- <input type="text" class="form-control" name="id_progress" id="id_progress" placeholder="Id Progress" value="<?php echo $id_progress; ?>" /> -->
										<?php echo select2_dinamis('id_progress', 'm_progress_jenis', 'nama_progres', 'id_progres_jenis') ?>
									</td>
								</tr>
								<tr>
									<td width='200'>Hambatan</td>
									<td colspan="2"><?php echo select2_hambatan('id_rincian_hambatan', 'm_hambatan_rincian', 'nama_rincian_hambatan', 'id_rincian_hambatan') ?></td>
								</tr>
								<tr>
									<td width='200'>Rencana Tindak Lanjut </td>
									<td colspan="2"> <textarea class="form-control" non_pks="3" name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" placeholder="Rencana Tindak Lanjut"><?php echo $rencana_tindak_lanjut; ?></textarea></td>
								</tr>
								<tr>
									<td width='200'>Pemanfaatan</td>
									<td colspan="2"> <textarea class="form-control" non_pks="3" name="pemanfaatan" id="pemanfaatan" placeholder="Pemanfaatan" readonly><?php echo $instalasi . ', ' . $ruangan . ', ' . $sarana ?></textarea></td>
								</tr>
								<tr>
									<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
									<td colspan="2"> <textarea class="form-control" non_pks="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
								</tr>
								<tr class="bg-info-500">
									<td colspan="3">Data Petugas Penanggung Jawab</td>
								</tr>
								<?php
								// /$this->db->from();
								$this->db->where('id_satker', $this->session->userdata('id_satker'));
								$query = $this->db->get('m_petugas')->result();
								// /$num = $query->num_rows();
								foreach ($query as $dtpetugas) { ?>
									<tr>
										<td width='200'>NIP </td>
										<td colspan="2"><input type="text" class="form-control" name="nip_pengisi" id="nip_pengisi" placeholder="NIP" value="<?php echo $dtpetugas->nip ?>" readonly />
										</td>
									</tr>
									<tr>
										<td width='200'>Nama Lengkap </td>
										<td colspan="2"><input type="text" class="form-control" name="nama_pengisi" id="nama_pengisi" placeholder="Nama Lengkap" value="<?php echo $dtpetugas->nama ?>" readonly />
									</tr>
									<tr>
										<td width='200'>Jabatan </td>
										<td colspan="2"><input type="text" class="form-control" name="jabatan_pengisi" id="jabatan_pengisi" placeholder="Jabatan" value="<?php echo $dtpetugas->jabatan ?>" readonly />
									</tr>
								<?php } ?>
								<input type="hidden" name="alokasi" value="<?php echo $this->uri->segment(4); ?>" />
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
										<a href="<?php echo site_url('t_realisasi/realisasi/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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
	var rupiah = document.getElementById("realisasi_harga_satuan");
	rupiah.addEventListener("keyup", function(e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value);
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}
	$(document).ready(function() {
		$("#realisasi_fisik, #realisasi_harga_satuan").keyup(function() {
			var hargax = $("#realisasi_harga_satuan").val();
			var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
			var jumlah = $("#realisasi_fisik").val();
			//var alokasi_nilai = $("#alokasi_nilai").val();
			var alokasi_nilai = <?php echo $total; ?>;
			var total = harga * parseInt(jumlah);
			fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
			var persenx = (total / alokasi_nilai) * 100;
			persen = persenx.toFixed(2) + '%';
			$("#realisasi_nilai").val(fixed);
			$("#realisasi_persen").val(persen);
		});
	});
</script>