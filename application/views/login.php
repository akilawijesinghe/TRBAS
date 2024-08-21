<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>TRBAS</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.7.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toastr.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css" />
    <script>
        const base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row w-100 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card" id="login_form">
                        <div class="card-header">
                            <div class="card-title text-center">AMS Login</div>
                            <div class="alert alert-danger" role="alert" id="err_cont" style="display: none">
                                <span id="credentials_error"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" name="loginForm" id="loginForm" action="<?php echo base_url() . 'login/auth'; ?>">
                                <div class="form-group">
                                    <label for="email2">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <a href="#" class="" id="register_link">Create Account</a>
                                    <button type="button" class="btn btn-primary" id="login_btn">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card" id="register_form" style="display: none">
                        <div class="card-header">
                            <div class="card-title text-center">AMS Registration</div>
                        </div>
                        <div class="card-body">
                            <form method="post" name="registerForm" id="registerForm" action="<?php echo base_url() . 'login/register'; ?>">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" />
                                </div>
                                <div class="form-group row">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email_reg" id="email_reg" placeholder="Enter Email" />
                                </div>
                                <div class="form-group row">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact" />
                                </div>
                                <div class="form-group row">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" />
                                </div>
                                <div class="form-group  row">
                                    <label for="abn">ABN</label>
                                    <input type="text" class="form-control" name="abn" id="abn" placeholder="Enter ABN" />
                                </div>
                                <div class="form-group row">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="passwordreg" id="passwordreg" placeholder="Password" />
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <a href="#" class="" id="login_link">Login</a>
                                    <button type="button" class="btn btn-primary" id="register_btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="<?php echo base_url(); ?>assets/js/custom/login.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/common.js"></script>

</html>