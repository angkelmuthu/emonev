<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA DAK RINCIAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_dak_rincian/create/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Id Menu Sub</th>
                                    <th>Id Dak Alokasi</th>
                                    <th>Id Dak Rincian</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan</th>
                                    <th>Satuan</th>
                                    <th>Total</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dt_rincian as $dt) { ?>
                                    <tr>
                                        <td widtd="30px"><?php echo $no ?></td>
                                        <td><?php echo $dt->id_menu_sub ?></td>
                                        <td><?php echo $dt->id_dak_alokasi ?></td>
                                        <td><?php echo $dt->id_dak_rincian ?>n</td>
                                        <td><?php echo $dt->volume ?></td>
                                        <td><?php echo $dt->harga_satuan ?></td>
                                        <td><?php echo $dt->satuan ?></td>
                                        <td><?php echo $dt->total ?></td>
                                        <td>Action</td>
                                    </tr>
                                <?php $no++;
                                } ?>
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