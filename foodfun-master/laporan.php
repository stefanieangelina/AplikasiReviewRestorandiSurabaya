<?php
    include('conn.php');
    session_start();

    $idLogin = "";
    $namaLogin = "";

    if(isset($_SESSION['idLogin'])){
        $idLogin = $_SESSION['idLogin'];
        $namaLogin = $_SESSION['namaLogin'];
    } else {
        header("location: index.php");
    }
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
                            <li><a href="home.php">Home</a></li>
                            <li><a href="findRestoran.php">Cari Restoran</a></li>
                            <?php if($_SESSION["role"] == "user") { ?>
                                <li><a href="myRestoran.php">Restoran Saya</a></li>
                            <?php } ?>
                            <?php if($_SESSION["role"] == "admin") { ?>
                                <li class="active"><a href="#">Laporan</a></li>
                            <?php } ?>
                            <li><a href="profile.php">Profil Saya</a></li>
                            <li><a href="index.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="section-top">
                        <h3><span class="style-change">Laporan Restoran</span> Terbaik</h3>
                        <p class="pt-3">
                            Berisikan 10 restoran terbaik yang diurutkan berdasarkan rating restoran.
                            Semakin tinggi rating akan semakin baik restoran.
                        </p>
                        <table class="table table-striped table-bordered">
                            <thead style="text-align:center">
                                <tr>
                                    <th>Nomer</th>
                                    <th>Nama Restoran</th>
                                    <th>Rating</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $querySelect = "SELECT * FROM restoran WHERE status=1 ORDER BY rating DESC";
                                    $res = mysqli_query($conn, $querySelect);
                                    $ctr = 1;

                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if($ctr < 11){
                                            echo "<tr>
                                                <td>".$ctr."</td>
                                                <td>".$row['nama']."</td>
                                                <td>".$row['rating']."</td>
                                                <td>".$row['alamat']."</td>
                                                <td>0".$row['no_tlp']."</td>
                                            </tr>";
                                            $ctr++;
                                        }
                                    }
                                ?>
                            
                            </tbody>
                        <table/>
                    </div>
                </div>
            </div>
        </div>

        <a href="cetak.php">cetak</a>
    </section>

    <!-- <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-top">
                        <h3><span class="style-change">Restoran</span> <br>Bottom 10</h3>
                        <p class="pt-3">They're fill divide i their yielding our after have him fish on there for greater man moveth, moved Won't together isn't for fly divide mids fish firmament on net.</p>
                    </div>
                </div>
            </div>
            <div>
                
            </div>
        </div>
    </section> -->

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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">food fun</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                </div>
            </div>
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