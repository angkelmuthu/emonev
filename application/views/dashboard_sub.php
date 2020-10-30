<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/chartjs/chartjs.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Dashboard Persentase RKA & Realisasi
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-3" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Persentase Rencana Kegiatan <span class="fw-300"><i>Nasional</i></span>
                            </h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="progress progress-lg">
                                    <?php
                                    if (count($dt_progres) > 0) {
                                        foreach ($dt_progres as $data) {
                                            if ($data->rka > 0) {
                                                $rka = round($data->rka / $data->alokasi * 100, 2);
                                            } else {
                                                $rka = 0;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-3" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Persentase Realisasi <span class="fw-300"><i>Nasional</i></span>
                            </h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="progress progress-lg">
                                    <?php
                                    if (count($dt_progres) > 0) {
                                        foreach ($dt_progres as $data) {
                                            if ($data->realisasi > 0) {
                                                $realisasi = round($data->realisasi / $data->alokasi * 100, 2);
                                            } else {
                                                $realisasi = 0;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $realisasi; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $realisasi; ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div id="panel-8" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Persentase Rencana Anggaran (RKA) & Realisasi <span class="fw-300"><i>Berdasarkan Provinsi</i></span>
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="barChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/chartjs/chartjs.bundle.js"></script>
<script>
    /* bar chart */
    // var barChart = function() {
    //     var barChartData = {
    //         labels: [
    //             <?php
                    //             if (count($dt_bar) > 0) {
                    //                 foreach ($dt_bar as $data) {
                    //                     echo "'" . $data->nama_provinsi . "',";
                    //                 }
                    //             }
                    //
                    ?>
    //         ],
    //         datasets: [{
    //                 label: "RKA",
    //                 backgroundColor: myapp_get_color.success_300,
    //                 borderColor: myapp_get_color.success_500,
    //                 borderWidth: 1,
    //                 data: [
    //                     <?php
                            //                     if (count($dt_bar) > 0) {
                            //                         foreach ($dt_bar as $data) {
                            //                             if ($data->rka > 0) {
                            //                                 echo round($data->rka / $data->alokasi * 100, 2) . ", ";
                            //                             } else {
                            //                                 echo "0, ";
                            //                             }
                            //                         }
                            //                     }
                            //
                            ?>
    //                 ]
    //             },
    //             {
    //                 label: "Realisasi",
    //                 backgroundColor: myapp_get_color.primary_300,
    //                 borderColor: myapp_get_color.primary_500,
    //                 borderWidth: 1,
    //                 data: [
    //                     <?php
                            //                     if (count($dt_bar) > 0) {
                            //                         foreach ($dt_bar as $data) {
                            //                             if ($data->realisasi > 0) {
                            //                                 echo round($data->realisasi / $data->alokasi * 100, 2) . ", ";
                            //                             } else {
                            //                                 echo "0, ";
                            //                             }
                            //                         }
                            //                     }
                            //
                            ?>
    //                 ]
    //             }
    //         ]

    //     };
    //     var config = {
    //         type: 'bar',
    //         data: barChartData,
    //         options: {
    //             responsive: true,
    //             //onClick: graphClickEvent,
    //             legend: {
    //                 position: 'top',
    //             },
    //             title: {
    //                 display: false,
    //                 text: 'Bar Chart'
    //             },
    //             scales: {
    //                 xAxes: [{
    //                     display: true,
    //                     scaleLabel: {
    //                         display: false,
    //                         labelString: '6 months forecast'
    //                     },
    //                     gridLines: {
    //                         display: true,
    //                         color: "#f2f2f2"
    //                     },
    //                     ticks: {
    //                         beginAtZero: true,
    //                         fontSize: 11
    //                     }
    //                 }],
    //                 yAxes: [{
    //                     display: true,
    //                     scaleLabel: {
    //                         display: false,
    //                         labelString: 'Profit margin (approx)'
    //                     },
    //                     gridLines: {
    //                         display: true,
    //                         color: "#f2f2f2"
    //                     },
    //                     ticks: {
    //                         beginAtZero: true,
    //                         fontSize: 11
    //                     }
    //                 }]
    //             }
    //         }
    //     }
    //     new Chart($("#barChart > canvas").get(0).getContext("2d"), config);
    //     var myChart = new Chart($("#barChart > canvas").get(0).getContext("2d"), config);

    //     document.getElementById("barChart").onclick = function(evt) {
    //         var activePoints = myChart.getElementsAtEvent(evt);
    //         var firstPoint = activePoints[0];
    //         var label = myChart.data.labels[firstPoint._index];
    //         var value = myChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
    //         if (firstPoint !== undefined)
    //             window.location.href = "dashboard/sub/" + label;
    //     };
    // }
    /* bar chart -- end */

    /* initialize all charts */
    $(document).ready(function() {
        // lineChart();
        // areaChart();
        // horizontalBarChart();
        //barChart();
        // barStacked();
        // barHorizontalStacked();
        // bubbleChart();
        // barlineCombine();
        // polarArea();
        // radarChart();
        // pieChart();
        // doughnutChart();
    });
</script>