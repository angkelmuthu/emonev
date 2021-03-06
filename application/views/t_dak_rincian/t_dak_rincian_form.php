<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>FORM INPUT RINCIAN KEGIATAN</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<form action="<?php echo $action; ?>" method="post">

							<table class="table m-0">
								<tr class="bg-info-500">
									<td colspan="3">Informasi DAK Alokasi</td>
								</tr>
								<tr>
									<td width="200">Satker </td>
									<td>
										<input type="text" class="form-control" name="satker" id="satker" placeholder="Id Satker" value="<?php echo $satker ?>" readonly />
										<input type="hidden" class="form-control" name="id_satker" id="id_satker" placeholder="Id Satker" value="<?php echo $id_satker ?>" readonly />
									</td>
								</tr>

								<tr>
									<td width="200">Tahun Anggaran <?php echo form_error('tahun_anggaran') ?></td>
									<td><input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" placeholder="Tahun Anggaran" value="<?php echo $tahun; ?>" readonly /></td>
								</tr>
								<!-- <tr>
									<td width="200">Id Dak Bidang <?php echo form_error('id_dak_bidang') ?></td>
									<td><input type="text" class="form-control" name="id_dak_bidang" id="id_dak_bidang" placeholder="Id Dak Bidang" value="<?php echo $id_dak_bidang; ?>" /></td>
								</tr> -->
								<tr>
									<td width="200">Sub Bidang <?php echo form_error('id_dak_sub_bidang') ?></td>
									<td>
										<input type="text" class="form-control" name="nama_dak_sub_bidang" id="nama_dak_sub_bidang" placeholder="Id Dak Sub Bidang" value="<?php echo $nama_dak_sub_bidang; ?>" readonly />
										<input type="hidden" class="form-control" name="id_dak_sub_bidang" id="id_dak_sub_bidang" placeholder="Id Dak Sub Bidang" value="<?php echo $id_dak_sub_bidang; ?>" />
									</td>
								</tr>
								<tr>
									<td width="200">Nilai Alokasi</td>
									<td><input type="text" class="form-control" name="nilai_alokasi" id="nilai_alokasi" placeholder="Nilai Alokasi" value="Rp. <?php echo angka($nilai_alokasi); ?>" readonly /></td>
								</tr>
								<tr>
									<td width="200">Sisa Alokasi</td>
									<td><input type="text" class="form-control" name="sisa_alokasi" id="sisa_alokasi" placeholder="Sisa Alokasi" value="Rp. <?php echo angka($sisa_alokasi); ?>" readonly /></td>
								</tr>
								<tr class="bg-info-500">
									<td colspan="3">Rincian Kegiatan</td>
								</tr>
								<tr>
									<td width="200">Menu <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-menu" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
										<div class="form-group">
											<!-- <select name="id_dak_komponen" class="select2 form-control w-100" id="komponen" required>
												<?php
												// foreach ($komponen as $row) {
												// 	if ($id_dak_komponen == $row->id_dak_komponen) {
												// 		echo '<option value="' . $row->id_dak_komponen . '" selected>' . $row->nama_dak_komponen . '</option>';
												// 	} else {
												// 		echo '<option value="' . $row->id_dak_komponen . '">' . $row->nama_dak_komponen . '</option>';
												// 	}
												// }
												?>
											</select> -->
											<div class="form-group">
												<select name="id_dak_komponen" class="select2 form-control w-100" id="komponen" required>
													<option value="">Select komponen</option>
												</select>
											</div>
										</div>
									</td>
								</tr>
								<?php if ($tahun == '2019') { ?>
									<tr>
										<td width="200">Rincian <br><span class="help-block">*wajib diisi</span></td>
										<td>
											<div class="ajax-loader">
												<img id="loading-rincian" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
											</div>
											<div class="form-group">
												<select name="id_dak_komponen_sub" class="select2 form-control w-100" id="subkomponen" required>
													<option value="">Select Rincian</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<td width="200">Kegiatan </td>
										<td><input type="text" class="form-control" name="menu_kegiatan" id="menu_kegiatan" placeholder="Menu Kegiatan" value="<?php echo $menu_kegiatan; ?>" /></td>
									</tr>
									<tr>
										<td width="200">Sub Kegiatan </td>
										<td><input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" value="<?php echo $kegiatan; ?>" require /></td>
									</tr>
								<?php } ?>
								<tr>
									<td width="200">Detail Rincian <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-detail" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
										</div>
										<select name="id_dak_rincian" class="select2 form-control w-100" id="rincian" required>
											<option value="">Select Detail Rincian</option>
										</select>
									</td>
								</tr>

								<?php if ($this->session->userdata('id_jenis_satker') == 3) { ?>
									<input type="hidden" name="kode_satker_lokasi" value="<?php echo $this->session->userdata('kode_satker'); ?>" />
									<input type="hidden" name="fasyankes" id="fasyankes" value="1" />
								<?php } elseif ($this->session->userdata('id_jenis_satker') == 5) { ?>
									<input type="hidden" name="kode_satker_lokasi" value="<?php echo $this->session->userdata('kode_satker'); ?>" />
									<input type="hidden" name="fasyankes" id="fasyankes" value="3" />
								<?php } else { ?>
									<tr class="bg-info-500">
										<td colspan="3">Lokasi Kegiatan</td>
									</tr>
									<tr>
										<td width="200">Jenis Fasyankes </td>
										<td>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="fasyankes" class="custom-control-input" id="defaultInline1Radio" value="2">
													<label class="custom-control-label" for="defaultInline1Radio">Puskesmas</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="fasyankes" class="custom-control-input" id="defaultInline2Radio" value="1">
													<label class="custom-control-label" for="defaultInline2Radio">Rumah Sakit</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" name="fasyankes" class="custom-control-input" id="defaultInline3Radio" value="3">
													<label class="custom-control-label" for="defaultInline3Radio">Lab Kes</label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="200">LokUs <br><span class="help-block">*wajib diisi</span></td>
										<td>
											<div class="ajax-loader">
												<img id="loading-image" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
											</div>
											<select name="kode_nonsatker_lokasi" class="select2 form-control w-100" id="nonsatker" required>
												<option value="">Select Puskesmas/RS/Labkes</option>
											</select>
										</td>
									</tr>

								<?php } ?>
								<tr class="instalasi">
									<td width="200">Pelayanan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-installasi" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
										<select name="instalasi" class="select2 form-control w-100" id="instalasi">
											<option value="">Select Pelayanan</option>
										</select>
									</td>
								</tr>
								<tr class="ruangan">
									<td width="200">Sub Pelayanan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-ruangan" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="50px" class="img-responsive" />
										</div>
										<select name="ruangan" class="select2 form-control w-100" id="ruangan">
											<option value="">Select Sub Pelayanan</option>
										</select>
									</td>
								</tr>
								<tr class="sarana">
									<td width="200">Ruangan <br><span class="help-block">*wajib diisi</span></td>
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
									<td width="200">Alkes <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="ajax-loader">
											<img id="loading-alkes" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
										</div>
										<select name="id_alkes" class="select2 form-control w-100" id="id_alkes">
											<option value="">Select Alat Kesehatan</option>
										</select>
									</td>
								</tr>
								<tr class="bg-info-500">
									<td colspan="3">Nilai Alokasi</td>
								</tr>
								<tr>
									<td width="200">Jenis Output <?php echo form_error('id_jenis_output') ?></td>
									<td>
										<input type="hidden" class="form-control" name="id_jenis_output" id="id_jenis_output" value="<?php echo $id_jenis_output; ?>" />
										<input type="text" class="form-control" name="nama_jenis_output" id="nama_jenis_output" placeholder="Jenis Output" value="" readonly />
									</td>
								</tr>
								<tr>
									<td width="200">Harga Satuan <br><span class="help-block">*wajib diisi</span></td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" required>
											<!-- <span class="help-block">Rp. 000.0000.000</span> -->
										</div>
									</td>
								</tr>
								<tr>
									<td width="200">Volume <br><span class="help-block">*wajib diisi</span></td>
									<td><input type="number" class="form-control" min="1" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" required /></td>
								</tr>
								<!-- <tr>
									<td width="200">Volume Perubahan <?php echo form_error('volume_perubahan') ?></td>
									<td><input type="number" class="form-control" name="volume_perubahan" id="volume_perubahan" placeholder="Volume Perubahan" value="<?php echo $volume_perubahan; ?>" /></td>
								</tr> -->
								<tr>
									<td width="200">Satuan <?php echo form_error('satuan') ?></td>
									<td>
										<!-- <input type="hidden" class="form-control" name="id_satuan" id="id_satuan" value="" />
										<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Id satuan" value="" readonly /> -->
										<?php
										echo select2_dinamis_satuan('id_satuan', 'm_satuan', 'satuan', 'id_satuan', $id_satuan);
										?>
									</td>
								</tr>
								<tr>
									<td width="200">Total <?php echo form_error('total') ?></td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" readonly />
										</div>
									</td>
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
										<td width="200">NIP </td>
										<td><input type="text" class="form-control" name="nip_pengisi" id="nip_pengisi" placeholder="NIP" value="<?php echo $dtpetugas->nip ?>" readonly />
										</td>
									</tr>
									<tr>
										<td width="200">Nama Lengkap </td>
										<td><input type="text" class="form-control" name="nama_pengisi" id="nama_pengisi" placeholder="Nama Lengkap" value="<?php echo $dtpetugas->nama ?>" readonly />
									</tr>
									<tr>
										<td width="200">Jabatan </td>
										<td><input type="text" class="form-control" name="jabatan_pengisi" id="jabatan_pengisi" placeholder="Jabatan" value="<?php echo $dtpetugas->jabatan ?>" readonly />
									</tr>
								<?php } ?>
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
			var sisa = <?php echo $sisa_alokasi; ?>;
			if (total > sisa) {
				//window.confirm("Nilai alokasi yang anda masukkan melebihi sisa anggaran.");
				if (confirm("Nilai alokasi yang anda masukkan melebihi sisa anggaran.!")) {
					$('#volume').val('');
				} else {
					txt = "You pressed Cancel!";
				}
			} else {
				fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
				//var persen = (total / alokasi_nilai) * 100;
				$("#total").val(fixed);
				//$("#realisasi_persen").val(persen);
			}
		});
	});
	////////////////////////////////
	$(document).ready(function() {
		var tahun = '<?php echo $tahun ?>';
		var id_dak_sub_bidang = $('#id_dak_sub_bidang').val();
		//var action = '<?php echo $this->uri->segment(2); ?>';
		var dak_komponen = '<?php echo $id_dak_komponen ?>';
		var dak_komponen_sub = '<?php echo $id_dak_komponen_sub ?>';
		var dak_rincian = '<?php echo $id_dak_rincian ?>';

		//if (action == 'update') {
		if (dak_komponen != '') {
			//var id_dak_komponen = '<?php echo $id_dak_komponen ?>';
			if (tahun == '2019') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_komponenx",
					method: "POST",
					data: {
						id_dak_sub_bidang: id_dak_sub_bidang,
						id_dak_komponen: dak_komponen
					},
					beforeSend: function() {
						$("#loading-rincian").show();
					},
					success: function(data) {
						$('#komponen').html(data);
						load_sub_komponen();
						//$('#subkomponen').html('<option value="">Select Sub Komponen</option>');
					},
					// complete: function() {
					// 	$('#loading-rincian').hide();
					// }
				});
			} else {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_komponenx",
					method: "POST",
					data: {
						id_dak_sub_bidang: id_dak_sub_bidang,
						id_dak_komponen: dak_komponen
					},
					beforeSend: function() {
						$("#loading-rincian").show();
					},
					success: function(data) {
						$('#komponen').html(data);
						load_rincianx();
						//$('#subkomponen').html('<option value="">Select Sub Komponen</option>');
					},
					// complete: function() {
					// 	$('#loading-rincian').hide();
					// }
				});
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			function load_sub_komponen() {
				///load data sub komponen
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_subkomponen",
					method: "POST",
					data: {
						id_dak_komponen: dak_komponen,
						id_dak_sub_komponen: dak_komponen_sub
					},
					beforeSend: function() {
						$("#loading-rincian").show();
					},
					success: function(data) {
						$('#subkomponen').html(data);
						load_rincian();
						//$('#rincian').html('<option value="">Select Detail Rincian</option>');
					},
					complete: function() {
						$('#loading-rincian').hide();
					}
				});
			}
			//load data rincian
			function load_rincian() {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_rincian",
					method: "POST",
					data: {
						id_dak_sub_komponen: dak_komponen_sub,
						id_dak_rincian: dak_rincian
					},
					beforeSend: function() {
						$("#loading-detail").show();
					},
					success: function(data) {
						$('#rincian').html(data);
						load_detail_rincian();
					},
					complete: function() {
						$('#loading-detail').hide();
					}
				});
			}

			function load_rincianx() {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_rincianx",
					method: "POST",
					data: {
						id_dak_komponen: dak_komponen,
						id_dak_rincian: dak_rincian
					},
					beforeSend: function() {
						$("#loading-detail").show();
					},
					success: function(data) {
						$('#rincian').html(data);
						load_detail_rincian();
					},
					complete: function() {
						$('#loading-detail').hide();
					}
				});
			}
			/////////////////////////////////////////////
			function load_detail_rincian() {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_vrincian",
					method: "POST",
					data: {
						id_dak_rincian: dak_rincian
					},
					success: function(data) {
						var json = data,
							obj = JSON.parse(json);
						if (obj.id_jenis_output == 2) {
							$(".alkes").css("display", "");
							$(".instalasi").css("display", "");
							$(".ruangan").css("display", "");
							$(".sarana").css("display", "");
							$("#id_alkes").prop("required", true);
							$("#instalasi").prop("required", true);
							$("#ruangan").prop("required", true);
							$("#sarana").prop("required", true);

						} else if (obj.id_jenis_output == 10) {
							$(".alkes").css("display", "none");
							$(".instalasi").css("display", "");
							$(".ruangan").css("display", "");
							$(".sarana").css("display", "none");
							$("#instalasi").prop("required", true);
							$("#ruangan").prop("required", true);

						} else {
							$(".alkes").css("display", "none");
							$(".instalasi").css("display", "none");
							$(".ruangan").css("display", "none");
							$(".sarana").css("display", "none");
						}
						load_fasyankes();
						$('#id_jenis_output').val(obj.id_jenis_output);
						$('#nama_jenis_output').val(obj.nama_jenis_output);
						//$('#id_satuan').val(obj.id_satuan);
						//$('#satuan').val(obj.satuan);
					},
				});
			}

			var jenis_satker = <?php echo $this->session->userdata('id_jenis_satker') ?>;
			var jenis_fasyankes = '<?php echo $jenis_fasyankes ?>';
			if (jenis_satker == 3 || jenis_satker == 5) {
				var fasyankes = document.getElementById('fasyankes').value; //$('#fasyankes').val();
				function load_fasyankes() {

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
							load_instalasi();
						},
						complete: function() {
							$('#loading-image').hide();
						}
					});
				}

				function load_instalasi() {
					var kode_instalasi = jenis_fasyankes + '||<?php echo $instalasi ?>';
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_instalasi",
						method: "POST",
						data: {
							fasyankes: fasyankes,
							instalasi: kode_instalasi
						},
						beforeSend: function() {
							$("#loading-instalasi").show();
						},
						success: function(data) {
							$('#instalasi').html(data);
							load_ruangan();
						},
						complete: function() {
							$('#loading-instalasi').hide();
						}
					});
				}

				function load_ruangan() {
					var kode_instalasi = jenis_fasyankes + '||<?php echo $instalasi ?>';
					var kode_ruangan = jenis_fasyankes + '||<?php echo $ruangan ?>';
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_ruangan",
						method: "POST",
						data: {
							instalasi: kode_instalasi,
							ruangan: kode_ruangan
						},
						beforeSend: function() {
							$("#loading-ruangan").show();
						},
						success: function(data) {
							$('#ruangan').html(data);
							load_sarana();
						},
						complete: function() {
							$('#loading-ruangan').hide();
						}
					});
				}

				function load_sarana() {
					var kode_ruangan = jenis_fasyankes + '||<?php echo $ruangan ?>';
					var kode_sarana = '<?php echo $sarana ?>';
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_sarana",
						method: "POST",
						data: {
							ruangan: kode_ruangan,
							sarana: kode_sarana
						},
						beforeSend: function() {
							$("#loading-sarana").show();
						},
						success: function(data) {
							$('#sarana').html(data);
							load_dll();
						},
						complete: function() {
							$('#loading-sarana').hide();
						}
					});
				}

				function load_dll() {
					var sarana = '<?php echo $sarana ?>';
					var alkes = '<?php echo $id_alkes ?>';
					// var jenis_satker = <?php echo $this->session->userdata('id_jenis_satker') ?>;
					// if (jenis_satker == 3 || jenis_satker == 5) {
					// 	var fasyankes = document.getElementById('fasyankes').value;
					// } else {
					// 	var fasyankes = document.querySelector('input[name="fasyankes"]:checked').value;
					// }
					var id_jenis_output = document.getElementById('id_jenis_output').value;
					if (id_jenis_output == 2) {
						if (sarana != '') {
							$.ajax({
								url: "<?php echo base_url(); ?>t_dak_rincian/fetch_alkes",
								method: "POST",
								data: {
									sarana: sarana,
									//fasyankes: fasyankes,
									id_alkes: alkes
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

				}
			} else {
				var jenis_fasyankes = '<?php echo $jenis_fasyankes ?>';
				var kode_lokasi = '<?php echo $kode_nonsatker_lokasi ?>';
				if (jenis_fasyankes == 'LAB') {
					$('#defaultInline3Radio').prop('checked', true);
				} else if (jenis_fasyankes == 'PKM') {
					$('#defaultInline1Radio').prop('checked', true);
				} else {
					$('#defaultInline2Radio').prop('checked', true);
				}


				var fasyankes = document.querySelector('input[name="fasyankes"]:checked').value; //$('#fasyankes').val();
				function load_fasyankes() {
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_fasyankes",
						method: "POST",
						data: {
							fasyankes: fasyankes,
							kode_lokasi: kode_lokasi
						},
						beforeSend: function() {
							$("#loading-image").show();
						},
						success: function(data) {
							$('#nonsatker').html(data);
							load_instalasi();
						},
						complete: function() {
							$('#loading-image').hide();
						}
					});
				}

				function load_instalasi() {
					var kode_instalasi = jenis_fasyankes + '||<?php echo $instalasi ?>';
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_instalasi",
						method: "POST",
						data: {
							fasyankes: fasyankes,
							instalasi: kode_instalasi
						},
						beforeSend: function() {
							$("#loading-instalasi").show();
						},
						success: function(data) {
							$('#instalasi').html(data);
							load_ruangan();
						},
						complete: function() {
							$('#loading-instalasi').hide();
						}
					});
				}

				function load_ruangan() {
					var kode_instalasi = jenis_fasyankes + '||<?php echo $instalasi ?>';
					var kode_ruangan = jenis_fasyankes + '||<?php echo $ruangan ?>';
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_ruangan",
						method: "POST",
						data: {
							instalasi: kode_instalasi,
							ruangan: kode_ruangan
						},
						beforeSend: function() {
							$("#loading-ruangan").show();
						},
						success: function(data) {
							$('#ruangan').html(data);
							load_sarana();
						},
						complete: function() {
							$('#loading-ruangan').hide();
						}
					});
				}

				function load_sarana() {
					var kode_ruangan = jenis_fasyankes + '||<?php echo $ruangan ?>';
					var kode_sarana = '<?php echo $sarana ?>';
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_sarana",
						method: "POST",
						data: {
							ruangan: kode_ruangan,
							sarana: kode_sarana
						},
						beforeSend: function() {
							$("#loading-sarana").show();
						},
						success: function(data) {
							$('#sarana').html(data);
							load_dll();
						},
						complete: function() {
							$('#loading-sarana').hide();
						}
					});
				}

				function load_dll() {
					var sarana = '<?php echo $sarana ?>';
					var alkes = '<?php echo $id_alkes ?>';
					// var jenis_satker = <?php echo $this->session->userdata('id_jenis_satker') ?>;
					// if (jenis_satker == 3 || jenis_satker == 5) {
					// 	var fasyankes = document.getElementById('fasyankes').value;
					// } else {
					// 	var fasyankes = document.querySelector('input[name="fasyankes"]:checked').value;
					// }
					var id_jenis_output = document.getElementById('id_jenis_output').value;
					if (id_jenis_output == 2) {
						if (sarana != '') {
							$.ajax({
								url: "<?php echo base_url(); ?>t_dak_rincian/fetch_alkes",
								method: "POST",
								data: {
									sarana: sarana,
									//fasyankes: fasyankes,
									id_alkes: alkes
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

				}

			}

		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>t_dak_rincian/fetch_komponenx",
				method: "POST",
				data: {
					id_dak_sub_bidang: id_dak_sub_bidang
				},
				beforeSend: function() {
					$("#loading-rincian").show();
				},
				success: function(data) {
					$('#komponen').html(data);

					//$('#subkomponen').html('<option value="">Select Sub Komponen</option>');
				},
				complete: function() {
					$('#loading-rincian').hide();
				}
			});


		}
		if (tahun == '2019') {
			$('#komponen').change(function() {
				var id_dak_komponen = $(this).val();
				// if (id_dak_komponen != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_subkomponen",
					method: "POST",
					data: {
						id_dak_komponen: id_dak_komponen,
						id_dak_sub_komponen: "<?php echo $id_dak_komponen_sub ?>"
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
				// } else {
				// 	$('#subkomponen').html('<option value="">Select Sub Komponen</option>');
				// 	$('#rincian').html('<option value="">Select Rincian</option>');
				// }
			});
		} else {
			$('#komponen').change(function() {
				var id_dak_komponen = $(this).val();
				$.ajax({
					url: "<?php echo base_url(); ?>t_dak_rincian/fetch_rincianx",
					method: "POST",
					data: {
						id_dak_komponen: id_dak_komponen,
						id_dak_rincian: "<?php echo $id_dak_rincian ?>"
					},
					beforeSend: function() {
						$("#loading-detail").show();
					},
					success: function(data) {
						$('#rincian').html(data);
						//$('#rincian').html('<option value="">Select Detail Rincian</option>');
					},
					complete: function() {
						$('#loading-detail').hide();
					}
				});
			});
		}

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
							$(".instalasi").css("display", "");
							$(".ruangan").css("display", "");
							$(".sarana").css("display", "");
							$("#id_alkes").prop("required", true);
							$("#instalasi").prop("required", true);
							$("#ruangan").prop("required", true);
							$("#sarana").prop("required", true);

						} else if (obj.id_jenis_output == 10) {
							$(".alkes").css("display", "none");
							$(".instalasi").css("display", "");
							$(".ruangan").css("display", "");
							$(".sarana").css("display", "none");
							$("#instalasi").prop("required", true);
							$("#ruangan").prop("required", true);

						} else {
							$(".alkes").css("display", "none");
							$(".instalasi").css("display", "none");
							$(".ruangan").css("display", "none");
							$(".sarana").css("display", "none");
							$("#id_alkes").prop("required", false);
							$("#instalasi").prop("required", false);
							$("#ruangan").prop("required", false);
							$("#sarana").prop("required", false);
						}
						$('#id_jenis_output').val(obj.id_jenis_output);
						$('#nama_jenis_output').val(obj.nama_jenis_output);
						//$('#id_satuan').val(obj.id_satuan);
						//$('#satuan').val(obj.satuan);
					},
				});
			} else {
				$('#rincian').html('<option value="">Select Rincian</option>');
			}
			var jenis_satker = <?php echo $this->session->userdata('id_jenis_satker') ?>;
			if (jenis_satker == 3 || jenis_satker == 5) {
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
			var jenis_satker = <?php echo $this->session->userdata('id_jenis_satker') ?>;
			if (jenis_satker == 3 || jenis_satker == 5) {
				var fasyankes = document.getElementById('fasyankes').value;
			} else {
				var fasyankes = document.querySelector('input[name="fasyankes"]:checked').value;
			}
			var id_jenis_output = document.getElementById('id_jenis_output').value;
			if (id_jenis_output == 2) {
				if (sarana != '') {
					$.ajax({
						url: "<?php echo base_url(); ?>t_dak_rincian/fetch_alkes",
						method: "POST",
						data: {
							sarana: sarana,
							fasyankes: fasyankes
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