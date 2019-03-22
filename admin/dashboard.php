<?php include("includes/header.php") ?>



<?php
 //start the session to see if the user is logged in already if not the redirect to index to see the page
if (!$session->is_signed_in()) {
    redirect("index");
}
?>
<!-- body -->

<body>
    <!-- wrapper -->
    <div id="wrapper">

        <!-- top navigation -->
        <?php include("includes/top_navigation.php") ?>
        <!-- /.top navigation -->

        <!-- sidebar -->
        <?php include("includes/sidebar.php") ?>
        <!-- /.sidebar -->


        <!-- page wrapper -->
        <div id="page-wrapper">
            <!-- conatiner fluid -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <!-- col-lg-12 -->
                    <div class="col-lg-12">
                        <!-- page header -->
                        <h1 class="page-header">Dashboard
                        </h1>
                        <!-- /.page header -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <!-- row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            echo Requests::completedRequestsTotal();
                                            ?>
                                        </div>
                                        <div>Completed Requests</div>
                                    </div>
                                </div>
                            </div>
                            <a href="request.php?type=completed">
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
                                        <div class="huge">
                                            <?php
                                            echo Requests::newRequestsTotal();
                                            ?>
                                        </div>
                                        <div>Pending Requests</div>
                                    </div>
                                </div>
                            </div>
                            <a href="request.php?type=pending_requests">
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
                                        <div class="huge">
                                            <?php

                                            echo Users::num();

                                            ?>
                                        </div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php?user_type=customer">
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
                                        <div class="huge">
                                            <?php
                                            echo Users::numProviders();
                                            ?>
                                        </div>
                                        <div>Services Providers</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php?user_type=provider">
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



                <!-- ******************************CHART***************************************************************************** -->
                <div class="row">
                    <div class="col-lg-12 mx-auto">

                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['bar']
                            });
                            google.charts.setOnLoadCallback(drawStuff);

                            function drawStuff() {
                                var data = new google.visualization.arrayToDataTable([
                                    ['Move', 'Total'],
                                    ["Completed requests", <?php echo Requests::completedRequestsTotal()?>],
                                    ["Pending Requests", <?php echo Requests::newRequestsTotal()?>],
                                    ["Users", <?php echo Users::num()?>],
                                    ["Service Providers", <?php echo Users::numProviders()?>]
                                ]);

                                var options = {
                                    width: 800,
                                    legend: {
                                        position: 'none'
                                    },
                                    chart: {
                                        title: '',
                                        subtitle: ''
                                    },
                                    axes: {
                                        x: {
                                            0: {
                                                side: 'top',
                                                label: ''
                                            } // Top x-axis.
                                        }
                                    },
                                    bar: {
                                        groupWidth: "50%"
                                    }
                                };

                                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                                // Convert the Classic options to Material options.
                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            };
                        </script>
                        </head>

                        <body>
                            <div id="top_x_div" style="width: 800px; height: 600px;"></div>
                    </div>
                </div>





            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include("includes/footer.php") ?>

</body>

</html> 