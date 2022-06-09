<?php require_once 'include/dash_header.php'?>
<?php
require_once 'include/dbconnect.php';
    $query = "SELECT * FROM users WHERE uid=".$_SESSION['uid'];
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success']); ?></div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error']); ?></div>
                        <?php endif?>
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Student Profile</h3>
                            </div>
                            <hr>
                            <form action="include/form.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Student Name</label>
                                    <input name="name" type="text" class="form-control" value="<?php echo $data['name']?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Student Contact</label>
                                    <input name="phone" type="number" class="form-control cc-name valid" value="<?php echo $data['contact']?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Student Address</label>
                                    <input name="address" type="text" class="form-control cc-name valid" value="<?php echo $data['address']?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Student DOB</label>
                                    <input name="dob" type="date" class="form-control cc-name valid" value="<?php echo $data['dob']?>">
                                </div>
                                <input type="hidden" name="uid" value="<?php echo $data['uid']?>">
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="update_student">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <?php if (isset($_SESSION['pass_success'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['pass_success'];unset($_SESSION['pass_success']); ?></div>
                        <?php elseif (isset($_SESSION['pass_err'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['pass_err'];unset($_SESSION['pass_err']); ?></div>
                        <?php endif?>
                        <div class="card-header">Password</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Password</h3>
                            </div>
                            <hr>
                            <form action="include/form.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Old password</label>
                                    <input name="old_pass" type="password" class="form-control">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">New Password</label>
                                    <input name="new_pass" type="password" class="form-control cc-name valid">
                                </div>
                                <input type="hidden" name="uid" value="<?php echo $data['uid']?>">
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="update_password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/dash_footer.php'?>
