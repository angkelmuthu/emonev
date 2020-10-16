<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA T_DAK_RINCIAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Satker</td>
                                    <td><?php echo $satker ?></td>
                                    <td>Jenis DAK</td>
                                    <td><?php echo $nama_dak_sub_bidang ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Anggaran</td>
                                    <td><?php echo $tahun ?></td>
                                    <td>Nilai Alokasi</td>
                                    <td>Rp. <?php echo angka($nilai_alokasi) ?></td>
                                </tr>
                                <tr>
                                    <td>Persentase Alokasi Kegiatan</td>
                                    <td><?php if ($ttl_rincian > 0) {
                                            echo round($ttl_rincian / $nilai_alokasi * 100, 2);
                                        } else {
                                            echo '0';
                                        } ?> %</td>
                                    <td>Nilai Alokasi Kegiatan</td>
                                    <td>Rp. <?php echo angka($ttl_rincian) ?></td>
                                </tr>
                                <tr>
                                    <td>Persentase Realisasi Kegiatan</td>
                                    <td><?php if ($ttl_realisasi > 0) {
                                            echo round($ttl_realisasi / $nilai_alokasi * 100, 2);
                                        } else {
                                            echo '0';
                                        } ?> %</td>
                                    <td>Nilai Realisasi Kegiatan</td>
                                    <td>Rp. <?php echo angka($ttl_realisasi) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php
                            $this->db->where('id_satker', $this->session->userdata('id_satker'));
                            $query = $this->db->get('m_petugas');
                            if ($query->num_rows() > 0) { ?>
                                <?php echo anchor(site_url('t_dak_rincian/create/' . $id_alokasi), '<i class="fal fa-plus-square" aria-hidden="true"></i> Isi Laporan Kegiatan', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                                <?php echo anchor(site_url('m_dak_alokasi_satker'), 'Kembali', 'class="btn btn-warning btn-sm waves-effect waves-themed"'); ?>
                            <?php } else { ?>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-themed" data-toggle="modal" data-target="#modal-petugas"><i class="fal fa-plus-square"></i> Tambah Alokasi</button>
                                <?php echo anchor(site_url('m_dak_alokasi_satker'), 'Kembali', 'class="btn btn-warning btn-sm waves-effect waves-themed"'); ?>
                                <div class="modal fade" id="modal-petugas" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Informasi
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Anda belum mengisi Profil Petugas</h3>
                                                <p>Silahkan Tekan tombol Profi untuk mengisi profil petugas</p>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url() ?>m_petugas" class="btn btn-primary">Profil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                            <thead class="thead-themed">
                                <tr class="text-center">
                                    <th>Sub Bidang</th>
                                    <th>Rincian</th>
                                    <th>Lokasi Kegiatan / Alkes</th>
                                    <!-- <th>Jenis Output</th> -->
                                    <th>Harga Satuan (Rp)</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Total (Rp)</th>
                                    <th>Realisasi (%)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dt_rincian as $dt) { ?>
                                    <tr>
                                        <td><?php echo $dt->nama_dak_komponen ?></td>
                                        <td><?php echo $dt->nama_dak_komponen_sub ?></td>
                                        <td>
                                            <?php if (!empty($dt->kode_alkes)) {
                                                    echo $dt->nama_alkes;
                                                } else { ?>
                                                <?php if (!empty($dt->nama_instalasi)) { ?>
                                                    <span class="badge border border-primary text-primary">Pelayanan : <?php echo $dt->nama_instalasi; ?></span>
                                                <?php }
                                                        if (!empty($dt->nama_ruangan)) { ?>
                                                    <span class="badge border border-secondary text-secondary">Sub Pelayanan : <?php echo $dt->nama_ruangan; ?></span>
                                                <?php }
                                                        if (!empty($dt->nama_sarana)) { ?>
                                                    <span class="badge border border-success text-success">Ruangan : <?php echo $dt->nama_sarana; ?></span>
                                            <?php }
                                                } ?>
                                        </td>
                                        <!-- <td><?php echo $dt->nama_jenis_output ?></td> -->
                                        <td class="text-right"><?php echo angka($dt->harga_satuan) ?></td>
                                        <td class="text-center"><?php echo $dt->volume ?></td>
                                        <td class="text-center"><?php echo $dt->satuan ?></td>
                                        <td class="text-right"><?php echo angka($dt->total) ?></td>
                                        <td class="text-center"><?php echo $dt->persen ?>%</td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url() ?>t_dak_rincian/read/<?php echo $dt->id_rincian ?>/<?php echo $this->uri->segment(3) ?>" class="btn btn-xs btn-primary waves-effect waves-themed"><i class="fal fa-eye"></i></a>
                                            <!-- <button type="button" class="btn btn-xs btn-primary waves-effect waves-themed" data-toggle="modal" data-target="#modal-<?php echo $dt->id_rincian ?>"><i class="fal fa-eye"></i></button>
                                            <div class="modal fade" id="modal-<?php echo $dt->id_rincian ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                Detail Rincian Alokasi
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover table-striped w-100">
                                                                <tr>
                                                                    <th>Komponen</th>
                                                                    <td><?php echo $dt->nama_dak_komponen ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Komponen Sub</th>
                                                                    <td><?php echo $dt->nama_dak_komponen_sub ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kegiatan</th>
                                                                    <td><?php echo $dt->menu_kegiatan ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sub Kegiatan</th>
                                                                    <td><?php echo $dt->kegiatan ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Rincian</th>
                                                                    <td><?php echo $dt->nama_dak_rincian ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alkes</th>
                                                                    <td><?php echo $dt->nama_alkes ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Output</th>
                                                                    <td><?php echo $dt->nama_jenis_output ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Harga Satuan (Rp)</th>
                                                                    <td><?php echo angka($dt->harga_satuan) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Volume</th>
                                                                    <td><?php echo $dt->volume ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Satuan</th>
                                                                    <td><?php echo $dt->satuan ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total (Rp)</th>
                                                                    <td><?php echo angka($dt->total) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sarana</th>
                                                                    <td><?php echo $dt->sarana ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>NIP Penginput</th>
                                                                    <td><?php echo $dt->nip_pengisi ?></td>
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
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!------------------------------------------------------>
                                            <button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm<?php echo $dt->id_rincian ?>"><i class="fal fa-trash" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="default-example-modal-sm<?php echo $dt->id_rincian ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title">INFO!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda Yakin Ingin Menghapus?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?php echo base_url() ?>t_dak_rincian/delete/<?php echo $dt->id_rincian ?>/<?php echo $this->uri->segment(3) ?>" class="btn btn-primary">Ya, Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-------------------------------------------------------------->
                                            <a href="<?php echo base_url() ?>t_dak_rincian/update/<?php echo $this->uri->segment(3) ?>/<?php echo $dt->id_rincian ?>" class="btn btn-xs btn-warning waves-effect waves-themed"><i class="fal fa-pencil"></i> Edit</a>
                                            <?php
                                                echo anchor(site_url('T_realisasi/realisasi/' . $dt->id_rincian . '/' . $this->uri->segment(3)), 'Realisasi', 'class="btn btn-success btn-xs waves-effect waves-themed"');
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>