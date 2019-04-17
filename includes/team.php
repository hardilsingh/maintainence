<section class="team" style="overflow:hidden">
    <h1 class="heading"><span>Our dedicated service </span>Team</h1>
    <div class="team__members">
        <?php
        $service_team = Team::limited_names();
        foreach ($service_team as $team_member) {
            $service = Services::requestName($team_member->service_given);

            echo '
                <div class="team__members__data ">
                <img src="images/service_members/' . $team_member->image . '" alt="" class="team__members__image">
                <span class="team__members__name" style="text-align:center;  text-transform:capitalize"> ' . ($team_member->first_name) . ' </span>
                <span class="team__members__name" style="text-align:center; font-size:1.1rem;  text-transform:capitalize; transform:translateY(-.5rem)"> ' . ($team_member->last_name) . ' </span>

                <span class="team__members__designation" style="text-align:center; text-transform:capitalize"> ' . $service->service_name . ' </span>
                </div>
                ';
        }
        ?>
    </div>
    <!-- START OF VIEW ALL SERVICES -->
    <span class="view__all" style="position: relative;
            left:85%;
            font-size: 1.8rem;"><a href="team.php" style="color: #43A047; text-decoration: none;">View all  &rarr;</a></span>
    <!-- /END OF VIEW ALL SERVICES -->

    <div class="team__certification">
        <figure class="icons__holder"><img src="images/bookmark.svg" alt="" class="icon"><span class="certify">Gurrented</span></figure>
        <figure class="icons__holder"><img src="images/cog.svg" alt="" class="icon"><span class="certify">Service</span></figure>
        <figure class="icons__holder"><img src="images/verified_user.svg" alt="" class="icon"><span class="certify">Verified</span></figure>
        <figure class="icons__holder"><img src="images/copy.svg" alt="" class="icon"><span class="certify">Insured</span></figure>
    </div>

</section>