<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA MENU KEGIATAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_dak_menu_kegiatan/create/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) . '/' . $this->uri->segment(5), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Judul Kegiatan', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                        </div><br>
                        <table class="table table-bordered table-striped m-0">
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
                                $this->db->select('id_dak_komponen_sub,id_dak_alokasi,id_menu_kegiatan,id_kegiatan,nama_menu_kegiatan,SUM(total) AS gtotal');
                                $this->db->from('v_rincian');
                                $this->db->where('id_dak_komponen_sub', $this->uri->segment(3));
                                $this->db->where('id_dak_alokasi', $this->uri->segment(4));
                                $this->db->group_by('id_menu_kegiatan');
                                $query = $this->db->get()->result();
                                //if ($query->num_rows > 0) {
                                foreach ($query as $row) {
                                    ?>
                                    <tr>
                                        <th style="text-transform: uppercase;" colspan="5"><?php echo $row->nama_menu_kegiatan ?></th>
                                        <th class="text-right">
                                            <h5><b>Rp. <?php echo angka($row->gtotal) ?></b></h5>
                                        </th>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-xs btn-info waves-effect waves-themed" data-toggle="modal" data-target="#modal-<?php echo $row->id_menu_kegiatan ?>"><i class="fal fa-plus-square" aria-hidden="true"></i> Input Sub Menu</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-<?php echo $row->id_menu_kegiatan ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Input Sub Kegiatan
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url() ?>t_dak_menu_kegiatan/create_subkegiatan" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="form-label">Sub Kegiatan</label>
                                                            <input type="text" name="nama_kegiatan" class="form-control" placeholder="Sub Kegiatan">
                                                        </div>
                                                        <input type="hidden" name="id_dak_komponen_sub" value="<?php echo $this->uri->segment(3); ?>" />
                                                        <input type="hidden" name="id_dak_alokasi" value="<?php echo $this->uri->segment(4); ?>" />
                                                        <input type="hidden" name="id_dak_sub_bidang" value="<?php echo $this->uri->segment(5); ?>" />
                                                        <input type="hidden" name="id_menu_kegiatan" value="<?php echo $row->id_menu_kegiatan ?>">
                                                        <input type="hidden" name="id_kegiatan" value="" />
                                                        <input type="hidden" name="created_by" value="<?php echo $this->session->userdata('nama') ?>" readonly />
                                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                                        <input type="hidden" name="updated_by" id="updated_by" value="<?php echo $this->session->userdata('nama') ?>" />
                                                        <input type="hidden" name="updated_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                                        <input type="hidden" name="isdeleted" value="0" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-themed">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $this->db->select('id_kegiatan,nama_kegiatan');
                                        $this->db->from('v_rincian');
                                        $this->db->where('id_menu_kegiatan', $row->id_menu_kegiatan);
                                        //$this->db->where('id_dak_alokasi', $row->id_dak_alokasi);
                                        //$where = "id_kegiatan IS NOT NULL";
                                        //$this->db->where($where);
                                        $this->db->group_by('id_menu_kegiatan');
                                        $query = $this->db->get()->result();
                                        //if ($query->num_rows > 0) {
                                        //echo $this->db->last_query();
                                        foreach ($query as $row2) {
                                            if (!empty($row2->id_kegiatan)) {
                                                ?>
                                            <tr>
                                                <th colspan="6"><i class="fal fa-angle-right"></i> <?php echo $row2->nama_kegiatan ?></th>
                                                <!-- <th class="text-right">
                                                <h5><b>Rp. <?php echo angka($row2->gtotal) ?></b></h5>
                                            </th> -->
                                                <td class="text-center">
                                                    <a href="<?php echo base_url() . 't_dak_rincian/create/' . $row->id_dak_komponen_sub . '/' . $row->id_dak_alokasi . '/' . $row2->id_kegiatan . '/' . $this->uri->segment(5) ?>" class="btn btn-xs btn-success"><i class="fal fa-plus"></i> Input Rincian Kegiatan</a>
                                                </td>
                                            </tr>
                                            <?php
                                                        $this->db->from('v_rincian');
                                                        $this->db->where('id_kegiatan', $row2->id_kegiatan);
                                                        //$this->db->where('id_rincian', $row2->id_kegiatan);
                                                        $query2 = $this->db->get();
                                                        //echo $this->db->last_query();
                                                        //if ($query2->num_rows() > 0) {
                                                        foreach ($query2->result() as $dt) {
                                                            if (!empty($dt->id_rincian)) {
                                                                ?>
                                                    <tr>
                                                        <td>
                                                            <li style="margin-left: 15px;">
                                                                <?php if (!empty($dt->id_dak_rincian)) {
                                                                                        echo $dt->nama_dak_rincian;
                                                                                    } else {
                                                                                        echo $dt->nama_alkes;
                                                                                    } ?>
                                                            </li>
                                                        </td>
                                                        <?php if (!empty($dt->nama_rs_instalasi)) { ?>
                                                            <td width="10%">
                                                                <span class="badge badge-primary">Installasi: <?php echo $dt->nama_rs_instalasi ?></span>
                                                                <span class="badge badge-success">Ruangan: <?php echo $dt->nama_rs_ruangan ?></span>
                                                                <span class="badge badge-warning">Sarana: <?php echo $dt->nama_rs_sarana ?></span>

                                                            </td>
                                                            <td class="text-center"><?php echo $dt->volume ?></td>
                                                            <td class="text-center"><?php echo $dt->satuan ?></td>
                                                            <td class="text-right">Rp. <?php echo angka($dt->harga_satuan) ?></td>
                                                            <th class="text-right">
                                                                <h5>Rp. <?php echo angka($dt->total) ?></h5>
                                                            </th>
                                                            <td class="text-center">
                                                                <!-- <a href="<?php echo base_url() . 't_dak_menu_kegiatan/create/' . $dt->id_dak_komponen_sub . '/' . $dt->id_dak_alokasi . '/' . $dt->id_menu_kegiatan ?>" class="btn btn-warning"><i class="fal fa-pencil"></i></a>
                                                    <a href="<?php echo base_url() . 't_dak_menu_kegiatan/create/' . $dt->id_dak_komponen_sub . '/' . $dt->id_dak_alokasi . '/' . $dt->id_menu_kegiatan ?>" class="btn btn-danger"><i class="fal fa-trash"></i></a> -->
                                                            </td>
                                                        <?php } else { ?>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        <?php } ?>
                                                    </tr>
                                <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                //}
                                //echo $this->db->last_query();
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center"><br>
                            <?php echo anchor(site_url('m_dak_alokasi_satker/read/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)), '<i class="fal fa-plus-back" aria-hidden="true"></i> Kembali', 'class="btn btn-danger btn-sm waves-effect waves-themed"'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 0
            }],
            "order": [
                [0, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'all'
                }).nodes();
                var last = null;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                total = [];
                api.column(0, {
                    page: 'all'
                }).data().each(function(group, i) {
                    group_assoc = group.replace(' ', "_");
                    console.log(group_assoc);
                    if (typeof total[group_assoc] != 'undefined') {
                        total[group_assoc] = total[group_assoc] + intVal(api.column(8).data()[i]);
                    } else {
                        total[group_assoc] = intVal(api.column(8).data()[i]);
                    }
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="7">' + group + '</td><td class="' + group_assoc + '"></td><td></td></tr>'
                        );

                        last = group;
                    }
                });
                for (var key in total) {
                    $("." + key).html("$" + total[key]);
                }
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
    //             "targets": [0, 1]
    //         }],
    //         "order": [
    //             [0, 'DESC']
    //         ],
    //         rowGroup: {
    //             dataSrc: [0, 1]
    //         },
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
    //             api.column(0, {
    //                 page: 'all'
    //             }).data().each(function(group, i) {
    //                 group_assoc = group.replace(' ', "_");
    //                 console.log(group_assoc);
    //                 if (typeof total[group_assoc] != 'undefined') {
    //                     total[group_assoc] = total[group_assoc] + intVal(api.column(8).data()[i]);
    //                 } else {
    //                     total[group_assoc] = intVal(api.column(8).data()[i]);
    //                 }
    //                 if (last !== group) {

    //                     $(rows).eq(i).before(
    //                         '<tr class="group"><td colspan="4" style="text-transform: uppercase;"><b>' + group + '</b></td><td class="text-right ' + group_assoc + '"></td><td class="text-center"></td></tr>'
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