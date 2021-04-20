<?php
    include('conn.php');
    session_start();

    $idLogin = "";
    $namaLogin = "";
    $alamatLogin = "";
    $emailLogin = "";
    $imgSrc = "";
    $tempSrc = "";

    if(isset($_SESSION['idLogin'])){
        $idLogin = $_SESSION['idLogin'];

        $queryget = "SELECT * from users";
        $res = mysqli_query($conn , $queryget);

        while($row = mysqli_fetch_assoc($res)){
            if($row["id_user"] == $idLogin){
                $namaLogin = $row["nama"];
                $alamatLogin = $row["alamat"];
                $emailLogin = $row["email"];
                $tempSrc = $row["foto_id"];
            }
        }

        $queryget2 = "SELECT * from foto";
        $res2 = mysqli_query($conn , $queryget2);
        while($row = mysqli_fetch_assoc($res2)){
            if($row["id_foto"] == $tempSrc){
                $imgSrc = $row["nama"];
            }
        }
    } else {
        header("location: home.php");
    }

    if(isset($_POST["btnEdit"])){
        header("location: editProfile.php");
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
        .halamanprofile{
            width: 100%;
            height: 100px;
            margin-top: 10%;
            align-items: center;
            align-content: center;
            padding-left: 45%;
        }
        .fotoprofil{
            width: 100px;
            height: 100px;
            position: relative;
        }
        .infouser{
            width : 100%;
            height: 100%;
            color: orange;
            font-family: 'Abril Fatface', cursive;;
            font-size: 20px;
            margin-left: 0;
        }
    </style>
</head>
<body>
    <!-- Header Area Starts -->
	<header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="home.php"><img src="assets/images/logo/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="home.php">Home</a></li>
                            <li class="active"><a href="#">Profil Saya</a></li>
                            <li><a href="myRestoran.php">Restoran Saya</a></li>
                            <li><a href="findRestoran.php">Cari Restoran</a></li>
                            <li><a href="index.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area text-center" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="halamanprofile">
                        <div class="fotoprofil"><img src="<?php echo($imgSrc) ?>" style="width:150%; height:150%; border:1px solid darkblue; border-radius:50%"></div>
                    </div>
                    <br/> <br/> <br/> 

                    <div class = "infouser" style="text-align: center;">
                        <form method="post">
                            <div class="form-group">
                                <label style="color: orange;">Name : <?= $namaLogin ?></label>
                            </div>
                            <div class="form-group">
                                <label style="color: orange;">Email : <?= $emailLogin ?></label>
                            </div>
                            <div class="form-group">
                                <label style="color: orange;">Address : <?= $alamatLogin ?></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btnEdit" class="btn btn-warning">Edit Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- <div class="halamanprofile">
        <div class="fotoprofil"><img src='assets/images/customer1.png' width="100px" height="100px" border-radius="50%"></div>
    </div>
    <div class = "infouser">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama : </label>
                <label style="color: black;">Erland Goeswanto (Contoh)</label>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email : </label>
                <label style="color: black;">egoeswanto@gmail.com</label>
            </div>
            <div class="form-group">
                <label>Alamat : </label>
                <label style="color: black;">Jalan Ngagel Madya VIII no 21 , Gubeng , Surabaya</label>
            </div>
            <div class="form-group">
                <label> No telp : </label>
                <label style="color: black;"> +6289607880549 </label>
            </div>
        </form>
    </div> -->
</body>
</html>