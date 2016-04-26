

<?php
if (!empty($data_array)) {
    foreach ($data_array as $key => $val) {
        //$class_detail = Classes::model()->findByPk($key);
        ?>   
        <script type="text/javascript">
            $(function() {
                $(document).ready(function() {
                    // Build the chart
                    $('#container_<?php echo $key; ?>').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Class - <?php echo $val['class_name']; ?>'
                        },
                        lang: {
                            noData: "No Data Found"
                        },
                        noData: {
                            style: {
                                fontWeight: 'bold',
                                fontSize: '15px',
                                color: '#303030'
                            }
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y}</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    distance: -20,
                                    format: '{point.percentage:.1f} %',
                                    inside: true,
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                                    }
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                                name: 'Students',
                                colorByPoint: true,
                                data: <?php echo json_encode($val['data']); ?>
                            }]
                    });
                });
            });
        </script>

        <?php
    }
}
?>


<script src="<?php echo base_url(); ?>/assets/js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/no-data-to-display.js"></script>

<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Students</span>
                                    <span class="info-box-number"><?php echo sizeof($all_students); ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->		
                        </div>
                        <div class="col-xs-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Paid Students</span>
                                    <span class="info-box-number"><?php echo sizeof($p_students); ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->		
                        </div>
                        <div class="col-xs-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Not Paid Students</span>
                                    <span class="info-box-number"><?php echo sizeof($np_students); ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->		
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-xs-4">
                        <a href="<?php echo base_url() . '/school/dashboard/UnpaidNotification'; ?>">
                            <button class="btn btn-block btn-primary">Notify Unpaid Students</button>
                        </a>
                    </div>
                </div>  
                <div class="box-body">
                    <div class="col-xs-12">
                        <select id='month'>
                            <option value=''>Select Month</option>    
                            <?php
                            $months = getParam('months');
                            for ($i = 1; $i <= 12; $i++) {
                                ?>     
                                <option <?php echo ($i == date('m')) ? 'selected' : ''; ?> value="<?php echo $i; ?>">
                                    <?php echo $months[$i]; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>

                        <select id='year'>
                            <option value=''>Select Year</option>    
                            <option value="2015">2015</option>
                            <option value="2016" selected>2016</option>
                            <option value="2017">2017</option>
                        </select>

                    </div> 

                    <div class="col-xs-12">
                        <h5>Graphical Representation of Fee</h5>
                        <?php
                        if (!empty($data_array)) {
                            foreach ($data_array as $key => $val) {
                                ?>    
                                <div class="col-xs-6" id="container_<?php echo $key ?>" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>


<script>
            $(document).ready(function() {
                $("#year,#month").change(function() {
                    var year = $("#year").val();
                    var month = $("#month").val();
                    $.ajax({
                        url: "<?php echo base_url(); ?>/school/dashboard/chart",
                        type: "POST",
                        dataType: 'json',
                        data: {year: year, month: month},
                        success: function(data)
                        {
                            var fee_data = new Array();
                            fee_data = data;
                            // alert(fee_data);
                            // start of ngo campaign redrawing

                            $.each(fee_data, function(index, value) {

                                $('#container_' + index).highcharts().destroy();

                                $(function() {
                                    $('#container_' + index).highcharts({
                                        chart: {
                                            plotBackgroundColor: null,
                                            plotBorderWidth: null,
                                            plotShadow: false,
                                            type: 'pie'
                                        },
                                        lang: {
                                            noData: "No Data Found"
                                        },
                                        noData: {
                                            style: {
                                                fontWeight: 'bold',
                                                fontSize: '15px',
                                                color: '#303030'
                                            }
                                        },
                                        title: {
                                            text: 'Class - ' + value.class_name
                                        },
                                        tooltip: {
                                            pointFormat: '{series.name}: <b>{point.y}</b>'
                                        },
                                        plotOptions: {
                                            pie: {
                                                allowPointSelect: true,
                                                cursor: 'pointer',
                                                dataLabels: {
                                                    enabled: true,
                                                    distance: -20,
                                                    format: '{point.percentage:.1f} %',
                                                    inside: true,
                                                    style: {
                                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                                                    }
                                                },
                                                showInLegend: true
                                            }
                                        },
                                        series: [{
                                                name: 'Students',
                                                colorByPoint: true,
                                                data: value.data
                                            }]
                                    });
                                });


                            });
                            // end of ngo redrawing

                        }
                    });



                })




            });
</script>    
