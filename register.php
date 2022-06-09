<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <link href="assets/back/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/back/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/back/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/back/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/back/css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>Volunteer Register</h3>
                        </div>
                        <div class="login-form">
                            <form action="include/form.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ful Name</label>
                                            <input class="au-input au-input--full" type="text" name="name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DOB</label>
                                            <input type="date" class="au-input au-input--full" id="start" name="dob" min="1979-01-01" max="<?php echo date('Y-m-d')?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="au-input au-input--full" type="text" name="address" placeholder="Address" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                            <?php if(isset($_SESSION['emailErr'])):?>
                                                <div class="alert alert-danger"><?php echo $_SESSION['emailErr']; unset($_SESSION['emailErr'])?></div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input class="au-input au-input--full" type="number" name="phone" placeholder="98XXXXXXXX" required>
                                            <?php if(isset($_SESSION['phoneErr'])):?>
                                                <div class="alert alert-danger"><?php echo $_SESSION['phoneErr']; unset($_SESSION['phoneErr'])?></div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                            <?php if(isset($_SESSION['passErr'])):?>
                                                <div class="alert alert-danger"><?php echo $_SESSION['passErr']; unset($_SESSION['passErr'])?></div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="au-input au-input--full" type="password" name="con_password" placeholder="confirm Password">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                                 <input type="submit" name="register" value="Register" class="au-btn au-btn--block au-btn--green m-b-20">
                            </form>
                            <div class="register-link">
                                <p>
                                    Have an account?
                                    <a href="login.php">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/back/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/back/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/back/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/back/vendor/slick/slick.min.js">
    </script>
    <script src="assets/back/vendor/wow/wow.min.js"></script>
    <script src="assets/back/vendor/animsition/animsition.min.js"></script>
    <script src="assets/back/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/back/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/back/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/back/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/back/assets/back/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/back/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/back/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/back/js/main.js"></script>

</body>

</html>
<!-- end document-->