<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TNI Design Admin Panel </title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/ico/favicon.png" type="image/x-icon">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <style>.alert>p{display: inline-block;}</style>
    </head>
    <body>
        <div class="login-wrapper">
            <div class="container-center">
                <div class="login-area">
                    <div class="panel panel-bd panel-custom">
                        <div class="panel-heading">
                            <div class="view-header">
                                <div class="header-icon">
                                    <i class="pe-7s-refresh-2"></i>
                                </div>
                                <div class="header-title">
                                    <h3>Password Reset</h3>
                                    <small><strong>Please fill the form to recover your password</strong></small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                             <?= msg(); ?>
                            <form method="post" action="<?php echo base_url(); ?>admin/forgotpassword">
                                <div class="form-group">
                                    <label class="control-label" for="username">Email</label>
                                    <input type="email" placeholder="example@gmail.com" title="Please enter you email adress" required="" value="" name="email" id="username" class="form-control">
                                    <span class="help-block small">Your registered email address</span>
                                </div>
                                <div>
                                    <button class="btn btn-add " type="submit">Reset password</button>
                                    <a class="btn btn-warning" href="<?php echo base_url(); ?>admin/login">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>