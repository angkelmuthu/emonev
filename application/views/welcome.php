<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/c3/c3.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <!-- <div class="col-xl-12">

            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Donut <span class="fw-300"><i>Chart</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="donutChart1" style="width:100%; height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="donutChart2" style="width:100%; height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="donutChart3" style="width:100%; height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="donutChart4" style="width:100%; height:300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<!-- dependency for c3 charts : this dependency is a BSD license with clause 3 -->
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/d3/d3.js"></script>
<!-- c3 charts : MIT license -->
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/c3/c3.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/demo-data/demo-c3.js"></script>
<script>
    var colors = [myapp_get_color.success_500, myapp_get_color.danger_500, myapp_get_color.info_500, myapp_get_color.primary_500, myapp_get_color.warning_500];

    var donutChart = c3.generate({
        bindto: "#donutChart1",
        data: {
            // iris data from R
            columns: [
                ['Rawat Jalan', 130],
                ['Rawat Inap', 76],
                ['IGD', 20],
            ],
            type: 'donut' //,
            /*onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }*/
        },
        donut: {
            title: "RS Bhayangkara"
        },
        color: {
            pattern: colors
        }
    });
    var donutChart = c3.generate({
        bindto: "#donutChart2",
        data: {
            // iris data from R
            columns: [
                ['Rawat Jalan', 186],
                ['Rawat Inap', 106],
                ['IGD', 42],
            ],
            type: 'donut' //,
            /*onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }*/
        },
        donut: {
            title: "RS Pasundan"
        },
        color: {
            pattern: colors
        }
    });
    var donutChart = c3.generate({
        bindto: "#donutChart3",
        data: {
            // iris data from R
            columns: [
                ['Rawat Jalan', 570],
                ['Rawat Inap', 0],
                ['IGD', 0],
            ],
            type: 'donut' //,
            /*onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }*/
        },
        donut: {
            title: "Klinik Dr. Herman"
        },
        color: {
            pattern: colors
        }
    });
    var donutChart = c3.generate({
        bindto: "#donutChart4",
        data: {
            // iris data from R
            columns: [
                ['Rawat Jalan', 103],
                ['Rawat Inap', 46],
                ['IGD', 22],
            ],
            type: 'donut' //,
            /*onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }*/
        },
        donut: {
            title: "RS Prima Medika"
        },
        color: {
            pattern: colors
        }
    });
</script>