<?php session_start()?>
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
    <title>IIBIT Dashboard</title>

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
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                   <h3>Admin Dashboard</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="teacher.php">
                            <i class="fas fa-user"></i>Teachers</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="class.php">
                            <i class="fas fa-user"></i>Class Details</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="events.php">
                            <i class="fas fa-list"></i>Events</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="course.php">
                            <i class="fas fa-book"></i>Course</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="students.php">
                                <i class="fas fa-user"></i>Students</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="join.php">
                                <i class="fas fa-user"></i>Course Joined</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="javascript:void(0)"> Hello Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="javascript:void(0)">Admin</a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['admin_email'];?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
