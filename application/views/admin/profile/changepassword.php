<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>User Profile</h1>
            <small>Change Password</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="javascript:;">
                                <i class="fa fa-list"></i> Change Password</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-9" method="post" action="">
                            <?= msg(); ?>
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password"  class="form-control" name="old_password" id="old_password" value="<?php if($form_data){ echo $form_data['old_password'];}?>" placeholder="Enter Old password" maxlength="25" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password"  class="form-control" name="new_password" id="new_password" value="<?php if($form_data){ echo $form_data['new_password'];}?>" placeholder="Enter New Password"  maxlength="25" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="con_password" id="con_password"  class="form-control" value="<?php if($form_data){ echo $form_data['con_password'];}?>" placeholder="Enter Confirm Password"  maxlength="25" required>
                            </div>


                            <div class="reset-button">

                                <button class="btn btn-success w-md m-b-5" type="submit">Change Password</button>
                                <button class="btn btn-warning w-md m-b-5" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>