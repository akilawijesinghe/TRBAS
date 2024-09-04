<?php

// check the session user role
$role = $this->session->userdata('user_role');
if ($role == 'admin') {
    $dashboard_url = 'admin_dashboard';
} else {
    $dashboard_url = 'customer_dashboard';
}

$uri = $this->uri->segment(1);
$sub_uri = $this->uri->segment(2);
?>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <img src="<?php echo base_url(); ?>assets/img/kaiadmin/logo_light_new.png" alt="navbar brand" class="navbar-brand" height="20">
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
                <li class="nav-item <?php if ($uri == 'cutomer') echo 'active'; ?>">
                    <a href="<?php echo base_url() . $dashboard_url; ?>" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Bookings -->
                <li class="nav-item <?php if ($uri == 'booking') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>booking" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <p>My Bookings</p>
                    </a>
                </li>
                <!-- Advertisements -->
                <li class="nav-item <?php if ($uri == 'advertisement') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>advertisement" class="nav-link">
                        <i class="fab fa-adversal"></i>
                        <p>My Ads</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($uri == 'report') echo 'active'; ?>">
                    <a data-bs-toggle="collapse" href="#reports">
                        <i class="fas fa-chart-line"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if ($uri == 'report') echo 'show'; ?>" id="reports">
                        <ul class="nav nav-collapse">
                            <li class="<?php if ($sub_uri == 'customer_ad_exposure_report') echo 'active'; ?>">
                                <a href="<?php echo base_url();?>report/customer_ad_exposure_report">
                                    <span class="sub-item">Ad Exposure</span>
                                </a>
                            </li>
                            <li class="<?php if ($sub_uri == 'customer_ad_scheduling_report') echo 'active'; ?>">
                                <a href="<?php echo base_url();?>report/customer_ad_scheduling_report">
                                    <span class="sub-item">Ad Scheduling</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>