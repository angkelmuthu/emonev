<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        CONTOH HELPER TAMBAHAN
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
                            <!-- <tr>
                                <td width="150">Autocomplate</td>
                                <td><input type="text" id="name_user" name="product" class="form-control ui-autocomplete-input" placeholder="Masukan Nama user ..."></td>
                            </tr> -->
                            <tr>
                                <td>Number</td>
                                <td><input class="form-control" id="example-number" type="number" name="number" value="839473"></td>
                            </tr>
                            <tr>
                                <td>Text</td>
                                <td><input type="text" id="simpleinput" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Text Area</td>
                                <td><textarea class="form-control" id="example-textarea" rows="2"></textarea></td>
                            </tr>
                            <tr>
                                <td>Select Option</td>
                                <td><?php echo cmb_dinamis('test', 'tbl_user', 'full_name', 'id_users') ?></td>
                            </tr>
                            <tr>
                                <td>Select with search</td>
                                <td><?php echo select2_dinamis('test', 'tbl_user', 'full_name', 'Masukan keyword ...') ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Datalist</td>
                                <td><?php echo datalist_dinamis('test', 'tbl_user', 'full_name') ?></td>
                            </tr> -->
                            <tr>
                                <td>Radio Button</td>
                                <td><?php echo radiobtn_dinamis('test', 'tbl_user', 'full_name', 'id_users')  ?></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><input class="form-control" id="example-date" type="date" name="date" value="2023-07-23"></td>
                            </tr>
                            <tr>
                                <td>Date Time</td>
                                <td><input class="form-control" type="datetime-local" value="2023-07-23T11:25:00" id="example-datetime-local-input"></td>
                            </tr>
                        </table>

                    </div>

                </div>
            </div>
        </div>
</main>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>