<?php
    include "inc/header.php";
?>

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Search Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Search Page</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-8">

                    <?php
                        if ( isset($_POST['search']) ){
                            $search = $_POST['search'];

                            $sql = "SELECT * FROM post WHERE title LIKE '%$search%' OR description LIKE '%$search%' ORDER BY id DESC";

                            $searchPost = mysqli_query($db, $sql);


                            $searchResult = mysqli_num_rows($searchPost);

                            if ( $searchResult == 0 ){ ?>
                                <div class="alert alert-warning">
                                    <strong>Opps!!! Sorry, No Blog Post Found in your Search Keyword. Check Back Later...</strong>
                                </div>
                            <?php } 
                            else{
                                while( $row = mysqli_fetch_assoc($searchPost) ){
                                    $id             = $row['id'];
                                    $title          = $row['title'];
                                    $description    = $row['description'];
                                    $image          = $row['image'];
                                    $category_id    = $row['category_id'];
                                    $author_id      = $row['author_id'];
                                    $status         = $row['status'];
                                    $tags           = $row['tags'];
                                    $post_date      = $row['post_date'];
                                    ?>


                                    <!-- Single Item Blog Post Start -->
                                <div class="blog-post">
                                    <!-- Blog Banner Image -->
                                    <div class="blog-banner">
                                        <a href="single.php?post=<?php echo $id; ?>">
                                            <img src="admin/img/post/<?php echo $image; ?>">
                                            <!-- Post Category Names -->
                                            <div class="blog-category-name">
                                                <?php
                                                    $sql = "SELECT * FROM category where cat_id = '$category_id'";
                                                    $catDetails = mysqli_query($db, $sql);
                                                    while( $row = mysqli_fetch_assoc($catDetails) ){
                                                        $cat_id = $row['cat_id'];
                                                        $cat_name = $row['cat_name'];
                                                        ?>
                                                        <h6><?php echo $cat_name; ?></h6>
                                                <?php    }
                                                ?>
                                                
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Blog Title and Description -->
                                    <div class="blog-description">
                                        <a href="single.php?post=<?php echo $id; ?>">
                                            <h3 class="post-title"><?php echo $title; ?></h3>
                                        </a>
                                        <p><?php echo substr($description, 0, 275); ?></p>
                                        <!-- Blog Info, Date and Author -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="blog-info">
                                                    <ul>
                                                        <li><i class="fa fa-calendar"></i><?php echo $post_date; ?></li>
                                                        <li>
                                                            <i class="fa fa-user"></i>

                                                            <?php
                                                                $sql = "SELECT * FROM users where id = '$author_id'";
                                                                $post_user = mysqli_query($db, $sql);
                                                                while( $row = mysqli_fetch_assoc($post_user) ){
                                                                  $uid         = $row['id'];
                                                                  $fullname   = $row['fullname']; 
                                                                  ?>  
                                                                    
                                                                    by - <?php echo $fullname; ?> 
                                                                    
                                                                <?php  }
                                                              ?>
                                                            
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4 read-more-btn">
                                                <a href="single.php?post=<?php echo $id; ?>" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Item Blog Post End -->



                            <?php    }
                            }

                            
                        }
                    ?>
                    

         
                </div>



                <?php include "inc/sidebar.php"; ?>
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    


    <!-- :::::::::: Footer Section Start :::::::: -->
    <footer>
        <!-- Footer Widget Section Start -->
        <div class="footer-widget background-img section">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget One Start-->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Blue</span> Chip</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum has been the</p>
                        <!-- Social Media -->
                        <div class="widget-title">
                            <h4><span>Social</span> Media</h4>
                        </div>

                        <div class="social-media">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget One End-->

                    <!-- Footer Widget Two Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Useful</span> Links</h4>
                        </div>
                        <div class="useful-links">
                            <ul>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Portfolio</a></li>
                                <li><a href="">Pages</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Two End -->

                    <!-- Footer Widget Three Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Contact</span> With Us</h4>
                        </div>
                        <div class="contact-with-us">
                            <ul>
                                <li>
                                    <a><i class="fa fa-home"></i>7/H, Banani, Dhaka-1213</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-envelope-o"></i>example@yourdomain.com</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-fax"></i>+880 123 456 789</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-phone"></i>+880 123 456 789</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-clock-o"></i>9.00 am - 5.00 pm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Three End -->

                    <!-- Footer Widget Four Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Subscribe</span> Here</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                        <!-- Subscribe From Start -->
                        <form action="" method="">
                            <div class="form-group ">
                                <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="form-input" required="required">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <!-- Subscribe Button -->
                            <div class="">
                                <button type="submit" class="btn-main"><i class="fa fa-paper-plane-o"></i> Subscribe</button>
                            </div>
                        </form>
                        <!-- Subscribe From End -->
                    </div>
                    <!-- Footer Widget Four End -->

                </div>
            </div>
        </div>
        <!-- Footer Widget Section End -->


        <!-- CopyRight Section Start -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <!-- Copyright Left Content -->
                    <div class="col-md-6">
                        <p><a href="">Theme Express</a> © 2018 All rights reserved. Terms of use and Privacy Policy</p>
                    </div>

                    <!-- Copyright Right Footer Menu Start -->
                    <div class="col-md-6">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="">About</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Copyright Right Footer Menu End -->
                </div>
            </div>
        </div>
        <!-- CopyRight Section End -->
    </footer>
    <!-- ::::::::::: Footer Section End ::::::::: -->


    <!-- JQuery Library File -->
    <script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- Isotop JS -->
    <script src="assets/js/isotop.min.js"></script>

    <!-- Fency Box JS -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- Easy Pie Chart JS -->
    <script src="assets/js/jquery.easypiechart.js"></script>

    <!-- JQuery CounterUp JS -->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!-- BlueChip Extarnal Script -->
    <script type="text/javascript" src="assets/js/main.js"></script>

  </body>
</html>