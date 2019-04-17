<section class="services" id="services_section">
    <!-- HEADING FOR SECTIOM -->
    <h2 class="heading"><span>Services</span> we offer</h2>
    <!-- /END OF HEADING -->

    <!-- START OF LIST -->
    <div class="services__list">
        <!-- START OF EACH BLOCK IN LIST ELEMENT -->

        <?php
        $service_list = Services::limited_services();
        foreach ($service_list as $service_item) {
            echo '
                <div class="services__list__block">
                    <img src="images/service/' . $service_item->image .'" alt="carpenter" class="icon">
                    <h2 class="services__list__block__heading"><a href="detail_service.php?service=' . $service_item->service_name .'">' . $service_item->service_name .'</a></h2>
                    <span class="services__list__block__text" style="">'.substr($service_item->text , 0 , 140).'</span>
                </div>
                ';
        }
        ?>


        <!-- /END OF BLOCKS -->
    </div>
    <!-- /END OF LIST -->

    <!-- START OF VIEW ALL SERVICES -->
    <span class="view__all"><a href="services.php">View all &rarr;</a></span>
    <!-- /END OF VIEW ALL SERVICES -->
</section>