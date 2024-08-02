<?php
    ob_start();
    session_start();
    include "admin/inc/db.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blog Website" />
    <meta name="author" content="Golam Rabbani Mithu" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png" />

    <title>BLOG </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>

  <body>
    <!-- :::::::::: Header Section Start :::::::: -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar  navbar-expand-lg navbar-light">
                       
                        <a class="navbar-brand logo-title" href="index.php">PROTHOM ALO</a>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                              
                              <?php
                                $sql = "SELECT * FROM category ORDER BY cat_name ASC";
                                $allMenu = mysqli_query($db, $sql);
                                while( $row = mysqli_fetch_assoc($allMenu) ){
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="category.php?id=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a>
                                    </li>
                              <?php  }
                              ?>
                              

                              <?php
                                if ( !empty($_SESSION['id']) ){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                <?php }
                                else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.php">Login</a>
                                    </li>
                                <?php }
                              ?>
                              

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>        
    </header>
    <!-- ::::::::::: Header Section End ::::::::: -->

    

