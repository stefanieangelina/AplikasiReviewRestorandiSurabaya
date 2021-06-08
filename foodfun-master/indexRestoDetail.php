<?php 
    include('conn.php');
    session_start();

    if (!isset($_SESSION['restoId'] )) {
        die('NOT FOUND');
    }
    $restoId = $_SESSION["restoId"];


    $querySelect = "SELECT * FROM restoran WHERE status=1 AND id_restoran=$restoId";
    $restaurants = mysqli_query($conn, $querySelect)->fetch_all(MYSQLI_ASSOC);
    $restaurant = [];
    if (!empty($restaurants)) {
        $restaurant = $restaurants[0];
    } else {
        die('NOT FOUND');
    }

    if(isset($_POST["btnPostComment"])){
        echo "<script>alert('Silahkan login terlebih dahulu untuk meninggalkan komentar!');</script>";
    }

    $querySelect = "SELECT restoran.*, foto.nama as photo_url
    FROM restoran LEFT JOIN foto on foto.id_foto = restoran.foto_id
    WHERE restoran.status=1 AND restoran.id_restoran=$restoId";
    $restaurants = mysqli_query($conn, $querySelect)->fetch_all(MYSQLI_ASSOC);
    $restaurant = [];
    if (!empty($restaurants)) {
        $restaurant = $restaurants[0];
    } else {
        die('NOT FOUND');
    }


    $querySelect = "
        SELECT k.ulasan, u.nama, k.rating
        FROM komentar k 
        JOIN users u ON u.id_user= k.id_user
        WHERE k.id_restoran=$restoId
    ";
    $comments = mysqli_query($conn, $querySelect)->fetch_all(MYSQLI_ASSOC);
    

    // [
    //     $i 0 ['ulasana'=>'alskdjalksjd', 'nama'=> 'akaskd'],
    //     $i 1 ['ulasana'=>'alskdjalksjd', 'nama'=> 'akaskd'],
    //     $i 2 ['ulasana'=>'alskdjalksjd', 'nama'=> 'akaskd'],
    // ]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Foodfun</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Preloader Starts -->
    <!-- <div class="preloader">
        <div class="spinner"></div>
    </div> -->
    <!-- Preloader End -->

    <!-- Header Area Starts -->
	<header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="#"><img src="assets/images/logo/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="login.php">Login</a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

 <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img" style="text-align:center;">
                                <img class="img-fluid" src="<?=$restaurant['photo_url']?>"  style='height:100vh;' alt="">
                            </div>									
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <!-- <div class="post_tag">
                                    <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a>
                                    <a href="#">Lifestyle</a>
                                </div> -->
                                <ul class="blog_meta list">
                                        <!-- <li><a href="#">Nama<i class="fa fa-user-o"></i></a></li> -->
                                        <!-- <li><a href="#">12 Dec, 2017<i class="fa fa-calendar-o"></i></a></li> -->
                                        <!-- <li><a href="#">1.2M Views<i class="fa fa-eye"></i></a></li> -->
                                        <li><a href="#"><?php echo count( $comments)?> Comments<i class="fa fa-comment-o"></i></a></li>
                                        <li><a href="#"><?php echo $restaurant['rating']?> Rating<i class="fa fa-star"></i></a></li>
                                    </ul>
                                <!-- <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h5><?php echo $restaurant['nama']; ?></h5>
                            <p class="excert">
                                <?php echo $restaurant['deskripsi'];?>
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- <div class="col-6">
                                    <img class="img-fluid" src="assets/images/blog-details/post-img1.jpg" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="assets/images/blog-details/post-img2.jpg" alt="">
                                </div>	 -->
                                <div class="col-lg-12 my-4">
                                </div>									
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4><?= count($comments) ?> Comments</h4>
                        <?php
                        if (empty($comments)) {
                            echo 'No Comments';
                        } else {?>
                            <?php  for ($i=0; $i < count($comments); $i++) { ?>                            
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="assets/images/blog-details/c1.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#"><?php echo $comments[$i]['nama']; ?>  </a></h5>
                                                <p class="date">Rating: <?= $comments[$i]['rating']?> </p>
                                                <p class="comment">
                                                    <?= $comments[$i]['ulasan'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>	                                            				
                            <?php } ?>
                        <?php } ?> 
                        
                    </div>
                    <!-- <form action="submitUlasan.php" method="post">
                        <input type="hidden" name="id_restoran" value="${isiResto[index]['id_restoran']}">
                        <textarea placeholder="Isi Ulasan" name="ulasan" cols="30" rows="10"></textarea>
                        <button type="submit">Submit Ulasan</button>
                    </form> -->
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form method="post">
                            <input type="hidden" name="id_restoran" value="<?= $_SESSION['restoId'] ?>">
                            <!-- <div class="form-group form-inline"> -->
                                <!-- <div class="form-group col-lg-6 col-md-6 name"> -->
                                <!-- <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'"> -->
                                <!-- </div> -->
                                <!-- <div class="form-group col-lg-6 col-md-6 email"> -->
                                <!-- <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"> -->
                                <!-- </div>										 -->
                            <!-- </div> -->
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                            </div> -->
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="ulasan" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"></textarea>
                            </div>
                            <button type="submit" name="btnPostComment" class="template-btn">Post Comment</button>	
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section> 
    <!--================Blog Area =================-->

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <a href="index.html"><img src="assets/images/logo/logo2.png" alt=""></a>
                            <p class="mt-3">Which morning fourth great won't is to fly bearing man. Called unto shall seed, deep, herb set seed land divide after over first creeping. First creature set upon stars deep male gathered said she'd an image spirit our</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="single-widget single-widget3">
                            
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-widget single-widget2 my-5 my-md-0">
                            <h5 class="mb-4">Hubungi Kami</h5>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-text">
                                    <p>Jl. Ngagel Jaya Tengah, Surabaya, Jawa Timur, Indonesia </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-text">
                                    <p>(031) 52403940</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="info-text">
                                    <p>support@foodfun.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">food fun</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
        </div>
    </footer>
    <!-- Footer Area End -->

    
    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>