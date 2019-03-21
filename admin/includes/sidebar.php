<?php


?>


<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="dashboard.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            
            <li>
                <a href="users.php"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="users.php?user_type=admin">Admin</a>
                    </li>
                    <li>
                        <a href="users.php?user_type=customer">Customer</a>
                    </li>
                    <li>
                        <a href="users.php?user_type=provider">Service providers</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="search_requests.php"><i class="fa fa-dashboard fa-fw"></i> Search Requests</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Service requests<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="request.php?type=pending_requests">New requests <span style="color:green; margin-left:90px; font-size:18px">1</span></a>
                    </li>
                    <li>
                        <a href="request.php?type=in_process">In process <span style="color:green; margin-left:110px; font-size:18px">1</span></a>
                    </li>
                    <li>
                        <a href="request.php?type=completed">Completed requests <span style="color:green; margin-left:50px; font-size:18px">1</span></a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="membership.php">Membership</a>
                    </li>
                    <li>
                        <a href="fgpassword.php">Forgot Password</a>
                    </li>
                    <li>
                        <a href="welcome.php">Welcome</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
</div>
</nav> 