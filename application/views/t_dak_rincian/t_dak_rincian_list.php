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
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_dak_rincian/create/' . $id_alokasi), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Alokasi', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                        </div>
                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                            <thead class="thead-themed">
                                <tr class="text-center">
                                    <th>Komponen</th>
                                    <th>Komponen Sub</th>
                                    <th>Rincian</th>
                                    <!-- <th>Jenis Output</th> -->
                                    <th>Harga Satuan (Rp)</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Total (Rp)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dt_rincian as $dt) { ?>
                                    <tr>
                                        <td><?php echo $dt->nama_dak_komponen ?></td>
                                        <td><?php echo $dt->nama_dak_komponen_sub ?></td>
                                        <td><?php echo $dt->nama_dak_rincian ?></td>
                                        <!-- <td><?php echo $dt->nama_jenis_output ?></td> -->
                                        <td><?php echo angka($dt->harga_satuan) ?></td>
                                        <td><?php echo $dt->volume ?></td>
                                        <td><?php echo $dt->satuan ?></td>
                                        <td><?php echo angka($dt->total) ?></td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-primary waves-effect waves-themed" data-toggle="modal" data-target="#modal-<?php echo $dt->id_rincian ?>"><i class="fal fa-eye"></i></button>
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
                                            </div>
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
                                            <?php
                                            echo anchor(site_url('T_realisasi/realisasi/' . $dt->id_rincian), 'Realisasi', 'class="btn btn-success btn-xs waves-effect waves-themed"');
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