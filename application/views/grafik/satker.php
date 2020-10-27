<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>
<?php 
$jumlah_kelompok = '';
$kelompok = '';
 foreach ($result as $key => $value) {
 	$kelompok[$value['id_dak_kelompok']] = $value['nama'];
 	$jumlah_kelompok[$value['id_dak_kelompok']] += 1;
 	$jumlah_nilai[$value['id_dak_kelompok']] += $value['nilai_alokasi'];


 	$jenis[$value['id_satker_jenis']] = $value['jenis_satker'];
 	$jumlah_jenis[$value['id_satker_jenis']] += 1;

 }

 foreach ($kelompok as $key => $value) {
   $d[] = array('satker' => $value , 'jumlah' => $jumlah_kelompok[$key] );
   $e[] = array('satker_jenis' => $value , 'nilai' => $jumlah_nilai[$key] );
 }

 foreach ($jenis as $key => $value) {
   $c[] = array('jenis_satker' => $value , 'total' => $jumlah_jenis[$key] );
 }

 //print_r($c);
?>
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Satker DAK 
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content" style="width: 50%; float: left;">
                        <div id="chartdiv"></div>
                        <br>
                        Keterangan Satker : <br>
                        <?php
                           foreach ($c as $key => $value) {
                           	 echo $value['jenis_satker'].' = '.$value['total'].'<br>';
                           }
                         ?>
                    </div>
                    <div class="panel-content" style="width: 50% ;float:left;">
                        <div id="chartdivPie"></div>
                    </div>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>


        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Alokasi DAK 
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content" style="width: 50%; float: left;">
                        <div id="chartdivAlokasi"></div>
                    </div>
                    <div class="panel-content" style="width: 50%; float: left;">
                        <div id="chartdivAlokasiPie"></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<!-- Chart code -->
<script>

var sumber = <?php echo json_encode($d); ?>;
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = sumber;

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "satker";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "jumlah";
series.dataFields.categoryX = "satker";
series.name = "Satker";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
</script>



<script>

var sum = <?php echo json_encode($e); ?>;
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdivAlokasi", am4charts.XYChart);

// Add data
chart.data = sum;

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "satker_jenis";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "nilai";
series.dataFields.categoryX = "satker_jenis";
series.name = "Satker";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
</script>

<script>
am4core.ready(function() {
var s = <?php echo json_encode($d); ?>;
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdivPie", am4charts.PieChart);

// Add data
chart.data = s;

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "jumlah";
pieSeries.dataFields.category = "satker";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
</script>



<script>
am4core.ready(function() {
var sp = <?php echo json_encode($e); ?>;
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdivAlokasiPie", am4charts.PieChart);

// Add data
chart.data = sp;

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "nilai";
pieSeries.dataFields.category = "satker_jenis";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
</script>