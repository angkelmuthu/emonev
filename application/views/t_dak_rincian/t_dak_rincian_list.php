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
                            <?php echo anchor(site_url('t_dak_rincian/create/' . $id_alokasi), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Id Satker</th>
                                    <th>Id Dak Alokasi</th>
                                    <th>Tahun Anggaran</th>
                                    <th>Id Dak Bidang</th>
                                    <th>Id Dak Sub Bidang</th>
                                    <th>Id Dak Komponen</th>
                                    <th>Id Dak Komponen Sub</th>
                                    <th>Menu Kegiatan</th>
                                    <th>Kegiatan</th>
                                    <th>Id Dak Rincian</th>
                                    <th>Id Alkes</th>
                                    <th>Id Jenis Output</th>
                                    <th>Harga Satuan</th>
                                    <th>Volume</th>
                                    <th>Volume Perubahan</th>
                                    <th>Satuan</th>
                                    <th>Total</th>
                                    <th>Sarana</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Updated By</th>
                                    <th>Updated Date</th>
                                    <th>Isdeleted</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dt_rincian as $dt) { ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $dt->Id_Satker ?></td>
                                        <td><?php echo $dt->Id_Dak_Alokasi ?></td>
                                        <td><?php echo $dt->Tahun_Anggaran ?></td>
                                        <td><?php echo $dt->Id_Dak_Bidang ?></td>
                                        <td><?php echo $dt->Id_Dak_Sub_Bidang ?></td>
                                        <td><?php echo $dt->Id_Dak_Komponen ?></td>
                                        <td><?php echo $dt->Id_Dak_Komponen_Sub ?></td>
                                        <td><?php echo $dt->Menu_Kegiatan ?></td>
                                        <td><?php echo $dt->Kegiatan ?></td>
                                        <td><?php echo $dt->Id_Dak_Rincian ?></td>
                                        <td><?php echo $dt->Id_Alkes ?></td>
                                        <td><?php echo $dt->Id_Jenis_Output ?></td>
                                        <td><?php echo $dt->Harga_Satuan ?></td>
                                        <td><?php echo $dt->Volume ?></td>
                                        <td><?php echo $dt->Volume_Perubahan ?></td>
                                        <td><?php echo $dt->Satuan ?></td>
                                        <td><?php echo $dt->Total ?></td>
                                        <td><?php echo $dt->Sarana ?></td>
                                        <td><?php echo $dt->Created_By ?></td>
                                        <td><?php echo $dt->Created_Date ?></td>
                                        <td><?php echo $dt->Updated_By ?></td>
                                        <td><?php echo $dt->Updated_Date ?></td>
                                        <td><?php echo $dt->Isdeleted ?></td>
                                        <td></td>
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