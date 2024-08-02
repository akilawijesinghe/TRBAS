<?php

// check the session user role
$role = $this->session->userdata('user_role');
if ($role == 'admin') {
    $dashboard_url = 'index.php/admin';
} else {
    $dashboard_url = 'index.php/customer';
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
                        <i class="fas fa-file"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if($uri == 'billboard') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>index.php/billboard" class="nav-link">
                        <i class="fas fa-file"></i>
                        <p>Billboards</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>