<!--
<link rel="stylesheet" href="https://tingle.robinparisi.com/tingle/tingle.css" media="all">
-->
<style>
#pie_alokasi {
  width: 100%;
  height: 500px;
}

#bar_alokasi_sumber_dana {
  width: 100%;
  height: 500px;
}
#bar_jenis_kontrak {
  width: 100%;
  height: 500px;
}
#bar_alokasi_kegiatan{
  width: 100%;
  height: 500px;
}

#bar_alokasi_sub_kegiatan{
  width: 100%;
  height: 500px;
}

#bar_realisasi_satker{
  width: 100%;
  height: 700px;
}
.tingle-modal-box {
  height: 550px;
  width: 100%;
}
</style>
<!-- {
    country: "Lithuania",
    litres: 501.9
  },
  {
    country: "Czech Republic",
    litres: 301.9
  }, a -->
<?php 
 $tmp_alokasi = 0;
 $realisasi_pembayaran['pembayaran'] = 0;
 $realisasi_pembayaran['pembayaran_sumber_dana'] = 0;
 $tmp_bar_rekapan_kegiatan = 0;
 $ar_kegiatan[999999] = 0;
 $ar_sub_kegiatan[999999] = 0;
 $m_satker = array();
 $sumberDana = array();
 $ar_kontrak = array();
 foreach ($result as $key => $value) {

   if($value['jenis_input'] == 'pembayaran'){
     $ar_kontrak['realisasi_kontrak'] += $value['alokasi_akhir'];
   }

   if($tmp_alokasi != $value['id'] AND $value['level'] == 2){
    $master_alokasi['alokasi'] += $value['alokasi_akhir'];
    $sumberDana[$value['sumber_dana']] += $value['alokasi_akhir'];
   }

   if($value['jenis_input'] == 'pembayaran'){
    $realisasi_pembayaran['pembayaran'] += $value['inputan_nilai'];
    $realisasi_SumberDana[$value['sumber_dana']] += $value['inputan_nilai'];

      if($value['kategori_kontrak'] == 'kontraktual'){
         $ar_kontrak['realisasi_sp2d'] += $value['alokasi_akhir'];
      }
   }

   $tmp_alokasi = $value['id'];
   
   if($value['level'] == 2){
     if(!array_key_exists($value['id_satker'].''.$value['kegiatan'].''.$value['id_sub_kegiatan'], $ar_kegiatan)){
      $kegiatan_alokasi[$value['kegiatan']] += $value['alokasi_akhir'];
     }
   }
   
   if($value['level'] == 2){
    $ar_kegiatan[$value['id_satker'].''.$value['kegiatan'].''.$value['id_sub_kegiatan']] = $value['id_satker'].''.$value['kegiatan'].''.$value['id_sub_kegiatan'];
   }
   if(!array_key_exists($value['id_satker'].''.$value['kegiatan'].''.$value['id_sub_kegiatan'], $ar_sub_kegiatan)){
    $sub_kegiatan_alokasi[$value['id_sub_kegiatan']] += $value['alokasi_akhir'];
   }

   $ar_sub_kegiatan[$value['id_satker'].''.$value['kegiatan'].''.$value['id_sub_kegiatan']] = $value['id_satker'].''.$value['kegiatan'].''.$value['id_kegiatan'];

   if($value['jenis_input'] == 'pembayaran'){
       $kegiatan_realisasi[$value['nama_kegiatan']]['Realisasi'] += $value['inputan_nilai'];
       $sub_kegiatan_realisasi[$value['id_sub_kegiatan']]['Realisasi'] += $value['inputan_nilai'];
       $satker[$value['nama']]['Realisasi'] += $value['inputan_nilai'];
     }else{
       $kegiatan_realisasi[$value['nama_kegiatan']]['Realisasi'] += 0;
       $sub_kegiatan_realisasi[$value['id_sub_kegiatan']]['Realisasi'] += 0;
       $satker[$value['nama']]['Realisasi'] += 0;
     }


   $m_satker[$value['id_satker']] = $value['nama'];

  }
   // create data pie alokasi.
   $pie_alokasi_sumber[0]['judul'] = 'Alokasi';
   $pie_alokasi_sumber[0]['nilai'] = $master_alokasi['alokasi'];
   $pie_alokasi_sumber[1]['judul'] = 'Realisasi';
   $pie_alokasi_sumber[1]['nilai'] =  $realisasi_pembayaran['pembayaran'];

   //echo json_encode($bar_rekapan);
   /*
   {
 "DSP": {
   "Alokasi": 10,
   "Realisasi": 35
 },
 "BABUN": {
   "Alokasi": 15,
   "Realisasi": 21
 }
}
*/
   foreach ($m_kegiatan as $key => $value) {
      $bar_rekapan_kegiatan[$value->nama_kegiatan] = array('Alokasi' =>(!empty($kegiatan_alokasi[$value->id])) ? $kegiatan_alokasi[$value->id] : 0 , 
                                                           "Realisasi" => (!empty($kegiatan_realisasi[$value->nama_kegiatan]['Realisasi'])) ? $kegiatan_realisasi[$value->nama_kegiatan]['Realisasi'] : 0);
   }


   foreach ($m_sub_kegiatan as $key => $value) {
      $bar_rekapan_sub_kegiatan[$value->nama_sub_kegiatan] = array('Alokasi' =>(!empty($sub_kegiatan_alokasi[$value->id])) ? $sub_kegiatan_alokasi[$value->id] : 0, 
                                                           "Realisasi" => (!empty($sub_kegiatan_realisasi[$value->id]['Realisasi'])) ? $sub_kegiatan_realisasi[$value->id]['Realisasi'] : 0);
   }

   foreach ($m_satker as $key => $value) {
      $satker_bar[] = array('country'=>$m_satker[$key],
                            'visits' =>(!empty($satker[$value]['Realisasi'])) ? $satker[$value]['Realisasi'] : 0
                           );
   }
   /*
   , {
  "country": "Russia",
  "visits": 580
}, {
  "country": "South Korea",
  "visits": 443
}
*/
   //echo json_encode($satker_bar);
//print_r($sub_kegiatan_realisasi);
//print_r($sub_kegiatan_alokasi);
 ?>
<main id="js-page-content" role="main" class="page-content">
  <?php //print_r($lk); ?>
  <div class="row">
        <div class="col-xl-12">
            <div class="col-xl-6" style="float: left; width: 100%">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Alokasi Dan Realisasi Anggaran Covid 19
                    </h2>
                </div>
                <div class="panel-container show">
                  <div class="panel-content">
                        <div class="panel-content">
                          <div id="pie_alokasi"></div>
                        </div>
                  </div>
                </div>
            </div>
            </div>

            <div class="col-xl-6" style="float: left; width: 100%">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Alokasi Dan Realisasi Anggaran Covid 19 Per Sumber Dana
                    </h2>
                </div>
                <div class="panel-container show">
                  <div class="panel-content">
                        <div class="panel-content">
                          <div id="bar_alokasi_sumber_dana"></div>
                        </div>
                  </div>
                </div>
            </div>
            </div>

            <div class="col-xl-12" style="float: left; width: 100%">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Alokasi Dan Realisasi Anggaran Covid 19 Per Kegiatan
                    </h2>
                </div>
                <div class="panel-container show">
                  <div class="panel-content">
                        <div class="panel-content">
                          <div id="bar_alokasi_kegiatan"></div>
                        </div>
                  </div>
                </div>
            </div>
            </div>

            <div class="col-xl-12" style="float: left; width: 100%">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Alokasi Dan Realisasi Anggaran Covid 19 Per Sub Kegiatan
                    </h2>
                </div>
                <div class="panel-container show">
                  <div class="panel-content">
                        <div class="panel-content">
                          <div id="bar_alokasi_sub_kegiatan"></div>
                        </div>
                  </div>
                </div>
            </div>
            </div>

            <div class="col-xl-12" style="float: left; width: 100%">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Realisasi Per Satker
                    </h2>
                </div>
                <div class="panel-container show">
                  <div class="panel-content">
                        <div class="panel-content">
                          <div id="bar_realisasi_satker"></div>
                        </div>
                  </div>
                </div>
            </div>
            </div>

            <div class="col-xl-12" style="float: left; width: 100%">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Perbadingan Realisasi Kontrak dan SP2D Kontraktual
                    </h2>
                </div>
                <div class="panel-container show">
                  <div class="panel-content">
                        <div class="panel-content">
                          <div id="bar_jenis_kontrak"></div>
                        </div>
                  </div>
                </div>
            </div>
            </div>
        </div>
  </div>
</main>
<!-- Resourcess -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<!--<script src="https://tingle.robinparisi.com/tingle/tingle.js"></script>-->

<!-- Chart code -->
<script type="text/javascript">
    function detail_grafik(argument) {
    
        var modalSurprise = new tingle.modal({
            onClose: function(){
                modalSurprise.destroy();
            }
        });
        modalSurprise.setContent('<iframe width="100%" height="400" src="http://128.199.218.111/emonev/grafik/grafik_covid/'+argument+'" frameborder="0" allowfullscreen></iframe>');
        modalSurprise.open();
    
    }

</script>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("pie_alokasi", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = <?php echo json_encode($pie_alokasi_sumber); ?>

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "nilai";
series.dataFields.category = "judul";

}); // end am4core.ready()
</script>


<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("bar_alokasi_sumber_dana", am4charts.XYChart);

// some extra padding for range labels
chart.paddingBottom = 50;

chart.cursor = new am4charts.XYCursor();
chart.scrollbarX = new am4core.Scrollbar();

// will use this to store colors of the same items
var colors = {};

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataItems.template.text = "{realName}";
categoryAxis.adapter.add("tooltipText", function(tooltipText, target){
  return categoryAxis.tooltipDataItem.dataContext.realName;
})

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.min = 0;

// single column series for all data
var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.columns.template.width = am4core.percent(80);
columnSeries.tooltipText = "{provider}: {realName}, {valueY}";
columnSeries.dataFields.categoryX = "category";
columnSeries.dataFields.valueY = "value";

// second value axis for quantity
var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis2.renderer.opposite = true;
valueAxis2.syncWithAxis = valueAxis;
valueAxis2.tooltip.disabled = true;

// quantity line series
var lineSeries = chart.series.push(new am4charts.LineSeries());
lineSeries.tooltipText = "{valueY}";
lineSeries.dataFields.categoryX = "category";
lineSeries.dataFields.valueY = "quantity";
lineSeries.yAxis = valueAxis2;
lineSeries.bullets.push(new am4charts.CircleBullet());
lineSeries.stroke = chart.colors.getIndex(13);
lineSeries.fill = lineSeries.stroke;
lineSeries.strokeWidth = 2;
lineSeries.snapTooltip = true;

// when data validated, adjust location of data item based on count
lineSeries.events.on("datavalidated", function(){
 lineSeries.dataItems.each(function(dataItem){
   // if count divides by two, location is 0 (on the grid)
   if(dataItem.dataContext.count / 2 == Math.round(dataItem.dataContext.count / 2)){
   dataItem.setLocation("categoryX", 0);
   }
   // otherwise location is 0.5 (middle)
   else{
    dataItem.setLocation("categoryX", 0.5);
   }
 })
})

// fill adapter, here we save color value to colors object so that each time the item has the same name, the same color is used
columnSeries.columns.template.adapter.add("fill", function(fill, target) {
 var name = target.dataItem.dataContext.realName;
 if (!colors[name]) {
   colors[name] = chart.colors.next();
 }
 target.stroke = colors[name];
 return colors[name];
})


var rangeTemplate = categoryAxis.axisRanges.template;
rangeTemplate.tick.disabled = false;
rangeTemplate.tick.location = 0;
rangeTemplate.tick.strokeOpacity = 0.6;
rangeTemplate.tick.length = 60;
rangeTemplate.grid.strokeOpacity = 0.5;
rangeTemplate.label.tooltip = new am4core.Tooltip();
rangeTemplate.label.tooltip.dy = -10;
rangeTemplate.label.cloneTooltip = false;

///// DATA
var chartData = [];
var lineSeriesData = [];

var data =
{
 "DSP": {
   "Alokasi": <?php echo (!empty($sumberDana['DSP'])) ? $sumberDana['DSP'] : 0; ?>,
   "Realisasi": <?php echo (!empty($realisasi_SumberDana['DSP'])) ? $realisasi_SumberDana['DSP'] : 0; ?>
 },
 "BABUN": {
   "Alokasi": <?php echo (!empty($sumberDana['Babun'])) ? $sumberDana['Babun'] : 0; ?>,
   "Realisasi": <?php echo (!empty($realisasi_SumberDana['Babun'])) ? $realisasi_SumberDana['Babun'] : 0; ?>
 }
}

// process data ant prepare it for the chart
for (var providerName in data) {
 var providerData = data[providerName];

 // add data of one provider to temp array
 var tempArray = [];
 var count = 0;
 // add items
 for (var itemName in providerData) {
   if(itemName != "quantity"){
   count++;
   // we generate unique category for each column (providerName + "_" + itemName) and store realName
   tempArray.push({ category: providerName + "_" + itemName, realName: itemName, value: providerData[itemName], provider: providerName})
   }
 }
 // sort temp array
 tempArray.sort(function(a, b) {
   if (a.value > b.value) {
   return 1;
   }
   else if (a.value < b.value) {
   return -1
   }
   else {
   return 0;
   }
 })

 // add quantity and count to middle data item (line series uses it)
 var lineSeriesDataIndex = Math.floor(count / 2);
 tempArray[lineSeriesDataIndex].quantity = providerData.quantity;
 tempArray[lineSeriesDataIndex].count = count;
 // push to the final data
 am4core.array.each(tempArray, function(item) {
   chartData.push(item);
 })

 // create range (the additional label at the bottom)
 var range = categoryAxis.axisRanges.create();
 range.category = tempArray[0].category;
 range.endCategory = tempArray[tempArray.length - 1].category;
 range.label.text = tempArray[0].provider;
 range.label.dy = 30;
 range.label.truncate = true;
 range.label.fontWeight = "bold";
 range.label.tooltipText = tempArray[0].provider;

 range.label.adapter.add("maxWidth", function(maxWidth, target){
   var range = target.dataItem;
   var startPosition = categoryAxis.categoryToPosition(range.category, 0);
   var endPosition = categoryAxis.categoryToPosition(range.endCategory, 1);
   var startX = categoryAxis.positionToCoordinate(startPosition);
   var endX = categoryAxis.positionToCoordinate(endPosition);
   return endX - startX;
 })
}

chart.data = chartData;


// last tick
var range = categoryAxis.axisRanges.create();
range.category = chart.data[chart.data.length - 1].category;
range.label.disabled = true;
range.tick.location = 1;
range.grid.location = 1;

}); // end am4core.ready()
</script>


<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("bar_alokasi_kegiatan", am4charts.XYChart);

// some extra padding for range labels
chart.paddingBottom = 50;

chart.cursor = new am4charts.XYCursor();
chart.scrollbarX = new am4core.Scrollbar();

// will use this to store colors of the same items
var colors = {};

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataItems.template.text = "{realName}";
categoryAxis.adapter.add("tooltipText", function(tooltipText, target){
  return categoryAxis.tooltipDataItem.dataContext.realName;
})

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.min = 0;

// single column series for all data
var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.columns.template.width = am4core.percent(80);
columnSeries.tooltipText = "{provider}: {realName}, {valueY}";
columnSeries.dataFields.categoryX = "category";
columnSeries.dataFields.valueY = "value";

// second value axis for quantity
var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis2.renderer.opposite = true;
valueAxis2.syncWithAxis = valueAxis;
valueAxis2.tooltip.disabled = true;

// quantity line series
var lineSeries = chart.series.push(new am4charts.LineSeries());
lineSeries.tooltipText = "{valueY}";
lineSeries.dataFields.categoryX = "category";
lineSeries.dataFields.valueY = "quantity";
lineSeries.yAxis = valueAxis2;
lineSeries.bullets.push(new am4charts.CircleBullet());
lineSeries.stroke = chart.colors.getIndex(13);
lineSeries.fill = lineSeries.stroke;
lineSeries.strokeWidth = 2;
lineSeries.snapTooltip = true;

// when data validated, adjust location of data item based on count
lineSeries.events.on("datavalidated", function(){
 lineSeries.dataItems.each(function(dataItem){
   // if count divides by two, location is 0 (on the grid)
   if(dataItem.dataContext.count / 2 == Math.round(dataItem.dataContext.count / 2)){
   dataItem.setLocation("categoryX", 0);
   }
   // otherwise location is 0.5 (middle)
   else{
    dataItem.setLocation("categoryX", 0.5);
   }
 })
})

// fill adapter, here we save color value to colors object so that each time the item has the same name, the same color is used
columnSeries.columns.template.adapter.add("fill", function(fill, target) {
 var name = target.dataItem.dataContext.realName;
 if (!colors[name]) {
   colors[name] = chart.colors.next();
 }
 target.stroke = colors[name];
 return colors[name];
})


var rangeTemplate = categoryAxis.axisRanges.template;
rangeTemplate.tick.disabled = false;
rangeTemplate.tick.location = 0;
rangeTemplate.tick.strokeOpacity = 0.6;
rangeTemplate.tick.length = 60;
rangeTemplate.grid.strokeOpacity = 0.5;
rangeTemplate.label.tooltip = new am4core.Tooltip();
rangeTemplate.label.tooltip.dy = -10;
rangeTemplate.label.cloneTooltip = false;

///// DATA
var chartData = [];
var lineSeriesData = [];

var data = <?php echo json_encode($bar_rekapan_kegiatan); ?>

// process data ant prepare it for the chart
for (var providerName in data) {
 var providerData = data[providerName];

 // add data of one provider to temp array
 var tempArray = [];
 var count = 0;
 // add items
 for (var itemName in providerData) {
   if(itemName != "quantity"){
   count++;
   // we generate unique category for each column (providerName + "_" + itemName) and store realName
   tempArray.push({ category: providerName + "_" + itemName, realName: itemName, value: providerData[itemName], provider: providerName})
   }
 }
 // sort temp array
 tempArray.sort(function(a, b) {
   if (a.value > b.value) {
   return 1;
   }
   else if (a.value < b.value) {
   return -1
   }
   else {
   return 0;
   }
 })

 // add quantity and count to middle data item (line series uses it)
 var lineSeriesDataIndex = Math.floor(count / 2);
 tempArray[lineSeriesDataIndex].quantity = providerData.quantity;
 tempArray[lineSeriesDataIndex].count = count;
 // push to the final data
 am4core.array.each(tempArray, function(item) {
   chartData.push(item);
 })

 // create range (the additional label at the bottom)
 var range = categoryAxis.axisRanges.create();
 range.category = tempArray[0].category;
 range.endCategory = tempArray[tempArray.length - 1].category;
 range.label.text = tempArray[0].provider;
 range.label.dy = 30;
 range.label.truncate = true;
 range.label.fontWeight = "bold";
 range.label.tooltipText = tempArray[0].provider;

 range.label.adapter.add("maxWidth", function(maxWidth, target){
   var range = target.dataItem;
   var startPosition = categoryAxis.categoryToPosition(range.category, 0);
   var endPosition = categoryAxis.categoryToPosition(range.endCategory, 1);
   var startX = categoryAxis.positionToCoordinate(startPosition);
   var endX = categoryAxis.positionToCoordinate(endPosition);
   return endX - startX;
 })
}

chart.data = chartData;


// last tick
var range = categoryAxis.axisRanges.create();
range.category = chart.data[chart.data.length - 1].category;
range.label.disabled = true;
range.tick.location = 1;
range.grid.location = 1;

}); // end am4core.ready()
</script>


<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("bar_alokasi_sub_kegiatan", am4charts.XYChart);

// some extra padding for range labels
chart.paddingBottom = 50;

chart.cursor = new am4charts.XYCursor();
chart.scrollbarX = new am4core.Scrollbar();

// will use this to store colors of the same items
var colors = {};

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataItems.template.text = "{realName}";
categoryAxis.adapter.add("tooltipText", function(tooltipText, target){
  return categoryAxis.tooltipDataItem.dataContext.realName;
})

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.min = 0;

// single column series for all data
var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.columns.template.width = am4core.percent(80);
columnSeries.tooltipText = "{provider}: {realName}, {valueY}";
columnSeries.dataFields.categoryX = "category";
columnSeries.dataFields.valueY = "value";

// second value axis for quantity
var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis2.renderer.opposite = true;
valueAxis2.syncWithAxis = valueAxis;
valueAxis2.tooltip.disabled = true;

// quantity line series
var lineSeries = chart.series.push(new am4charts.LineSeries());
lineSeries.tooltipText = "{valueY}";
lineSeries.dataFields.categoryX = "category";
lineSeries.dataFields.valueY = "quantity";
lineSeries.yAxis = valueAxis2;
lineSeries.bullets.push(new am4charts.CircleBullet());
lineSeries.stroke = chart.colors.getIndex(13);
lineSeries.fill = lineSeries.stroke;
lineSeries.strokeWidth = 2;
lineSeries.snapTooltip = true;

// when data validated, adjust location of data item based on count
lineSeries.events.on("datavalidated", function(){
 lineSeries.dataItems.each(function(dataItem){
   // if count divides by two, location is 0 (on the grid)
   if(dataItem.dataContext.count / 2 == Math.round(dataItem.dataContext.count / 2)){
   dataItem.setLocation("categoryX", 0);
   }
   // otherwise location is 0.5 (middle)
   else{
    dataItem.setLocation("categoryX", 0.5);
   }
 })
})

// fill adapter, here we save color value to colors object so that each time the item has the same name, the same color is used
columnSeries.columns.template.adapter.add("fill", function(fill, target) {
 var name = target.dataItem.dataContext.realName;
 if (!colors[name]) {
   colors[name] = chart.colors.next();
 }
 target.stroke = colors[name];
 return colors[name];
})


var rangeTemplate = categoryAxis.axisRanges.template;
rangeTemplate.tick.disabled = false;
rangeTemplate.tick.location = 0;
rangeTemplate.tick.strokeOpacity = 0.6;
rangeTemplate.tick.length = 60;
rangeTemplate.grid.strokeOpacity = 0.5;
rangeTemplate.label.tooltip = new am4core.Tooltip();
rangeTemplate.label.tooltip.dy = -10;
rangeTemplate.label.cloneTooltip = false;

///// DATA
var chartData = [];
var lineSeriesData = [];

var data = <?php echo json_encode($bar_rekapan_sub_kegiatan); ?>

// process data ant prepare it for the chart
for (var providerName in data) {
 var providerData = data[providerName];

 // add data of one provider to temp array
 var tempArray = [];
 var count = 0;
 // add items
 for (var itemName in providerData) {
   if(itemName != "quantity"){
   count++;
   // we generate unique category for each column (providerName + "_" + itemName) and store realName
   tempArray.push({ category: providerName + "_" + itemName, realName: itemName, value: providerData[itemName], provider: providerName})
   }
 }
 // sort temp array
 tempArray.sort(function(a, b) {
   if (a.value > b.value) {
   return 1;
   }
   else if (a.value < b.value) {
   return -1
   }
   else {
   return 0;
   }
 })

 // add quantity and count to middle data item (line series uses it)
 var lineSeriesDataIndex = Math.floor(count / 2);
 tempArray[lineSeriesDataIndex].quantity = providerData.quantity;
 tempArray[lineSeriesDataIndex].count = count;
 // push to the final data
 am4core.array.each(tempArray, function(item) {
   chartData.push(item);
 })

 // create range (the additional label at the bottom)
 var range = categoryAxis.axisRanges.create();
 range.category = tempArray[0].category;
 range.endCategory = tempArray[tempArray.length - 1].category;
 range.label.text = tempArray[0].provider;
 range.label.dy = 30;
 range.label.truncate = true;
 range.label.fontWeight = "bold";
 range.label.tooltipText = tempArray[0].provider;

 range.label.adapter.add("maxWidth", function(maxWidth, target){
   var range = target.dataItem;
   var startPosition = categoryAxis.categoryToPosition(range.category, 0);
   var endPosition = categoryAxis.categoryToPosition(range.endCategory, 1);
   var startX = categoryAxis.positionToCoordinate(startPosition);
   var endX = categoryAxis.positionToCoordinate(endPosition);
   return endX - startX;
 })
}

chart.data = chartData;

chart.colors.list = [
  am4core.color("#1188FF"),
  am4core.color("#FF6215")
];
// last tick
var range = categoryAxis.axisRanges.create();
range.category = chart.data[chart.data.length - 1].category;
range.label.disabled = true;
range.tick.location = 1;
range.grid.location = 1;

}); // end am4core.ready()
</script>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("bar_realisasi_satker", am4charts.XYChart);

// Add data
chart.data = <?php echo json_encode($satker_bar); ?>;

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.labels.template.rotation = 270;
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
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;
series.columns.template.events.on("hit", function(ev) {
 //detail_grafik(ev.target.dataItem.dataContext.country);
 window.location.assign("<?php echo base_url('grafik/grafik_covid'); ?>/"+ev.target.dataItem.dataContext.country);
 ///console.log("clicked on ", ev.target.dataItem.dataContext.country);
}, this);

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
</script>
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("bar_jenis_kontrak", am4charts.XYChart);

// some extra padding for range labels
chart.paddingBottom = 50;

chart.cursor = new am4charts.XYCursor();
chart.scrollbarX = new am4core.Scrollbar();

// will use this to store colors of the same items
var colors = {};

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataItems.template.text = "{realName}";
categoryAxis.adapter.add("tooltipText", function(tooltipText, target){
  return categoryAxis.tooltipDataItem.dataContext.realName;
})

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.min = 0;

// single column series for all data
var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.columns.template.width = am4core.percent(80);
columnSeries.tooltipText = "{provider}: {realName}, {valueY}";
columnSeries.dataFields.categoryX = "category";
columnSeries.dataFields.valueY = "value";

// second value axis for quantity
var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis2.renderer.opposite = true;
valueAxis2.syncWithAxis = valueAxis;
valueAxis2.tooltip.disabled = true;

// quantity line series
var lineSeries = chart.series.push(new am4charts.LineSeries());
lineSeries.tooltipText = "{valueY}";
lineSeries.dataFields.categoryX = "category";
lineSeries.dataFields.valueY = "quantity";
lineSeries.yAxis = valueAxis2;
lineSeries.bullets.push(new am4charts.CircleBullet());
lineSeries.stroke = chart.colors.getIndex(13);
lineSeries.fill = lineSeries.stroke;
lineSeries.strokeWidth = 2;
lineSeries.snapTooltip = true;

// when data validated, adjust location of data item based on count
lineSeries.events.on("datavalidated", function(){
 lineSeries.dataItems.each(function(dataItem){
   // if count divides by two, location is 0 (on the grid)
   if(dataItem.dataContext.count / 2 == Math.round(dataItem.dataContext.count / 2)){
   dataItem.setLocation("categoryX", 0);
   }
   // otherwise location is 0.5 (middle)
   else{
    dataItem.setLocation("categoryX", 0.5);
   }
 })
})

// fill adapter, here we save color value to colors object so that each time the item has the same name, the same color is used
columnSeries.columns.template.adapter.add("fill", function(fill, target) {
 var name = target.dataItem.dataContext.realName;
 if (!colors[name]) {
   colors[name] = chart.colors.next();
 }
 target.stroke = colors[name];
 return colors[name];
})


var rangeTemplate = categoryAxis.axisRanges.template;
rangeTemplate.tick.disabled = false;
rangeTemplate.tick.location = 0;
rangeTemplate.tick.strokeOpacity = 0.6;
rangeTemplate.tick.length = 60;
rangeTemplate.grid.strokeOpacity = 0.5;
rangeTemplate.label.tooltip = new am4core.Tooltip();
rangeTemplate.label.tooltip.dy = -10;
rangeTemplate.label.cloneTooltip = false;

///// DATA
var chartData = [];
var lineSeriesData = [];

var data =
{
 "Realisasi Kontrak": {
   "Realisasi Kontrak": <?php echo (!empty($ar_kontrak['realisasi_kontrak'])) ? $ar_kontrak['realisasi_kontrak'] : 0; ?>,
   "SP2D Kontraktual": <?php echo (!empty($ar_kontrak['realisasi_sp2d'])) ? $ar_kontrak['realisasi_sp2d'] : 0; ?>
 }
}

// process data ant prepare it for the chart
for (var providerName in data) {
 var providerData = data[providerName];

 // add data of one provider to temp array
 var tempArray = [];
 var count = 0;
 // add items
 for (var itemName in providerData) {
   if(itemName != "quantity"){
   count++;
   // we generate unique category for each column (providerName + "_" + itemName) and store realName
   tempArray.push({ category: providerName + "_" + itemName, realName: itemName, value: providerData[itemName], provider: providerName})
   }
 }
 // sort temp array
 tempArray.sort(function(a, b) {
   if (a.value > b.value) {
   return 1;
   }
   else if (a.value < b.value) {
   return -1
   }
   else {
   return 0;
   }
 })

 // add quantity and count to middle data item (line series uses it)
 var lineSeriesDataIndex = Math.floor(count / 2);
 tempArray[lineSeriesDataIndex].quantity = providerData.quantity;
 tempArray[lineSeriesDataIndex].count = count;
 // push to the final data
 am4core.array.each(tempArray, function(item) {
   chartData.push(item);
 })

 // create range (the additional label at the bottom)
 var range = categoryAxis.axisRanges.create();
 range.category = tempArray[0].category;
 range.endCategory = tempArray[tempArray.length - 1].category;
 range.label.text = tempArray[0].provider;
 range.label.dy = 30;
 range.label.truncate = true;
 range.label.fontWeight = "bold";
 range.label.tooltipText = tempArray[0].provider;

 range.label.adapter.add("maxWidth", function(maxWidth, target){
   var range = target.dataItem;
   var startPosition = categoryAxis.categoryToPosition(range.category, 0);
   var endPosition = categoryAxis.categoryToPosition(range.endCategory, 1);
   var startX = categoryAxis.positionToCoordinate(startPosition);
   var endX = categoryAxis.positionToCoordinate(endPosition);
   return endX - startX;
 })
}

chart.data = chartData;


// last tick
var range = categoryAxis.axisRanges.create();
range.category = chart.data[chart.data.length - 1].category;
range.label.disabled = true;
range.tick.location = 1;
range.grid.location = 1;

}); // end am4core.ready()
</script>

<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>