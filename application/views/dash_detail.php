<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/chartjs/chartjs.css">
<?php
$kdrs = $this->uri->segment('3');
$sql = "SELECT * FROM m_rs where kdrs=" . $kdrs . "";
$query = $this->db->query($sql);
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $nmrs = $row->nm_rs;
        $jenis = $row->jenis;
        $kelas = $row->kelas;
        $dirut = $row->dirut;
    }
}
?>
<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> <?php echo $nmrs; ?>
            <small>Dirut : <b><?php echo $dirut; ?></b> | Jenis : <b><?php echo $jenis; ?></b> | Kelas : <b><?php echo $kelas; ?></b></small>
        </h1>
        <div class="subheader-block d-lg-flex align-items-center">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Dokter</small>
                </span>
                <span class="fw-500 fs-xl d-block color-primary-500">
                    32 <small>Dokter</small>
                </span>
            </div>
        </div>
        <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Perawat</small>
                </span>
                <span class="fw-500 fs-xl d-block color-danger-500">
                    51 <small>Perawat</small>
                </span>
            </div>
        </div>
        <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Non Medis</small>
                </span>
                <span class="fw-500 fs-xl d-block color-danger-500">
                    128 <small>Pegawai</small>
                </span>
            </div>
        </div>
        <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Pegawai Tetap</small>
                </span>
                <span class="fw-500 fs-xl d-block color-danger-500">
                    128 <small>Pegawai</small>
                </span>
            </div>
        </div>
        <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Pegawai Kontrak</small>
                </span>
                <span class="fw-500 fs-xl d-block color-danger-500">
                    128 <small>Pegawai</small>
                </span>
            </div>
        </div>
        <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Total Pegawai</small>
                </span>
                <span class="fw-500 fs-xl d-block color-danger-500">
                    128 <small>Pegawai</small>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        $kdrs = $this->uri->segment('3');
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $sql = "SELECT a.*,b.carabayar FROM t_pendapatan a left join m_carabayar b on a.cara_bayar=b.kdbayar where a.kdrs=" . $kdrs . " and a.tgl='" . $curr_date . "'";
        $query = $this->db->query($sql);
        //echo $sql;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                if ($data->cara_bayar == 1) {
                    $color = 'bg-primary-300';
                } elseif ($data->cara_bayar == 2) {
                    $color = 'bg-success-300';
                } else {
                    $color = 'bg-warning-300';
                }
                ?>
                <div class="col-sm-2 col-xl-2">
                    <div class="p-3 <?php echo $color; ?> rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-5 d-block l-h-n m-0 fw-500">
                                Rp. <?php echo number_format($data->lunas + $data->hutang); ?>
                                <small class="m-0 l-h-n">Pendapatan <?php echo $data->carabayar; ?></small>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
        <?php
        $kdrs = $this->uri->segment('3');
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $sql = "SELECT sum(hutang) AS hutang,sum(lunas) AS lunas FROM t_pendapatan where kdrs=" . $kdrs . " and tgl='" . $curr_date . "'";
        $query = $this->db->query($sql);
        //echo $sql;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                ?>
                <div class="col-sm-2 col-xl-2">
                    <div class="p-3 bg-info-300 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-5 d-block l-h-n m-0 fw-500">
                                Rp. <?php echo number_format($data->lunas); ?>
                                <small class="m-0 l-h-n">Pendapatan Terbayar</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-xl-2">
                    <div class="p-3 bg-danger-300 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-5 d-block l-h-n m-0 fw-500">
                                Rp. <?php echo number_format($data->hutang); ?>
                                <small class="m-0 l-h-n">Pendapatan Terhutang</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-xl-2">
                    <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-5 d-block l-h-n m-0 fw-500">
                                Rp. <?php echo number_format($data->hutang + $data->lunas); ?>
                                <small class="m-0 l-h-n">Total Pendapatan</small>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Tren Pendapatan<span class="fw-300"><i> Perbulan</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <canvas id="linechart" style="width:100%; height:300px;"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Persentase Pendapatan<span class="fw-300"><i> Berdasarkan Cara Pembayaran</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <canvas id="piechart" style="width:100%; height:300px;"></canvas>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/chartjs/chartjs.bundle.js"></script>
<script>
    var ctx = document.getElementById("linechart").getContext("2d");

    const colors = {
        darkBlue: {
            fill: '#92bed2',
            stroke: '#3282bf',
        },

    };

    //const availableForExisting = [16, 46, 25, 33, 40, 33, 45];
    const xData = ['Jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul'];

    const linechart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: xData,
            datasets: [{
                    label: "Terhutang",
                    backgroundColor: 'rgba(136,106,181, 0.2)',
                    borderColor: myapp_get_color.primary_500,
                    pointBackgroundColor: myapp_get_color.primary_700,
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: 3,
                    pointHoverRadius: 4,
                    data: [
                        45,
                        75,
                        26,
                        23,
                        60, 48, 9
                    ],
                    fill: true
                },
                {
                    label: "Terbayar",
                    backgroundColor: 'rgba(29,201,183, 0.2)',
                    borderColor: myapp_get_color.success_500,
                    pointBackgroundColor: myapp_get_color.success_700,
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: 3,
                    pointHoverRadius: 4,
                    data: [10,
                        16,
                        72,
                        93,
                        29, 74,
                        64
                    ],
                    fill: true
                }
            ]
        },
        options: {
            responsive: false,
            // Can't just just `stacked: true` like the docs say
            scales: {
                yAxes: [{
                    stacked: true,
                }]
            },
            animation: {
                duration: 750,
            },
        }
    });
    //
    var ctx = document.getElementById("piechart").getContext('2d');
    var piechart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Pribadi", "BPJS", "Jaminan"],
            datasets: [{
                backgroundColor: [
                    myapp_get_color.primary_200,
                    myapp_get_color.warning_400,
                    myapp_get_color.success_50
                ],
                data: [12, 19, 3]
            }]
        }
    });
</script>