<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getskillset.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Search       
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <!--<form id="form1" name="form1" method="post" action="search_result.php">-->
            <form id="form1" name="form1" method="post" action="index.php?route=search_result">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Skillsets</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">

                            <div class="checkbox">
                                <label>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'sacbm_db');
                                    if (!$con) {
                                        die('Could not connect: ' . mysqli_error($con));
                                    }
                                    echo $sql = "SELECT `assets_AircraftType` FROM `tbl_airworthiness` group by `assets_AircraftType`";
                                    echo "<br/>";

                                    $result = mysqli_query($con, $sql);
                                    $data=array();
                                    while($row = mysqli_fetch_array($result)) {
                                        $data[] = $row;
                                    }
                                    print_r($data);
                                    ?>
                                    <div id="txtHint">

                                    </div>
                                </label>

                            </div>
                        </div>
                        <!-- /.box-body -->



                    </div>

                    <!-- /.box -->

                    <!-- Form Element sizes -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Horizontal Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <select name="country" id="country" class="form-control">
                                        <option value="ALL">ALL</option>
                                        <?php
                                        $countryName = $report->getCountryName();
                                        foreach ($countryName as $val):
                                            ?>
                                            <option value="<?php echo $val['countryShortCode']; ?>"><?php echo $val['countryName']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <br/><br/>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-10">                    
                                    <select name="users" id="category" class="form-control" onchange="showUser(this.value)">
                                        <option value="">SELECT A Category</option>
                                        <option value="tbl_aerodrome">Aerodrome</option>
                                        <option value="tbl_airworthiness">Airworthiness</option>
                                        <option value="tbl_ans">ANS</option>
                                        <option value="tbl_cabinsafety">Cabin Safety</option>
                                        <option value="tbl_flightoperation">Flight Operation</option>
                                        <option value="tbl_pel">PEL</option>
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                            <!-- /.box-body -->
                            <div class="box-footer">               
                                <button type="submit" class="btn btn-info pull-right">Search</button>
                            </div>
                            <!-- /.box-footer -->

                        </div>
                        <!-- /.box -->
                        <!-- general form elements disabled -->

                    </div>
                    <!--/.col (right) -->
            </form>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
