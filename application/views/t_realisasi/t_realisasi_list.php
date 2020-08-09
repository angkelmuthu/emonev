<main id="js-page-content" role="main" class="page-content">
    <div class="row">
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
                        <table class="table table-striped">
                            <tr>
                                <th>Kegiatan</th>
                                <td colspan="3"><?php echo $nama_menu_kegiatan; ?></td>
                            </tr>
                            <tr>
                                <th>Rincian Kegitan</th>
                                <td colspan="3"><?php if (!empty($id_dak_rincian)) {
                                                    echo $nama_dak_rincian;
                                                } else {
                                                    echo $nama_alkes;
                                                } ?></td>
                            </tr>
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
                        </table>
                        <hr>
                        <div class="text-center">
                            <?php echo anchor(site_url('t_realisasi/create/' . $this->uri->segment(3)), '<i class="fal fa-plus-square" aria-hidden="true"></i> Input Realisasi', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div><br>
                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                            <thead class="thead-themed">
                                <tr>
                                    <th>Periode</th>
                                    <th>Realisasi Volume</th>
                                    <th>Realisasi Harga Satuan</th>
                                    <th>Realisasi Satuan</th>
                                    <th>Persentase</th>
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
                                        <td><?php echo angka($dt->realisasi_harga_satuan) ?></td>
                                        <td><?php echo $dt->satuan ?></td>
                                        <td><?php echo $dt->realisasi_persen ?>%</td>
                                        <td><?php echo angka($dt->realisasi_nilai) ?></td>
                                        <td><?php echo $dt->id_progress ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect waves-themed" data-toggle="modal" data-target="#detail<?php echo $dt->id_realisasi ?>">Detail</button>
                                            <div class="modal fade" id="detail<?php echo $dt->id_realisasi ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">DAK Realisasi <?php echo $dt->periode ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover table-striped w-100" id="example">
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
                                                                    <td><?php echo $dt->id_progress ?></td>
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
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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