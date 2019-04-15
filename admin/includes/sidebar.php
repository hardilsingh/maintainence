
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
                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                    <li>
                        <a href="create_admin.php">Create Admin</a>
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
                        <a href="request.php?type=pending_requests">New requests</a>
                    </li>
                    <li>
                        <a href="request.php?type=in_process">In process</a>
                    </li>
                    <li>
                        <a href="request.php?type=completed">Completed requests</a>
                    </li>
                    <li>
                        <a href="request.php?type=cancelled">Cancelled Requests</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="service_add.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Add service</a>
            </li>

        </ul>
    </div>
</div>
</nav> 