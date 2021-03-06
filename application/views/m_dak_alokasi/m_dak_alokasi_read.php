<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>M_dak_alokasi Read</h2>
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
                                <td>Dak Jenis</td>
                                <td><?php echo $nama_jenis_dak; ?></td>
                            </tr>
                            <tr>
                                <td>Dak Kelompok</td>
                                <td><?php echo $dak_kelompok; ?></td>
                            </tr>
                            <tr>
                                <td>Dak Sub Bidang</td>
                                <td><?php echo $nama_dak_sub_bidang; ?></td>
                            </tr>
                            <tr>
                                <td>Satker</td>
                                <td><?php echo $satker; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td><?php echo $tahun; ?></td>
                            </tr>
                            <tr>
                                <td>Nilai Alokasi</td>
                                <td><?php echo $nilai_alokasi; ?></td>
                            </tr>
                            <tr>
                                <td>Created By</td>
                                <td><?php echo $created_by; ?></td>
                            </tr>
                            <tr>
                                <td>Created Date</td>
                                <td><?php echo $created_date; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('m_dak_alokasi') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>