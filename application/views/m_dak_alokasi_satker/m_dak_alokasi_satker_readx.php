<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        DANA ALOKASI KEGIATAN <span class="fw-300"><i>(<?php echo $satker; ?>)</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table">
                            <tr>
                                <td>Sub Bidang</td>
                                <td><b><?php echo $nama_dak_sub_bidang; ?></b></td>
                                <td>Dak Kelompok</td>
                                <td><b><?php echo $dak_kelompok; ?></b></td>
                            </tr>
                            <tr>
                                <td>Tahun Anggaran</td>
                                <td><b><?php echo $tahun; ?></b></td>
                                <td>Nilai Alokasi</td>
                                <td><b>Rp. <?php echo angka($nilai_alokasi); ?></b></td>
                            </tr>
                        </table>
                        <!-- <div class="panel-tag">
                            <p>
                                The RowGroup extension for DataTables provides an easy to use row grouping feature for DataTables (the clue is in the name!). It can be configured via the <code>rowGroup</code> parameter and you will almost always wish to use the <code>rowGroup.dataSrc</code> option to tell the software what data point in the table's source data to use to get the grouping information.
                            </p>
                        </div> -->
                        <!-- datatable start -->
                        <table id="example" class="table table-sm table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-500">
                                <tr>
                                    <th>KOMPONEN</th>
                                    <th>KOMPONEN</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($komponen as $dt) { ?>
                                    <tr>
                                        <td><?php echo $dt->nama_dak_komponen ?></td>
                                        <td><?php echo '- ' . $dt->nama_dak_komponen_sub ?></td>
                                        <td class="text-center"><a href="<?php echo base_url() . 't_dak_menu_kegiatan/list/' . $dt->id_dak_komponen_sub . '/' . $id_dak_alokasi . '/' . $this->uri->segment(4) ?>" class="btn btn-xs btn-success"><i class="fal fa-eye"></i> Kegiatan</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                        <!-- datatable end -->
                        <!-- <table class="table table-bordered table-striped m-0">
                            <thead class="thead-themed">
                                <tr>
                                    <th class="border-top-0">Kegiatan</th>
                                    <th>
                                        Lokasi
                                    </th>
                                    <th>
                                        Volume
                                    </th>
                                    <th>
                                        Satuan
                                    </th>
                                    <th>
                                        Harga Satuan
                                        <small class="d-block fs-sm text-muted">
                                            (Rupiah)
                                        </small>
                                    </th>
                                    <th>
                                        Total
                                        <small class="d-block fs-sm text-muted">
                                            (Rupiah)
                                        </small>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->from('m_dak_komponen');
                                $this->db->where('id_dak_sub_bidang', $this->uri->segment(4));
                                $komponen = $this->db->get()->result();
                                foreach ($komponen as $dtkomponen) { ?>
                                    <tr>
                                        <th style="text-transform: uppercase;" colspan="5"><?php echo $dtkomponen->nama_dak_komponen ?></th>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $this->db->from('m_dak_komponen_sub');
                                    $this->db->where('id_dak_komponen', $dtkomponen->id_dak_komponen);
                                    $komponensub = $this->db->get()->result();
                                    foreach ($komponensub as $dtkomponensub) { ?>
                                        <tr>
                                            <th colspan="5">- <?php echo $dtkomponensub->nama_dak_komponen_sub ?></th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        $this->db->from('t_dak_menu_kegiatan');
                                        $this->db->where('id_dak_komponen_sub', $dtkomponensub->id_dak_komponen_sub);
                                        $this->db->where('id_dak_alokasi', $this->uri->segment(3));
                                        $kegiatan = $this->db->get()->result();
                                        //if ($kegiatan->num_rows > 0) {
                                        foreach ($kegiatan as $dtkegiatan) {
                                        ?>
                                            <tr>
                                                <td colspan="5">
                                                    <li><?php echo $dtkegiatan->nama_menu_kegiatan ?></li>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $this->db->from('v_rincian');
                                            $this->db->where('id_dak_komponen_sub', $dtkegiatan->id_dak_komponen_sub);
                                            $this->db->where('id_dak_alokasi', $dtkegiatan->id_dak_alokasi);
                                            $this->db->where('id_menu_kegiatan', $dtkegiatan->id_menu_kegiatan);
                                            $query2 = $this->db->get();
                                            //if ($query2->num_rows > 0) {
                                            foreach ($query2->result() as $dt) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $dt->nama_dak_rincian ?></td>
                                                    <td width="10%">
                                                        <span class="badge badge-primary">Installasi: <?php echo $dt->nama_rs_instalasi ?></span>
                                                        <span class="badge badge-success">Ruangan: <?php echo $dt->nama_rs_ruangan ?></span>
                                                        <span class="badge badge-warning">Sarana: <?php echo $dt->nama_rs_sarana ?></span>
                                                    </td>
                                                    <td class="text-center"><?php echo $dt->volume ?></td>
                                                    <td class="text-center"><?php echo $dt->satuan ?></td>
                                                    <td class="text-right">Rp. <?php echo angka($dt->harga_satuan) ?></td>
                                                    <th class="text-right">Rp. <?php echo angka($dt->total) ?></th>
                                                    <td></td>
                                                </tr>
                                <?php
                                            }
                                        }
                                    }
                                }
                                //}
                                //echo $this->db->last_query();
                                ?>
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<!-- <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script> -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: false,
            autoWidth: true,
            responsive: true,
            columnDefs: [{
                "visible": false,
                "targets": 0
            }],
            order: [
                [0, 'asc']
            ],
            rowGroup: {
                dataSrc: 0
            }
        });
    });

    // $(document).ready(function() {
    //     var table = $('#example').DataTable({
    //         paging: false,
    //         autoWidth: true,
    //         responsive: true,
    //         "columnDefs": [{
    //             "visible": false,
    //             "targets": 0
    //         }],
    //         "order": [
    //             [0, 'DESC']
    //         ],
    //         "drawCallback": function(settings) {
    //             var api = this.api();
    //             var rows = api.rows({
    //                 page: 'all'
    //             }).nodes();
    //             var last = null;

    //             // Remove the formatting to get integer data for summation
    //             var intVal = function(i) {
    //                 return typeof i === 'string' ?
    //                     i.replace(/[\$,]/g, '') * 1 :
    //                     typeof i === 'number' ?
    //                     i : 0;
    //             };

    //             total = [];
    //             //total[] = $.fn.dataTable.render.number(',', '.', 0, '$').display(total);
    //             api.column(1, {
    //                 page: 'all'
    //             }).data().each(function(group, i) {
    //                 group_assoc = group.replace(' ', "_");
    //                 console.log(group_assoc);
    //                 if (typeof total[group_assoc] != 'undefined') {
    //                     total[group_assoc] = total[group_assoc] + intVal(api.column(6).data()[i]);
    //                 } else {
    //                     total[group_assoc] = intVal(api.column(6).data()[i]);
    //                 }
    //                 if (last !== group) {

    //                     $(rows).eq(i).before(
    //                         '<tr class="group"><td colspan="5" style="text-transform: uppercase;"><b>' + group + '</b></td><td class="text-right ' + group_assoc + '"></td><td class="text-center"></td></tr>'
    //                     );

    //                     last = group;
    //                 }
    //             });
    //             for (var key in total) {
    //                 //key = $.fn.dataTable.render.number(',', '.', 0, '$').display(total);
    //                 $("." + key).html("<b>" + $.fn.dataTable.render.number('.', '.', 0, 'Rp.').display(total[key]) + "</b>");
    //             }
    //         }
    //     });


    // });
</script>