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

    if(isset($_POST['btnDetail'])){
        $_SESSION['restoId'] = $_POST['idResto'];
        header("location: restoranDetail.php");
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
        .card{
            text-align: left;
        }
        .search-bar{
            width: 100%;
            height: 60px;
            background-color: white;
            display: flex;
            /* justify-content: space-around; */
            flex-direction: row;
        }
        .left{
            width: 50%;
            padding: 10px;
            display: flex;
            justify-content: flex-start;
            font-size: 20px;
            color: black;
        }
        .right{
            width: 50%;
            padding: 10px;
            display: flex;
            justify-content: flex-end;
            font-size: 20px;
            color: black;
        }
    </style>
</head>
<body>
    <!-- Header Area Starts -->
	<header class="header-area" style="background-color: black;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.php"><img src="assets/images/logo/logo2.png" alt="logo"></a>
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
                            <li class="active"><a href="#">Cari Restoran</a></li>
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
                <div class="col-lg-12">
                    <div class="search-bar">
                        <div class="left" >
                            <b style="color:black">Cari Restoran :</b>
                        </div>
                        <div class="right">
                            <form role="form" id="form-search">
                                <div class="form-group">
									<div class="input-group">
                                        <input type="text" name="txtSearch" id="txtSearch" placeholder="Search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-brown" type="submit" onclick="myFunction()">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                        <!-- <button onclick="myFunction()">Copy Text</button> -->
                                    </div>
                                </div>
                            </form>  
                        </div>
                    <br/>

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-resto" id="single-resto">
                                
                            </div>
                        </div>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">food fun</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
</body>
</html>

<script>
    function myFunction(e) {
        var a = document.getElementById("txtSearch").value;
        // alert(a);
        $("#single-resto").html('');
        
		$.ajax({
			method: "post",
			url: "getSearchResto.php",
            data: `keySearch=${a}`,
			success: function(res){
                var isiResto = JSON.parse(res); 
                console.log(isiResto.result);
                
				if(isiResto != "none"){
					for (let index = 0; index < isiResto.length; index++) {
						$("#single-resto").append(`
                            <div class="card" id="resto${isiResto[index][0]}">
                                <div class="resto_image">
                                    <div id="resto-image${isiResto[index][0]}" alt="" class="img-fluid"></div>
                                </div>
                                <h5 class="card-header">${isiResto[index][2]}</h5>
                                <div class="card-body" >
                                    <b class="card-title">
                                        &#xf005;
                                        ${isiResto[index][6]}
                                    </b>
                                    <p> ${isiResto[index][5]} <br/>
                                        ${isiResto[index][4]} 
                                    </p>
                                    <a href="#" class="btn btn-success">Detail Restoran</a>
                                </div>
                            </div>

                            <br/>
						`);
						ambilGambar(isiResto[index][0]);
					}
				} else {
					$("#single-resto").append("<h3> Anda belum mendaftarkan resto! </h3>");
				}
			},  
            failure: function () {
                alert("salah");
            },
            error: function () {
                alert("nothing");
            }
		})
    }

    function ambilGambar(id){
		$.ajax({
			method : "post",
			url : "getOneImage.php",
			data : `idx=${id}`,
			success : function (result) {
				var srcGambar = JSON.parse(result);
				var img = new Image(348,225);
				img.src=srcGambar;
				document.getElementById('resto-image'+id).appendChild(img); 
			}
		})
	}
</script>