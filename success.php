<?php header("refresh:10; url=index.php")  ?>

<?php include("includes/main-rest.php") ?>

<body>

    <div class="container-fluid">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-3 text-center" style="margin-bottom:3rem; margin-top: 2rem"> Success<span style="color: green">!</span></h1>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <i class="fas fa-check-circle" style="font-size:150px; color:green; margin-bottom:30px"></i>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <span style="font-size:20px; padding:20px 10px; color:red; ">Your request No :

                    <?php

                        $last_id = Requests::selectMaxId();

                        foreach($last_id as $refrence_id) {
                            echo $refrence_id->refrence_id;
                        }
                    
                    ?>

                </span><br>
                Please keep it with you for future refrence.


            </div>
        </div>


        <div class="container">
            <div class="row"style="margin-top:30px">
                <div class="col-lg-12 text-center mx-auto">


                    <span style="font-size:18px">Your request has been submitted successfully.<br>
                        Our service executive will get in touch with you shortly.
                    </span><br>

                    <span>If you have any complaints or suggestions you can ring up our customer care for the same.</span>

                </div>

            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">

                <!-- START OF FOOTER -->
                <?php include("includes/footer.php") ?>
                <!-- /END OF FOOTER -->

            </div>
        </div>


    </div>











</body>

</html> 