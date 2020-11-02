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
  <div style="padding: 10px; ">
  <?php 
    //print_r($m_sub_kegiatan);
    foreach ($m_sub_kegiatan as $key => $value) {
      //if($value->id == 5){
        echo '<b>Realisasi Satker Berdasarkan Output : '.$value->nama_sub_kegiatan.'</b>';
      //}
    }
  ?>   
</div>
  <div class="row">
        <div class="col-xl-12">

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

<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>