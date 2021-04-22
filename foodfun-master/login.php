<?php
    include('conn.php');
    session_start();

    if(isset($_POST["login"])){
        $queryget = "SELECT * from users";
        $res = mysqli_query($conn , $queryget);
        $pass = false;
        $mail = false;
        $idLogin = "";
        $namaLogin = "";

        while($row = mysqli_fetch_assoc($res)){
            if($row["email"] == $_POST["email"]){
                $mail = true;
                if(password_verify($_POST["password"], $row["password"]) == true){
                    $pass = true;
                    $idLogin = $row["id_user"];
                    $namaLogin = $row["nama"];
                } 
            }
        }

        if($mail == false){
            echo "<script>alert('Email tidak terdaftar!')</script>";
        }
        else if($mail == true && $pass == false){
            echo "<script>alert('Password salah!')</script>";
        }
        else if($mail == true && $pass == true){
            $_SESSION["idLogin"] = $idLogin;
            $_SESSION["namaLogin"] = $namaLogin;
            header("location: home.php");
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
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="index.php" style="color: white;">home</a></li>
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
                        <form method="post">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" name="login" class="btn btn-warning">Login</button>
                        </form>

                        <br/> <br/>
                        <p> 
                            Didn't have an account? <a href="register.php"> Register now!</a>
                        </p>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

</body>
</html>