<?php
    include('conn.php');
    session_start();

    $idLogin = "";
    $namaLogin = "";

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
        .restoransaya{
            width: 1233px;
            height: 500px;
            margin-top: 10%;
            margin-left: 5%;
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
                        <a href="home.php"><img src="assets/images/logo/logo2.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-menu">
                        <ul>
                            <li ><a href="home.php">Home</a></li>
                            <li><a href="profile.php">Profil Saya</a></li>
                            <li class="active"><a href="#">Restoran Saya</a></li>
                            <li><a href="findRestoran.php">Cari Restoran</a></li>
                            <li><a href="index.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    <div class="restoransaya">
        <div class="row">
            <form method="post">
                <button type="submit" name="tambahResto" class="btn btn-primary">+ Add Restaurant</button>
            </form> 
        </div>

        <br/><br/><br/>

        <div id="single-resto">

        </div>
    </div>
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
			url : "getMyResto.php",
            data : `idLogin=${idLogin}`,
			success : function(res){
				var isiResto = JSON.parse(res);

				if(isiResto != "none"){
					for (let index = 0; index < isiResto.length; index++) {
						$("#single-resto").append(`
                            <div class="resto_image">
								<div id="resto-image${isiResto[index][0]}" alt="" class="img-fluid"></div>
							</div>
                            <div class="card">
                                <h5 class="card-header">${isiResto[index][2]}</h5>
                                <div class="card-body" >
                                    <h6 class="card-title">${isiResto[index][5]} <br/>
                                    ${isiResto[index][4]}</h6>
                                    <p class="card-text"> ${isiResto[index][3]} </p>
                                    <a href="#" class="btn btn-primary">Lihat Restoran</a>
                                </div>
                            </div>

                            // <div id="resto-button${isiResto[index][0]}">
                            // </div>
						`);
						ambilGambar(isiResto[index][0]);

						// var newElementDetail = $('<button type="submit" id="btnDetail" style="width: 99%; height:100%; background-color: red; color: white; transform: translateY(-100%)">Show Detail</button>');
						// newElementDetail.on("click", {"idx": isiResto[index][0], "nama": isiResto[index][1]}, fungsiBtnDetail);
						// $("#resto-button"+isiResto[index][0]).append(newElementDetail);
					}
				} else {
					$("#single-resto").append("<h3> Anda belum mendaftarkan resto! </h3>");
				}
			}
		})
	};

    function ambilGambar(id){
		$.ajax({
			method : "post",
			url : "getOneImage.php",
			data : `idx=${id}`,
			success : function (result) {
				var srcGambar = JSON.parse(result);
				var img = new Image(100,145);
				img.src=srcGambar;
				document.getElementById('resto-image'+id).appendChild(img); 
			}
		})
	}
</script>