<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA ALOKASI APBN COVID-19</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No</th>
                                        <th>Kegiatan</th>
                                        <th>Satker</th>
                                        <th>Volume</th>
                                        <th>Alokasi</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        foreach ($alokasi as $dt) {
                                            $no = 1;
                                        ?>
                                        <tr>
                                            <td width="10px"><?php echo $no ?></td>
                                            <td><?php echo $dt->nama_kegiatan ?></td>
                                            <td><?php echo $dt->nama_satker ?></td>
                                            <td><?php echo $dt->volume ?></td>
                                            <td><?php echo angka($dt->alokasi) ?></td>
                                            <td><?php echo $dt->created_date ?></td>
                                            <td style="text-align:center" width="200px">
                                                <a href="<?php echo base_url() ?>t_apbn_covid_realisasi/realisasi/<?php echo $dt->id_alokasi ?>" class="btn btn-sm btn-primary"><i class="fal fa-eye"></i> Realisasi</a>
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