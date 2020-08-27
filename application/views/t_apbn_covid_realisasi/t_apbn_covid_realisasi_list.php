<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA REALISAI APBN COVID-19</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody><?php
                                        foreach ($alokasi as $dt) {
                                        ?>
                                        <tr>
                                            <th>Kegiatan</th>
                                            <td><?php echo $dt->nama_kegiatan ?></td>
                                            <th>Volume</th>
                                            <td><?php echo $dt->volume ?></td>
                                        </tr>
                                        <tr>
                                            <th>Satker</th>
                                            <td><?php echo $dt->nama_satker ?></td>
                                            <th>Alokasi</th>
                                            <td><?php echo angka($dt->alokasi) ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_apbn_covid_realisasi/create/' . $this->uri->segment(3)), '<i class="fal fa-plus-square" aria-hidden="true"></i> Input Realisasi', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                            <?php //echo anchor(site_url('t_apbn_covid_realisasi/excel'), '<i class="fal fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-outline-success btn-sm waves-effect waves-themed"');
                            ?></div>
                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Volume</th>
                                    <th>Realisasi Persen</th>
                                    <th>Realisasi Nilai</th>
                                    <th>Hambatan</th>
                                    <th>Tindak Lanjut</th>
                                    <th>Create Date</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody><?php
                                    foreach ($realisasi as $dt) {
                                        $no = 1;
                                    ?>
                                    <tr>
                                        <td width="10px"><?php echo $no ?></td>
                                        <td><?php echo $dt->volume ?></td>
                                        <td><?php echo $dt->realisasi_persen ?></td>
                                        <td><?php echo angka($dt->realisasi_nilai) ?></td>
                                        <td><?php echo $dt->nama_hambatan ?></td>
                                        <td><?php echo $dt->tindak_lanjut ?></td>
                                        <td><?php echo $dt->created_date ?></td>
                                        <td style="text-align:center" width="200px">
                                            <a href="<?php echo base_url() ?>t_apbn_covid_realisasi/delete/<?php echo $dt->id_realisasi . '/' . $dt->id_alokasi ?>" class="btn btn-sm btn-danger"><i class="fal fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                        $no++;
                                    }
                                ?>
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