<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
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
                                        <td><?php echo $satker ?></td>
                                        <td>Tahun Anggaran</td>
                                        <td><?php echo $tahun ?></td>

                                    </tr>
                                    <tr>
                                        <td>Jenis DAK</td>
                                        <td><?php echo $nama_dak_sub_bidang ?></td>
                                        <td>Nilai Alokasi</td>
                                        <td>Rp. <?php echo angka($nilai_alokasi) ?></td>
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
                                        <th>Sub Bidang</th>
                                        <td><?php echo $nama_dak_sub_bidang; ?></td>
                                        <th>Menu</th>
                                        <td><?php echo $nama_dak_komponen; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Rincian</th>
                                        <td><?php echo $nama_dak_rincian; ?></td>
                                        <th>Jenis Output</th>
                                        <td><?php echo $nama_jenis_output; ?></td>
                                    </tr>

                                    <?php if ($id_jenis_output == 2) {
                                        echo '<tr><td>Alat Kesehatan</td><td colspan=3>' . $nama_alkes . '</td></tr>';
                                    } ?>
                                    <tr>
                                        <th>Volume</th>
                                        <td><?php echo $volume; ?></td>
                                        <th>Satuan</th>
                                        <td><?php echo $satuan; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga Satuan</th>
                                        <td>Rp. <?php echo angka($harga_satuan); ?></td>
                                        <th>Total Alokasi</th>
                                        <td>Rp. <?php echo angka($total); ?></td>
                                    </tr>
                                    <tr>
                                        <th>LokUs</th>
                                        <td colspan="3">
                                            <?php if ($this->session->userdata('id_jenis_satker') == '1' || $this->session->userdata('id_jenis_satker') == '2') { ?>
                                                <span class="badge border border-primary text-primary">Lokus : <?php echo $nama_nonsatker_lokasi; ?></span>
                                            <?php } ?>
                                            <?php if (!empty($nama_instalasi)) { ?>
                                                <span class="badge border border-primary text-primary">Pelayanan : <?php echo $nama_instalasi; ?></span>
                                            <?php }
                                            if (!empty($nama_ruangan)) { ?>
                                                <span class="badge border border-secondary text-secondary">Sub Pelayanan : <?php echo $nama_ruangan; ?></span>
                                            <?php }
                                            if (!empty($nama_sarana)) { ?>
                                                <span class="badge border border-success text-success">Ruangan : <?php echo $nama_sarana; ?></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Petugas Penginput</th>
                                        <td colspan="3">
                                            <span class="badge border border-success text-success">NIP : <?php echo $nip_pengisi ?></span>
                                            <span class="badge border border-success text-success">Nama : <?php echo $nama_pengisi ?></span>
                                            <span class="badge border border-success text-success">Jabatan : <?php echo $jabatan_pengisi ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created Date</th>
                                        <td colspan="3"><?php echo $created_date; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>DAK REALISASI TRIWULAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_realisasi/create/' . $this->uri->segment(3)) . '/' . $this->uri->segment(4), '<i class="fal fa-plus-square" aria-hidden="true"></i> Input Realisasi', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                            <?php echo anchor(site_url('t_dak_rincian/rincian/' . $this->uri->segment(4)), 'Kembali', 'class="btn btn-warning btn-sm waves-effect waves-themed"'); ?>
                        </div><br>
                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                            <thead class="thead-themed">
                                <tr>
                                    <th>Periode</th>
                                    <th>Realisasi Volume</th>
                                    <th>Realisasi Satuan</th>

                                    <th>Persentase</th>
                                    <th>Realisasi Harga Satuan</th>
                                    <th>Realisasi Nilai</th>
                                    <th>Progress</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($realisasi as $dt) { ?>
                                    <tr>
                                        <td><?php echo $dt->periode ?></td>
                                        <td><?php echo $dt->realisasi_fisik ?></td>
                                        <td><?php echo $dt->satuan ?></td>
                                        <td><?php echo $dt->realisasi_persen ?>%</td>
                                        <td><?php echo angka($dt->realisasi_harga_satuan) ?></td>
                                        <td><?php echo angka($dt->realisasi_nilai) ?></td>
                                        <td><?php echo $dt->nama_progres ?></td>
                                        <td>
                                            <?php echo anchor(site_url('t_realisasi/read/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $dt->id_realisasi), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                                            <?php echo anchor(site_url('t_realisasi/update/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $dt->id_realisasi), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm waves-effect waves-themed"');
                                            ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script> -->
<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#example').DataTable();
    // });
</script>