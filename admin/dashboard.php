<?php include("includes/header.php") ?>



<?php
if (!$session->is_signed_in()) {
    redirect("index");
}
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/top_navigation.php") ?>
        <!-- /.navbar-top-links -->

        <?php include("includes/sidebar.php") ?>



        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Requests</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Pending Requests</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Services Provided</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12 mx-auto">

                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart', 'bar']
                            });
                            google.charts.setOnLoadCallback(drawStuff);

                            function drawStuff() {

                                var button = document.getElementById('change-chart');
                                var chartDiv = document.getElementById('chart_div');

                                var data = google.visualization.arrayToDataTable([
                                    ['Galaxy', 'Distance', 'Brightness'],
                                    ['Users', 8000 , 4.5],
                                    ['Requests', 24000 , 4.5],
                                    ['Pending Requests', 30000, 14.3],
                                    ['Total Services provided', 30000, 14.3]

                                ]);

                                var materialOptions = {
                                    width: 900,
                                    chart: {
                                        title: 'Nearby galaxies',
                                        subtitle: 'distance on the left, brightness on the right'
                                    },
                                    series: {
                                        0: {
                                            axis: 'distance'
                                        }, // Bind series 0 to an axis named 'distance'.
                                        1: {
                                            axis: 'brightness'
                                        } // Bind series 1 to an axis named 'brightness'.
                                    },
                                    axes: {
                                        y: {
                                            distance: {
                                                label: 'parsecs'
                                            }, // Left y-axis.
                                            brightness: {
                                                side: 'right',
                                                label: 'apparent magnitude'
                                            } // Right y-axis.
                                        }
                                    }
                                };

                                var classicOptions = {
                                    width: 900,
                                    series: {
                                        0: {
                                            targetAxisIndex: 0
                                        },
                                        1: {
                                            targetAxisIndex: 1
                                        }
                                    },
                                    title: 'Nearby galaxies - distance on the left, brightness on the right',
                                    vAxes: {
                                        // Adds titles to each axis.
                                        0: {
                                            title: 'parsecs'
                                        },
                                        1: {
                                            title: 'apparent magnitude'
                                        }
                                    }
                                };

                                function drawMaterialChart() {
                                    var materialChart = new google.charts.Bar(chartDiv);
                                    materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                                    button.innerText = 'Change to Classic';
                                    button.onclick = drawClassicChart;
                                }

                                function drawClassicChart() {
                                    var classicChart = new google.visualization.ColumnChart(chartDiv);
                                    classicChart.draw(data, classicOptions);
                                    button.innerText = 'Change to Material';
                                    button.onclick = drawMaterialChart;
                                }

                                drawMaterialChart();
                            };
                        </script>
                        </head>

                        <body>
                            <br><br>
                            <div id="chart_div" style="width: 800px; height: 500px;"></div>
                    </div>
                </div>





            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ("includes/footer.php")?>

</body>

</html> 