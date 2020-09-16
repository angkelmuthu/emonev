<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Sample Dashboard
        </h1>
    </div>
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="fal fa-times"></i>
            </span>
        </button>
        <div class="d-flex flex-start w-100">
            <div class="mr-2 hidden-md-down">
                <span class="icon-stack icon-stack-lg">
                    <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                    <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                    <i class="fal fa-info icon-stack-1x opacity-100 color-white"></i>
                </span>
            </div>
            <div class="d-flex flex-fill">
                <div class="flex-fill">
                    <span class="h5">Ini Contoh Dashboard</span>
                    <br>
                    Halaman ini hanya contoh.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div id="panel-2" class="panel panel-locked" data-panel-sortable data-panel-collapsed data-panel-close>
                <div class="panel-hdr">
                    <h2>
                        Returning <span class="fw-300"><i>Target</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content poisition-relative">
                        <div class="p-1 position-absolute pos-right pos-top mt-3 mr-3 z-index-cloud d-flex align-items-center justify-content-center">
                            <div class="border-faded border-top-0 border-left-0 border-bottom-0 py-2 pr-4 mr-3 hidden-sm-down">
                                <div class="text-right fw-500 l-h-n d-flex flex-column">
                                    <div class="h3 m-0 d-flex align-items-center justify-content-end">
                                        <div class='icon-stack mr-2'>
                                            <i class="base base-7 icon-stack-3x opacity-100 color-success-600"></i>
                                            <i class="base base-7 icon-stack-2x opacity-100 color-success-500"></i>
                                            <i class="fal fa-arrow-up icon-stack-1x opacity-100 color-white"></i>
                                        </div>
                                        $44.34 / GE
                                    </div>
                                    <span class="m-0 fs-xs text-muted">Increased Profit as per redux margins and estimates</span>
                                </div>
                            </div>
                            <div class="js-easy-pie-chart color-info-400 position-relative d-inline-flex align-items-center justify-content-center" data-percent="35" data-piesize="95" data-linewidth="10" data-scalelength="5">
                                <div class="js-easy-pie-chart color-success-400 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="65" data-piesize="60" data-linewidth="5" data-scalelength="1" data-scalecolor="#fff">
                                    <div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark">78%</div>
                                </div>
                            </div>
                        </div>
                        <div id="flot-area" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="panel-3" class="panel panel-locked" data-panel-sortable data-panel-collapsed data-panel-close>
                <div class="panel-hdr">
                    <h2>
                        Effective <span class="fw-300"><i>Marketing</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content poisition-relative">
                        <div class="pb-5 pt-3">
                            <div class="row">
                                <div class="col-6 col-xl-3 d-sm-flex align-items-center">
                                    <div class="p-2 mr-3 bg-info-200 rounded">
                                        <span class="peity-bar" data-peity="{&quot;fill&quot;: [&quot;#fff&quot;], &quot;width&quot;: 27, &quot;height&quot;: 27 }">3,4,5,8,2</span>
                                    </div>
                                    <div>
                                        <label class="fs-sm mb-0">Bounce Rate</label>
                                        <h4 class="font-weight-bold mb-0">37.56%</h4>
                                    </div>
                                </div>
                                <div class="col-6 col-xl-3 d-sm-flex align-items-center">
                                    <div class="p-2 mr-3 bg-info-300 rounded">
                                        <span class="peity-bar" data-peity="{&quot;fill&quot;: [&quot;#fff&quot;], &quot;width&quot;: 27, &quot;height&quot;: 27 }">5,3,1,7,9</span>
                                    </div>
                                    <div>
                                        <label class="fs-sm mb-0">Sessions</label>
                                        <h4 class="font-weight-bold mb-0">759</h4>
                                    </div>
                                </div>
                                <div class="col-6 col-xl-3 d-sm-flex align-items-center">
                                    <div class="p-2 mr-3 bg-success-300 rounded">
                                        <span class="peity-bar" data-peity="{&quot;fill&quot;: [&quot;#fff&quot;], &quot;width&quot;: 27, &quot;height&quot;: 27 }">3,4,3,5,5</span>
                                    </div>
                                    <div>
                                        <label class="fs-sm mb-0">New Sessions</label>
                                        <h4 class="font-weight-bold mb-0">12.17%</h4>
                                    </div>
                                </div>
                                <div class="col-6 col-xl-3 d-sm-flex align-items-center">
                                    <div class="p-2 mr-3 bg-success-500 rounded">
                                        <span class="peity-bar" data-peity="{&quot;fill&quot;: [&quot;#fff&quot;], &quot;width&quot;: 27, &quot;height&quot;: 27 }">6,4,7,5,6</span>
                                    </div>
                                    <div>
                                        <label class="fs-sm mb-0">Clickthrough</label>
                                        <h4 class="font-weight-bold mb-0">19.77%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="flotVisit" style="width:100%; height:208px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/peity/peity.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/flot/flot.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/easypiechart/easypiechart.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script>
    /* defined datas */
    var dataTargetProfit = [
        [1354586000000, 153],
        [1364587000000, 658],
        [1374588000000, 198],
        [1384589000000, 663],
        [1394590000000, 801],
        [1404591000000, 1080],
        [1414592000000, 353],
        [1424593000000, 749],
        [1434594000000, 523],
        [1444595000000, 258],
        [1454596000000, 688],
        [1464597000000, 364]
    ]
    var dataProfit = [
        [1354586000000, 53],
        [1364587000000, 65],
        [1374588000000, 98],
        [1384589000000, 83],
        [1394590000000, 980],
        [1404591000000, 808],
        [1414592000000, 720],
        [1424593000000, 674],
        [1434594000000, 23],
        [1444595000000, 79],
        [1454596000000, 88],
        [1464597000000, 36]
    ]
    var dataSignups = [
        [1354586000000, 647],
        [1364587000000, 435],
        [1374588000000, 784],
        [1384589000000, 346],
        [1394590000000, 487],
        [1404591000000, 463],
        [1414592000000, 479],
        [1424593000000, 236],
        [1434594000000, 843],
        [1444595000000, 657],
        [1454596000000, 241],
        [1464597000000, 341]
    ]
    var dataSet1 = [
        [0, 10],
        [100, 8],
        [200, 7],
        [300, 5],
        [400, 4],
        [500, 6],
        [600, 3],
        [700, 2]
    ];
    var dataSet2 = [
        [0, 9],
        [100, 6],
        [200, 5],
        [300, 3],
        [400, 3],
        [500, 5],
        [600, 2],
        [700, 1]
    ];

    $(document).ready(function() {

        /* init datatables */
        $('#dt-basic-example').dataTable({
            responsive: true,
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'colvis',
                    text: 'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'print',
                    text: '<i class="fal fa-print"></i>',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-default'
                }

            ],
            columnDefs: [{
                    targets: -1,
                    title: '',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        /*
                        -- ES6
                        -- convert using https://babeljs.io online transpiler
                        return `
                        <a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>
                        	<i class="fal fa-times"></i>
                        </a>
                        <div class='dropdown d-inline-block dropleft '>
                        	<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>
                        		<i class="fal fa-ellipsis-v"></i>
                        	</a>
                        	<div class='dropdown-menu'>
                        		<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                        		<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
                        	</div>
                        </div>`;

                        ES5 example below:

                        */
                        return "\n\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>\n\t\t\t\t\t\t\t<i class=\"fal fa-times\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class='dropdown d-inline-block dropleft'>\n\t\t\t\t\t\t\t<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>\n\t\t\t\t\t\t\t\t<i class=\"fal fa-ellipsis-v\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
                    },
                },

            ]

        });


        /* flot toggle example */
        var flot_toggle = function() {

            var data = [{
                    label: "Target Profit",
                    data: dataTargetProfit,
                    color: myapp_get_color.info_400,
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 30 * 30 * 60 * 1000 * 80,
                        lineWidth: 0,
                        /*fillColor: {
                        	colors: [myapp_get_color.primary_500, myapp_get_color.primary_900]
                        },*/
                        fillColor: {
                            colors: [{
                                    opacity: 0.9
                                },
                                {
                                    opacity: 0.1
                                }
                            ]
                        }
                    },
                    highlightColor: 'rgba(255,255,255,0.3)',
                    shadowSize: 0
                },
                {
                    label: "Actual Profit",
                    data: dataProfit,
                    color: myapp_get_color.warning_500,
                    lines: {
                        show: true,
                        lineWidth: 2
                    },
                    shadowSize: 0,
                    points: {
                        show: true
                    }
                },
                {
                    label: "User Signups",
                    data: dataSignups,
                    color: myapp_get_color.success_500,
                    lines: {
                        show: true,
                        lineWidth: 2
                    },
                    shadowSize: 0,
                    points: {
                        show: true
                    }
                }
            ]

            var options = {
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: '#f2f2f2',
                    borderWidth: 1,
                    borderColor: '#f2f2f2'
                },
                tooltip: true,
                tooltipOpts: {
                    cssClass: 'tooltip-inner',
                    defaultTheme: false
                },
                xaxis: {
                    mode: "time"
                },
                yaxes: {
                    tickFormatter: function(val, axis) {
                        return "$" + val;
                    },
                    max: 1200
                }

            };

            var plot2 = null;

            function plotNow() {
                var d = [];
                $("#js-checkbox-toggles").find(':checkbox').each(function() {
                    if ($(this).is(':checked')) {
                        d.push(data[$(this).attr("name").substr(4, 1)]);
                    }
                });
                if (d.length > 0) {
                    if (plot2) {
                        plot2.setData(d);
                        plot2.draw();
                    } else {
                        plot2 = $.plot($("#flot-toggles"), d, options);
                    }
                }

            };

            $("#js-checkbox-toggles").find(':checkbox').on('change', function() {
                plotNow();
            });
            plotNow()
        }
        flot_toggle();
        /* flot toggle example -- end*/

        /* flot area */
        var flotArea = $.plot($('#flot-area'), [{
                data: dataSet1,
                label: 'New Customer',
                color: myapp_get_color.success_200
            },
            {
                data: dataSet2,
                label: 'Returning Customer',
                color: myapp_get_color.info_200
            }
        ], {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                                opacity: 0
                            },
                            {
                                opacity: 0.5
                            }
                        ]
                    }
                },
                shadowSize: 0
            },
            points: {
                show: true,
            },
            legend: {
                noColumns: 1,
                position: 'nw'
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: '#ddd',
                tickColor: '#ddd',
                aboveData: true,
                borderWidth: 0,
                labelMargin: 5,
                backgroundColor: 'transparent'
            },
            yaxis: {
                tickLength: 1,
                min: 0,
                max: 15,
                color: '#eee',
                font: {
                    size: 0,
                    color: '#999'
                }
            },
            xaxis: {
                tickLength: 1,
                color: '#eee',
                font: {
                    size: 10,
                    color: '#999'
                }
            }

        });
        /* flot area -- end */

        var flotVisit = $.plot('#flotVisit', [{
                data: [
                    [3, 0],
                    [4, 1],
                    [5, 3],
                    [6, 3],
                    [7, 10],
                    [8, 11],
                    [9, 12],
                    [10, 9],
                    [11, 12],
                    [12, 8],
                    [13, 5]
                ],
                color: myapp_get_color.success_200
            },
            {
                data: [
                    [1, 0],
                    [2, 0],
                    [3, 1],
                    [4, 2],
                    [5, 2],
                    [6, 5],
                    [7, 8],
                    [8, 12],
                    [9, 9],
                    [10, 11],
                    [11, 5]
                ],
                color: myapp_get_color.info_200
            }
        ], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                                opacity: 0
                            },
                            {
                                opacity: 0.12
                            }
                        ]
                    }
                }
            },
            grid: {
                borderWidth: 0
            },
            yaxis: {
                min: 0,
                max: 15,
                tickColor: '#ddd',
                ticks: [
                    [0, ''],
                    [5, '100K'],
                    [10, '200K'],
                    [15, '300K']
                ],
                font: {
                    color: '#444',
                    size: 10
                }
            },
            xaxis: {

                tickColor: '#eee',
                ticks: [
                    [2, '2am'],
                    [3, '3am'],
                    [4, '4am'],
                    [5, '5am'],
                    [6, '6am'],
                    [7, '7am'],
                    [8, '8am'],
                    [9, '9am'],
                    [10, '1pm'],
                    [11, '2pm'],
                    [12, '3pm'],
                    [13, '4pm']
                ],
                font: {
                    color: '#999',
                    size: 9
                }
            }
        });


    });
</script>