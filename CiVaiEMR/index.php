<?php
error_reporting(0);
require_once 'core/harviacode.php';
require_once 'core/helper.php';
require_once 'core/process.php';
?>
<!doctype html>
<html>

<head>
    <title>Harviacode Codeigniter CRUD Generator</title>
    <link rel="stylesheet" href="core/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/> -->
    <style>
        .info-block {
            margin-top: 10px;
        }

        .info-block .square-box {
            width: 100px;
            min-height: 110px;
            margin-right: 22px;
            text-align: center !important;
            background-color: #676767;
            padding: 20px 0
        }

        .info-block.block-info .square-box {
            background-color: #20819e;
            color: #FFF
        }
    </style>
</head>

<body>
    <div class="row">
        <?php
        if (empty($_GET['table'])) { ?>
            <div class="col-md-12">

                <div class="col-lg-12">
                    <h4>Table List</h4>
                    <input type="search" class="form-control" id="input-search" placeholder="Search Table...">
                </div>
                <div class="searchable-container">
                    <?php
                    $table_list = $hc->table_list();
                    foreach ($table_list as $table) { ?>
                        <div class="items col-xs-12 col-sm-3 col-md-3 col-lg-3 clearfix">
                            <div class="info-block block-info clearfix">
                                <a href="index.php?table=<?php echo $table['table_name'] ?>" class="btn btn-block btn-warning"><?php echo $table['table_name'] ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-md-12">
                <form action="index.php" method="POST">

                    <!-- <div class="form-group">
                        <label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                        <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                            <option value="">Please Select</option>
                            <?php
                            $table_list = $hc->table_list();
                            $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                            foreach ($table_list as $table) {
                            ?>
                                <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                <?php
                            }
                                ?>
                        </select>
                    </div> -->

                    <input type="hidden" id="table_name" name="table_name" class="form-control" value="<?php echo $_GET['table']; ?>" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="tombol" name="tombol" value="<?php echo ucfirst($_GET['table']); ?>" class="form-control" placeholder="Nama Tombol" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sel1">Modul:</label>
                                    <select class="form-control" name="modul" id="sel1">
                                        <option value="emr">EMR</option>
                                        <option value="admission">ADMISSION</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="jenis_tabel" value="reguler_table" value="reguler_table">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Controller Name</label>
                                <input type="text" id="controller" name="controller" value="<?php echo ucfirst($_GET['table']); ?>" class="form-control" placeholder="Controller Name" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Model Name</label>
                                <input type="text" id="model" name="model" value="<?php echo ucfirst($_GET['table']) . '_model' ?>" class="form-control" placeholder="Controller Name" readonly />
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Field Name</th>
                                <th>NULL</th>
                                <th>Data Type</th>
                                <th>Input Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $colums = $hc->not_primary_field($_GET['table']);
                            $no = 1;
                            foreach ($colums as $column) {
                            ?>
                                <tr>
                                    <td><b><?php echo $column['column_name'] ?></b></td>
                                    <td><?php echo $column['column_key'] ?></td>
                                    <td><?php echo $column['data_type'] ?></td>
                                    <td>
                                        <input type="hidden" name="kolom[<?php echo $column['ordinal_position'] ?>][xx]" value="<?php echo $column['ordinal_position'] ?>" />
                                        <div class="form-group">
                                            <select name="gen[<?php echo $column['ordinal_position'] ?>][test]" class="form-control" id="ddlPassport<?php echo $no ?>">

                                                <option value="text">Text</option>
                                                <option value="number">Number</option>
                                                <option value="area">Text Area</option>
                                                <option value="select">Select Option</option>
                                                <option value="select2">Select With Search</option>
                                                <option value="radio">Radio Button</option>
                                                <option value="date">Date</option>
                                                <option value="datenow">Date Now</option>
                                                <option value="datetime">Date Time</option>
                                                <option value="datetimenow">Date Time Now</option>
                                                <option value="iduser">Id User</option>
                                                <option value="idxdaftar">idxdaftar</option>
                                                <option value="nomr">nomr</option>
                                            </select>
                                            <div id="vaicode<?php echo $no ?>" style="display: none">
                                                <select name="tabel[<?php echo $column['ordinal_position'] ?>][satu]" class="form-control">
                                                    <option value="">pilih tabel relasi</option>
                                                    <?php
                                                    $table_list = $hc->table_list();
                                                    foreach ($table_list as $table) { ?>
                                                        <option value="<?php echo $table['table_name'] ?>"><?php echo $table['table_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <input type="text" name="tabel[<?php echo $column['ordinal_position'] ?>][satu]" class="form-control" multiple /> -->
                                                <input type="text" name="tabel_ket[<?php echo $column['ordinal_position'] ?>][dua]" class="form-control" placeholder="field yang ditampilkan" multiple />
                                                <input type="text" name="tabel_id[<?php echo $column['ordinal_position'] ?>][tiga]" class="form-control" placeholder="field relasi (pk)" multiple />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                    <input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                    <!-- <input type="submit" value="Generate All" name="generateall" class="btn btn-danger" onclick="javascript: return confirm('WARNING !! This will generate code for ALL TABLE and overwrite the existing files\
                    \nPlease double check before continue. Continue ?')" /> -->
                    <!-- <a href="core/setting.php" class="btn btn-default">Setting</a> -->
                </form>
                <br>

                <?php
                foreach ($hasil as $h) {
                    echo '<p>' . $h . '</p>';
                }
                ?>
            </div>
        <?php } ?>
    </div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
    <script>
        $(function() {
            $('#input-search').on('keyup', function() {
                var rex = new RegExp($(this).val(), 'i');
                $('.searchable-container .items').hide();
                $('.searchable-container .items').filter(function() {
                    return rex.test($(this).text());
                }).show();
            });
        });
        <?php
        $colums = $hc->not_primary_field($_GET['table']);
        $no = 1;
        foreach ($colums as $column) {
        ?>
            $(function() {
                $("#ddlPassport<?php echo $no ?>").change(function() {
                    if ($(this).val() == "select" ||
                        $(this).val() == "select2" ||
                        $(this).val() == "radio") {
                        $("#vaicode<?php echo $no ?>").show();
                    } else {
                        $("#vaicode<?php echo $no ?>").hide();
                    }
                });
            });
        <?php $no++;
        } ?>
    </script>
</body>

</html>