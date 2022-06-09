<?php 
    require_once '../include/dbconnect.php';
    if(isset($_GET['id'])){
        $query = "SELECT * FROM users WHERE uid=".$_GET['id'];
        $result = mysqli_query($conn,$query);

        $data = mysqli_fetch_assoc($result);
    }
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
    <title>Forget Password</title>

    <!-- Fontfaces CSS-->
    <link href="../assets/back/css/font-face.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../assets/back/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../assets/back/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/back/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/back/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                               <h2>Reset Password</h2> 
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="include/admin_form.php" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"  readonly placeholder="Email" value="<?php echo $data['email']?>">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="**********">
                                </div>
                                <input type="submit" class="au-btn au-btn--block au-btn--green m-b-20" value="Reset" name="reset">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../assets/back/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/back/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/back/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/back/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/back/vendor/wow/wow.min.js"></script>
    <script src="../assets/back/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/back/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/back/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/back/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/back/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/back/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/back/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/back/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../assets/back/js/main.js"></script>

</body>

</html>
<!-- end document-->