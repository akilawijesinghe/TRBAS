<?php

// check the session user role
$role = $this->session->userdata('user_role');
if ($role == 'admin') {
    $dashboard_url = 'index.php/admin_dashboard';
} else {
    $dashboard_url = 'index.php/customer_dashboard';
}

$uri = $this->uri->segment(1);
?>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
                <img src="../assets/img/kaiadmin/logo_light_new.png" alt="navbar brand" class="navbar-brand" height="20">
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item <?php if($uri == 'admin') echo 'active';?>">
                    <a href="<?php echo base_url() . $dashboard_url; ?>" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if($uri == 'billboard') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/billboard" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Billboards</p>
                    </a>
                </li>
                <li class="nav-item <?php if($uri == 'location') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/location" class="nav-link">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Locations</p>
                    </a>
                </li>
                <!-- Bookings -->
                <li class="nav-item <?php if($uri == 'booking') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/booking" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Bookings</p>
                    </a>
                </li>
                <!-- Customer -->
                <li class="nav-item <?php if($uri == 'customer') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/customer" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <!-- Price Packages -->
                <li class="nav-item <?php if($uri == 'price_package') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/price_package" class="nav-link">
                        <i class="fas fa-dollar-sign"></i>
                        <p>Price Packages</p>
                    </a>
                </li>
                <!-- Users -->
                <li class="nav-item <?php if($uri == 'user') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/user" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>