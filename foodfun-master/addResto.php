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
    
    if(isset($_POST["daftar"])){
        $nama = $_POST['namaResto'];
        $telp = $_POST['telpResto'];
        $alamat = $_POST['alamatResto'];
        $deskripsi = $_POST['deskripsiResto'];
        
        // ambil foto id terakhir + 1
        $queryget = "SELECT * from foto";
        $res = mysqli_query($conn , $queryget);
        $fotoID = 1;
        while($row = mysqli_fetch_assoc($res)){
            $fotoID = 1 + $row["id_foto"];
        }

        $queryinsert = "INSERT into restoran values('', '$idLogin', '$nama', '$deskripsi', '$telp', '$alamat', '0', '0', $fotoID, '1')";
        $res = mysqli_query($conn , $queryinsert);

        if($res){
            $queryget = "SELECT * from restoran";
            $res3 = mysqli_query($conn , $queryget);
            $idResto = 0;
            while($row = mysqli_fetch_assoc($res3)){
                $idResto = $row["id_restoran"];
            }

            if(isset($_FILES['photo'])){
                $target_dir = "./assets/images/resto/"; // tempat file akan disimpan
                $target_file = $target_dir.$_FILES["photo"]["name"]; 
                // value dari $target_dir + nama file yang diupload, hasil nya akan disimpan ke dalam $target_file.
                // $_FILES mengambil nama dari file yang di submit
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file); 
                // gambar di simpan di temp, baru dipindah ke $target_dir
    
                $nama = "assets/images/resto/" . $_FILES["photo"]["name"];
                $queryinsert2 = "INSERT into foto values('', '$nama', '', '$idResto', '1')";
                $res2 = mysqli_query($conn , $queryinsert2);

                if($res2) echo "<script>alert('Berhasil menambahkan restoran!')</script>";
            }
        }
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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <style>
        .formpendaftaran{
            color: orange;
            width: 700px;
            align-items: center;
            font-family: 'Abril Fatface', cursive;;
            font-size: 20px;
        }

        @media only screen and (max-width: 700px) {
        .formpendaftaran {
            width: 100%;
        }
}
    </style>
</head>
<body>
    <!-- Header Area Starts -->
	<header class="header-area header-area2">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="home.php"><img src="assets/images/logo/logo2.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu main-menu2">
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="findRestoran.php">Cari Restoran</a></li>
                            <?php if($_SESSION["role"] == "user") { ?>
                                <li><a href="myRestoran.php">Restoran Saya</a></li>
                            <?php } ?>
                            <?php if($_SESSION["role"] == "admin") { ?>
                                <li><a href="laporan.php">Laporan</a></li>
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

    <!-- Banner Area Starts -->
    <section class="banner-area text-center" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-left: 20%;">
                    <!-- <h6>the most interesting food in Surabaya</h6>
                    <h1>Discover the <span class="prime-color">flavors</span><br>  
                    <span class="style-change">of <span class="prime-color">food</span>fun</span></h1> -->
                    <div class="formpendaftaran" style="text-align: left;">
                        <form method="POST" enctype='multipart/form-data'>
                        <div class="form-group">
                              <label for="namalbl">Nama Restoran : </label>
                              <input type="text" name="namaResto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat : </label>
                                <textarea class="form-control" name="alamatResto" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="nolbl">Telepon Restoran : </label>
                              <input input type = "number" name="telpResto" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label>Deskripsi : </label>
                                <textarea class="form-control" name="deskripsiResto" rows="4"></textarea>
                            </div><br/>

                            Foto Restoran : 
                            <input type='file' name='photo' style="transform:translateX(20%)" required> <br/>
                            <small id="uploadgambarHint"> <center>
                                Make sure the image and the format (.jpg / .png) is correct! 
                            </center></small>
                            <br/> <br/>
                            
                            <button type="submit" name="daftar" class="btn btn-warning">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

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
</body>
</html>