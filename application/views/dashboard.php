<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/c3/c3.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <?php foreach ($k_dash as $dashboard) { ?>
            <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
                <!-- profile summary -->
                <div class="card mb-g rounded-top">
                    <div class="row no-gutters row-grid">
                        <div class="col-12">
                            <div class="d-flex flex-column align-items-center justify-content-center p-3">
                                <h5 class="mb-0 fw-700 text-center mt-1">
                                    <?php echo $dashboard->nm_rs; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h4 class="mb-0 fw-700">
                                    <?php echo $dashboard->rj + $dashboard->ri + $dashboard->igd; ?>
                                    <small class="text-muted mb-0">Pengunjung</small>
                                </h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h4 class="mb-0 fw-700">
                                    Rp. <?php echo number_format($dashboard->lunas + $dashboard->hutang); ?>
                                    <small class="text-muted mb-0">Pendapatan</small>
                                </h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-1 text-center">
                                <a href="./Dashboard/detail/<?php echo $dashboard->kdrs; ?>" class="btn-link font-weight-bold">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>