<?php
    include('conn.php');
    session_start();

    $idLogin = "";
    $namaLogin = "";

    $_SESSION["idxEdit"] = 0;

    if(isset($_SESSION['idLogin'])){
        $idLogin = $_SESSION['idLogin'];
        $namaLogin = $_SESSION['namaLogin'];
        echo '<script>';
        echo 'var idLog = ' . $idLogin . ';';
        echo '</script>';
    } else {
        header("location: home.php");
    }

    if(isset($_POST["tambahResto"])){
        header("location: addResto.php");
    }

    if(isset($_POST["btnEdit"])){
        $_SESSION["idxEdit"] = $_POST["idResto"];
        header("location: editResto.php");
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
    <title>Menu</title>

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
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

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
                            <li class="active"><a href="#">Restoran Saya</a></li>
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
    <section class="banner-area banner-area2 menu-bg text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i>Restoran Saya</i></h1>
                    <p class="pt-2"><i>Tambahkan restoran milikmu</i></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Food Area starts -->
    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <form method="post">
                    <button type="submit" name="tambahResto" class="btn btn-primary">+ Tambahkan Restaurant</button>
                </form> 
            </div>

            <br/><br/><br/>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-resto" id="single-resto">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Food Area End -->

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
                        <div class="single-widget single-widget2 my-5 my-md-0">
                            <h5 class="mb-4">contact us</h5>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-text">
                                    <p>1234 Some St San Francisco, CA 94102, US 1.800.123.4567 </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-text">
                                    <p>(123) 456 78 90</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="info-text">
                                    <p>support@axiomthemes.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget3">
                            <h5 class="mb-4">opening hours</h5>
                            <p>Monday ...................... Closed</p>
                            <p>Tue-Fri .............. 10 am - 12 pm</p>
                            <p>Sat-Sun ............... 8 am - 11 pm</p>
                            <p>Holidays ............. 10 am - 12 pm</p>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li class="no-margin">Follow Us</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
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

<script>
	$(document).ready(function(){
		loadResto(idLog);
	});

    function loadResto(idLogin){
		$("#single-resto").html('');
        
		$.ajax({
			method: "post",
			url: "getMyResto.php",
            data: `idLogin=${idLogin}`,
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
                                </div>
                                
                                <form method="post">
                                        <input type="hidden" name="idResto" value="${isiResto[index][0]}">
                                        <button type="submit" name="btnEdit" class="btn btn-warning" style="color:white; transform:translateX(40%)">Edit Restoran</button>
                                </form>

                                <div id="resto-button${isiResto[index][0]}" style="transform:translateX(52%) translateY(-135%)"></div>
                            </div>
						`);
						ambilGambar(isiResto[index][0]);

                        var newBtnHapus = $('<button type="submit" id="btnHapus" class="btn btn-danger">Hapus Resto</button>');
						newBtnHapus.on("click", {"idx": isiResto[index][0]}, fungsiBtnHapus);
						$("#resto-button"+isiResto[index][0]).append(newBtnHapus);
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
	};

    function fungsiBtnHapus(e){
		var index = e.data.idx;
		$.ajax({
			method: "post",
			url : "hapusResto.php",
			data : `idx=${index}`,
			success : function(res){
				var hapusRestoran = JSON.parse(res);
				alert(hapusRestoran);
			}
		});

        loadResto(idLog);
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
