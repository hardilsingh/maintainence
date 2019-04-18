<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<body>
    <!-- custom styles -->
    <style>
        .card {
            position: relative;
            left: 50%;
            transform: translateX(-50%) scale(1);
            padding: 0;
            border-radius: 0;
            text-align: center;
            margin: 0;
            transition: all .2s;
            z-index: 1000;
        }


        

        .card:hover {
            outline-color: forestgreen;
            outline-width: 2px;
            outline-style: solid;
            box-shadow: 0 15px 20px gray;
            transform: translateX(-50%) scale(1.1);
            z-index: 1000000;
        }


        .col-lg-4 {
            padding: 20px 0;
        }

        .card-title {
            color: green;
            font-size: 28px;
        }

        .card-img-top {
            height: 100px;
            padding: 20px 0;
        }

        .card-text {
            color: dimgray;
            padding: 15px 25px;
        }

        .btn {
            border-radius: 0;
        }

        .card-body {
            padding: 0;
        }

        .banner {
            background: linear-gradient(110deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .8) 50%, rgba(0, 128, 0, .8) 50%), url("images/hero-6.jpg");
            height: 300px;
            background-size: cover;
            width: 100%;
            background-position: center;
        }

        .heading {
            position: relative;
            top: 50%;
            transform: translateY(-100%);
            font-weight: bolder;
            color: whitesmoke;
            font-family: lato, sans-serif;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 20px 30px;
        }
    </style>
    <!-- /.custom styles -->

    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->


        <!-- heading row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12 banner" role="columnheader">
                <h1 class="display-4 text-center heading" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fab fa-servicestack" style="color:green; margin-right: 1.5rem"></i>Services<span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->

        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:35px; color:slategray">Services we offer.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:25px; margin-bottom: 50px; color:green">We
                    specialize in all the services listed below.</h2>
            </div>
        </div>

        <!-- main content -->
        <div class="col-sm-12 col-md-11 col-lg-11 mx-auto" role="columnheader">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                    <?php
                    $service_list = Services::find_all();
                    foreach ($service_list as $service_item) {
                        echo '
                        
                        <div class="col-lg-4 col-md-6 col-sm-8 load_more " style="display:none;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/service/' . $service_item->image . '" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">' . $service_item->service_name . '</h5>
                        <p class="card-text">' . substr($service_item->text, 0, 140) . '</p>
                        <a href="detail_service.php?service=' . $service_item->service_name . '&id=' . $service_item->service_id . '" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                    </div>
                </div>
            </div>
                        ';
                    }
                    ?>
                </div>
                <div class="row" style="padding:30px 20px">
                    <a href="#" class='btn btn-primary btn-lg text-center' style="position:relative; left:50% ; transform:translateX(-50%)" id="loadMore">Load More</a>
                </div>
            </div>
            <script>
                $(function() {
                    $(".load_more").slice(0, 6).show();
                    $("#loadMore").on('click', function(e) {
                        e.preventDefault();
                        $(".load_more:hidden").slice(0, 4).slideDown();
                        if ($(".load_more:hidden").length == 0) {
                            $("#load").fadeOut('slow');
                        }
                        $('html,body').animate({
                            scrollTop: $(this).offset().top
                        }, 1500);
                    });
                });

                $('a[href=#top]').click(function() {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 600);
                    return false;
                });

                $(window).scroll(function() {
                    if ($(this).scrollTop() > 50) {
                        $('.totop a').fadeIn();
                    } else {
                        $('.totop a').fadeOut();
                    }
                });
            </script>
        </div>
        <!-- /.main content -->

        <div class="container-fluid">
            <!-- footer row -->
            <div class="row" role="row">
                <!-- col-lg-12 -->
                <div class="col-lg-12" role="columnheader">
                    <!-- footer -->
                    <?php include("includes/footer.php") ?>
                    <!-- /.footer-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.footer row -->
        </div>
    </div>
</body>
<!-- /.body -->

</html>