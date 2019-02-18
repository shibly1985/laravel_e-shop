
<div class = "content-wrapper">
    <!--Content Header (Page header) -->
    <section class = "content-header">
        <h1>
            General Search
        </h1>
        <ol class = "breadcrumb">
            <li><a href = "#"><i class = "fa fa-dashboard"></i> Home</a></li>

            <li class = "active">Search Results</li>
        </ol>
    </section>
    <!--Main content -->
    <section class = "content">
        <div class = "row">
            <!--<form id = "form1" name = "form1" method = "post" action = "search_result.php"> -->
            <!--left column -->
            <div class = "col-md-12">
                <!--general form elements -->
                <div class = "box box-primary">
                    <div class = "box-header with-border">
                        <h3 class = "box-title">Search Result</h3>
                    </div>
                    <div class = "box-body">

                        <?php
                        require_once("config/db_config.php");


                        $country_name = $_POST['country'];
                        if ($country_name == 'ALL') {
                            $country = "'BGD', 'BTN','IND','MDV','NPL','PAK','LKA'";
                        } else {
                            $country = "'$country_name'";
                        }

                        $category_name = $_POST['users'];
                        $skill_test = $_POST['ckbox'];
                        $aircraft = $_POST['ckboxs'];


                        foreach ($skill_test as $val) {
                            $data_type = $report->data_type($category_name, $val);
                            if ($data_type == 'varchar')
                                $var_val[] = $val;
                            else
                                $int_val[] = $val;
                        }

                        if ($category_name == 'tbl_airworthiness') {
                            //$colmn_name= "Aircraft Type";
                            foreach ($aircraft as $val) {
                                $rows_aircraft[] = "assets_AircraftType like '%$val%'";
                            }
                        } elseif ($category_name == 'tbl_flightoperation') {
                            //$colmn_name= "Type Ratings";
                            foreach ($aircraft as $val) {
                                $rows_aircraft[] = "assets_TypeRatings like '%$val%'";
                            }
                        } else if ($category_name == 'tbl_cabinsafety') {
                            //$colmn_name= "Turbo Props Types | Narrow Turbo Jets | Wide Turbo Jets";
                            foreach ($aircraft as $val) {
                                $rows_aircraft[] = "(assets_TurboPropsTypes like '%$val%' OR assets_NarrowTurboJets LIKE '%$val%' OR assets_WideTurboJets LIKE '%$val%')";
                            }
                        }
                        $val = intval(5);
                        $var = 'yes';
                        //$no_var = '$val';
                        $condtion = [];

                        foreach ($var_val as $row) {
                            $condtion[] = " `$row` = '$var' ";
                        }

                        $condtionInt = [];
                        foreach ($int_val as $rowVal) {
                            $condtionInt[] = " `$rowVal` >= '5' ";
                        }

                        if (!empty($condtion)) {
                            $condtion = implode(' AND ', $condtion);
                            if (!empty($condtionInt)) {
                                $condtionInt = implode(' AND ', $condtionInt);
                                $b = ' AND ';
                                $a = $b . $condtionInt;
                            } else
                                $a = '';

                            if (!empty($rows_aircraft)) {
                                $rows_aircraft = implode(' OR ', $rows_aircraft);
                                $sql = "Select * from $category_name where $condtion  $a AND ($rows_aircraft) AND country IN ($country) ORDER BY country ASC";
                            } else {
                                $sql = "Select * from $category_name where $condtion  $a AND country IN ($country) ORDER BY country ASC";
                            }
                            //echo $sql;
                            $res = array();
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $res[] = $row;
                            }
                            if (empty($res))
                             echo "Data Not found";   
                            else 
                            {
                            $res_country = array();
                            $country = "Select country from $category_name where $condtion AND country IN ($country) GROUP BY country";
                            $result_country = mysqli_query($con, $country);
                            while ($rows = mysqli_fetch_array($result_country)) {
                                $res_country[] = $rows;
                            }
                            //print_r($res);
                            foreach ($res_country as $val) {
                                echo "<table id='example2' class='table table-bordered table-hover'>";

                                echo "<tr align='center'>";
                                echo "<td colspan = '3' class='btn-info'> COUNTRY NAME = " . $val['country'] . "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>Serial</td>";
                                echo "<td>Name</td>";
                                echo "<td>Details</td>";
                                echo "</tr>";

                                $sl = 1;
                                foreach ($res as $res_val) {
                                    if ($val['country'] == $res_val['country']) {
                                        echo "<tr>";
                                        echo "<td>" . $sl++ . "</td>";
                                        echo "<td>" . $res_val['name'] . "</td>";
                                        echo "<td><a href='index.php?route=individualUserDetails&id=" . $res_val['id'] . "&tbl=$category_name'>View Details</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                echo "</table>";
                                echo "<br/>";
                            } // table end
                            
                            
                        }
                        } // if $condtion end
                        ?>                       
                    </div>
                </div>
            </div>
    </section>
</div>

