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
									<td width='200'>Satker </td>
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
									<td width='200'>Menu <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-menu" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
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
									<td width='200'>Rincian <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-rincian" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
										</div>
										<select name="id_dak_komponen_sub" class="select2 form-control w-100" id="subkomponen">
											<option value="">Select Rincian</option>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Kegiatan </td>
									<td><input type="text" class="form-control" name="menu_kegiatan" id="menu_kegiatan" placeholder="Menu Kegiatan" value="<?php echo $menu_kegiatan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Sub Kegiatan </td>
									<td><input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" value="<?php echo $kegiatan; ?>" require /></td>
								</tr>
								<tr>
									<td width='200'>Detail Rincian <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-detail" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
										</div>
										<select name="id_dak_rincian" class="select2 form-control w-100" id="rincian">
											<option value="">Select Detail Rincian</option>
										</select>
									</td>
								</tr>
								<?php if ($this->session->userdata('id_jenis_satker') == 3) { ?>
									<input type="hidden" name="kode_satker_lokasi" value="<?php echo $this->session->userdata('kode_satker'); ?>" />
									<input type="hidden" name="fasyankes" id="fasyankes" value="rs" />
								<?php } else { ?>
									<tr>
										<td width='200'>Jenis Fasyankes </td>
										<td>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="fasyankes" class="custom-control-input" id="defaultInline1Radio" value="puskesmas">
													<label class="custom-control-label" for="defaultInline1Radio">Puskesmas</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="fasyankes" class="custom-control-input" id="defaultInline2Radio" value="rs">
													<label class="custom-control-label" for="defaultInline2Radio">Rumah Sakit</label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width='200'>Lokasi <br><span class="help-block">*wajib diisi</span></td>
										<td>
											<div class="ajax-loader">
												<img id="loading-image" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
											</div>
											<select name="kode_nonsatker_lokasi" class="select2 form-control w-100" id="nonsatker">
												<option value="">Select Puskesmas/RS</option>
											</select>
										</td>
									</tr>

								<?php } ?>
								<tr>
									<td width='200'>Pelayanan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-installasi" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
										<select name="instalasi" class="select2 form-control w-100" id="instalasi">
											<option value="">Select Pelayanan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Sub Pelayanan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-ruangan" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
										<select name="ruangan" class="select2 form-control w-100" id="ruangan">
											<option value="">Select Sub Pelayanan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Ruangan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-sarana" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
										<select name="sarana" class="select2 form-control w-100" id="sarana">
											<option value="">Select Ruangan</option>
										</select>
									</td>
								</tr>
								<tr class="alkes">
									<td width='200'>Alkes <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-alkes" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
										</div>
										<select name="id_alkes" class="select2 form-control w-100" id="id_alkes">
											<option value="">Select Alat Kesehatan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td width='200'>Jenis Output <?php echo form_error('id_jenis_output') ?></td>
									<td>
										<input type="hidden" class="form-control" name="id_jenis_output" id="id_jenis_output" value="<?php echo $id_jenis_output; ?>" />
										<input type="text" class="form-control" name="nama_jenis_output" id="nama_jenis_output" placeholder="Id Jenis Output" value="" readonly />
									</td>
								</tr>
								<tr>
									<td width='200'>Harga Satuan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>">
											<!-- <span class="help-block">Rp. 000.0000.000</span> -->
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Volume <br><span class="help-block">*wajib diisi</span></td>
									<td><input type="number" class="form-control" min="1" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td>
								</tr>
								<!-- <tr>
									<td width='200'>Volume Perubahan <?php echo form_error('volume_perubahan') ?></td>
									<td><input type="number" class="form-control" name="volume_perubahan" id="volume_perubahan" placeholder="Volume Perubahan" value="<?php echo $volume_perubahan; ?>" /></td>
								</tr> -->
								<tr>
									<td width='200'>Satuan <?php echo form_error('satuan') ?></td>
									<td>
										<input type="hidden" class="form-control" name="id_satuan" id="id_satuan" value="" />
										<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Id satuan" value="" readonly />
									</td>
								</tr>
								<tr>
									<td width='200'>Total <?php echo form_error('total') ?></td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" readonly />
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>NIP <br><span class="help-block">*wajib diisi</span></td>
									<td><input type="text" class="form-control" name="nip_pengisi" id="nip_pengisi" placeholder="NIP" value="<?php echo $nip_pengisi; ?>" />
										<span class="help-block">*diisi dengan NIP Petugas Penginput</span>
									</td>
								</tr>
								<tr>
									<td width='200'>Nama Lengkap <br><span class="help-block">*wajib diisi</span></td>
									<td><input type="text" class="form-control" name="nama_pengisi" id="nama_pengisi" placeholder="Nama Lengkap" value="<?php echo $nama_pengisi; ?>" />
										<span class="help-block">*diisi dengan Nama Lengkap Petugas Penginput</span></td>
								</tr>
								<tr>
									<td width='200'>Jabatan <br><span class="help-block">*wajib diisi</span></td>
									<td><input type="text" class="form-control" name="jabatan_pengisi" id="jabatan_pengisi" placeholder="Jabatan" value="<?php echo $jabatan_pengisi; ?>" />
										<span class="help-block">*diisi dengan Jabatan Petugas Penginput</span></td>
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
										<a href="<?php echo site_url('t_dak_rincian/rincian/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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
	var rupiah = document.getElementById("harga_satuan");
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
	//////////////////////////////////
	$(document).ready(function() {
		$("#volume, #harga_satuan").keyup(function() {
			var harga_satuanx = $("#harga_satuan").val();
			var harga_satuan = parseInt(harga_satuanx.replace(/,.*|[^0-9]/g, ''), 10);
			var volume = $("#volume").val();
			//var nilai_alokasi = $("#total").val();

			var total = parseInt(harga_satuan) * parseInt(volume);
			//var persen = (total / alokasi_nilai) * 100;
			$("#total").val(total);
			//$("#realisasi_persen").val(persen);
		});
	});
	////////////////////////////////
	$(document).ready(function() {
		//$(".alkes").css("display", "none");
		$('#komponen').change(function() {
			var id_dak_komponen = $('#komponen').val();
			if (id_dak_komponen != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_subkomponen",
					method: "POST",
					data: {
						id_dak_komponen: id_dak_komponen
					},
					beforeSend: function() {
						$("#loading-rincian").show();
					},
					success: function(data) {
						$('#subkomponen').html(data);
						$('#rincian').html('<option value="">Select Detail Rincian</option>');
					},
					complete: function() {
						$('#loading-rincian').hide();
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
					beforeSend: function() {
						$("#loading-detail").show();
					},
					success: function(data) {
						$('#rincian').html(data);
					},
					complete: function() {
						$('#loading-detail').hide();
					}
				});
			} else {
				$('#rincian').html('<option value="">Select Rincian</option>');
			}
		});
		$('#rincian').change(function() {
			var id_dak_rincian = $('#rincian').val();
			if (id_dak_rincian != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_vrincian",
					method: "POST",
					data: {
						id_dak_rincian: id_dak_rincian
					},
					success: function(data) {
						var json = data,
							obj = JSON.parse(json);
						if (obj.id_jenis_output == 2) {
							$(".alkes").css("display", "");

						} else {
							$(".alkes").css("display", "none");
						}
						$('#id_jenis_output').val(obj.id_jenis_output);
						$('#nama_jenis_output').val(obj.nama_jenis_output);
						$('#id_satuan').val(obj.id_satuan);
						$('#satuan').val(obj.satuan);
					},
				});
			} else {
				$('#rincian').html('<option value="">Select Rincian</option>');
			}
			var jenis_satker = <?php echo $this->session->userdata('id_jenis_satker') ?>;
			if (jenis_satker == 3) {
				var fasyankes = document.getElementById('fasyankes').value; //$('#fasyankes').val();
				if (fasyankes != '') {
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_fasyankes",
						method: "POST",
						data: {
							fasyankes: fasyankes
						},
						beforeSend: function() {
							$("#loading-image").show();
						},
						success: function(data) {
							$('#nonsatker').html(data);
						},
						complete: function() {
							$('#loading-image').hide();
						}
					});
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_instalasi",
						method: "POST",
						data: {
							fasyankes: fasyankes
						},
						beforeSend: function() {
							$("#loading-instalasi").show();
						},
						success: function(data) {
							$('#instalasi').html(data);
						},
						complete: function() {
							$('#loading-instalasi').hide();
						}
					});
				} else {
					$('#instalasi').html('<option value="">Select Pelayanan</option>');
					$('#ruangan').html('<option value="">Select Sub Pelayanan</option>');
					$('#sarana').html('<option value="">Select Ruangan</option>');
				}
			}
		});
		$("input[name='fasyankes']").on('change', function() {
			//$('#loading-image').show();
			var fasyankes = document.querySelector('input[name="fasyankes"]:checked').value; //$('#fasyankes').val();
			if (fasyankes != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_fasyankes",
					method: "POST",
					data: {
						fasyankes: fasyankes
					},
					beforeSend: function() {
						$("#loading-image").show();
					},
					success: function(data) {
						$('#nonsatker').html(data);
					},
					complete: function() {
						$('#loading-image').hide();
					}
				});
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_instalasi",
					method: "POST",
					data: {
						fasyankes: fasyankes
					},
					beforeSend: function() {
						$("#loading-instalasi").show();
					},
					success: function(data) {
						$('#instalasi').html(data);
					},
					complete: function() {
						$('#loading-instalasi').hide();
					}
				});
			} else {
				$('#instalasi').html('<option value="">Select Pelayanan</option>');
				$('#ruangan').html('<option value="">Select Sub Pelayanan</option>');
				$('#sarana').html('<option value="">Select Ruangan</option>');
			}
		});
		$('#instalasi').change(function() {
			var instalasi = $('#instalasi').val();
			if (instalasi != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_ruangan",
					method: "POST",
					data: {
						instalasi: instalasi
					},
					beforeSend: function() {
						$("#loading-ruangan").show();
					},
					success: function(data) {
						$('#ruangan').html(data);
					},
					complete: function() {
						$('#loading-ruangan').hide();
					}
				});
			} else {
				$('#ruangan').html('<option value="">Select Sub Pelayanan</option>');
				$('#sarana').html('<option value="">Select Ruangan</option>');
			}
		});
		$('#ruangan').change(function() {
			var ruangan = $('#ruangan').val();
			if (ruangan != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_sarana",
					method: "POST",
					data: {
						ruangan: ruangan
					},
					beforeSend: function() {
						$("#loading-sarana").show();
					},
					success: function(data) {
						$('#sarana').html(data);
					},
					complete: function() {
						$('#loading-sarana').hide();
					}
				});
			} else {
				$('#sarana').html('<option value="">Select Ruangan</option>');
				$('#id_alkes').html('<option value="">Select Alat Kesehatan</option>');
			}
		});
		$('#sarana').change(function() {
			var sarana = $('#sarana').val();
			var id_jenis_output = document.getElementById('id_jenis_output').value;
			if (id_jenis_output == 2) {
				if (sarana != '') {
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_alkes",
						method: "POST",
						data: {
							sarana: sarana
						},
						beforeSend: function() {
							$("#loading-alkes").show();
						},
						success: function(data) {
							$('#id_alkes').html(data);
						},
						complete: function() {
							$('#loading-alkes').hide();
						}
					});
				} else {
					$('#id_alkes').html('<option value="">Select Alat Kesehatan</option>');
				}
			} else {
				$(".alkes").css("display", "none");
			}
		});
	});
</script>