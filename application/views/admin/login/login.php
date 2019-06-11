<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Appin Admin Panel </title>
     
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="login-wrapper">
            <div class="container-center">
                <div class="login-area">
                    <div class="panel panel-bd panel-custom">
                        <div class="panel-heading">
                            <div class="view-header">
                                <div class="header-icon">
                                    <i class="pe-7s-unlock"></i>
                                </div>
                                <div class="header-title">
                                    <h3>Login</h3>
                                    <small><strong>Please enter your credentials to login.</strong></small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?= msg(); ?>
                            <form  id="loginForm" method="post" action="">
                                <div class="form-group">
                                    <label class="control-label" for="username">Email</label>
                                    <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="email" class="form-control">
                                    <span class="help-block small">Your unique username to app</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Password</label>
                                    <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                    <span class="help-block small">Your strong password</span>
                                </div>
                                <div>
                                    <button class="btn btn-add">Login</button>
                                    <a class="btn btn-warning" href="<?php echo base_url(); ?>admin/forgotpassword">Forgot Password</a>
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