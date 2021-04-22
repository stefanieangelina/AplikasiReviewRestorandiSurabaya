<?php
    include('conn.php');
    
    if(isset($_POST["regist"])){
        $name = $_POST["first"]." ".$_POST["last"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        $alamat = $_POST["alamat"];

        if($cpass == $pass){
            // ambil foto id terakhir + 1
            $queryget = "SELECT * from foto";
            $res = mysqli_query($conn , $queryget);
            $fotoID = 1;
            while($row = mysqli_fetch_assoc($res)){
                $fotoID = 1 + $row["id_foto"];
            }

            $password = password_hash($pass, PASSWORD_DEFAULT);
            $queryinsert = "INSERT into users values('', '$name', '$email', '$alamat', '$password', $fotoID)";
            $res = mysqli_query($conn , $queryinsert);

            if($res){
                $queryget = "SELECT * from users";
                $res3 = mysqli_query($conn , $queryget);
                $userId = 0;
                while($row = mysqli_fetch_assoc($res3)){
                    $userId = $row["id_user"];
                }

                $queryinsert2 = "INSERT into foto values('', 'assets/images/customer1.png', '$userId', '', '1')";
                $res2 = mysqli_query($conn , $queryinsert2);
                echo "<script>alert('Berhasil register!')</script>";
            }
        } else{
            echo "<script>alert('Password dan confirm password harus sama!')</script>";
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
                        <form method="POST">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label>Nama Lengkap: </label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="first" class="form-control" placeholder="First name">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="last" class="form-control" placeholder="Last name">
                                    </div>
                            </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">Mohon untuk memasukkan email yang valid</small>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confim Password</label>
                                <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="4"></textarea>
                            </div>
                            <button type="submit" name="regist" class="btn btn-warning">Submit</button>
                        </form>

                        <br/> 
                        <p> 
                            Did you have an account? <a href="login.php"> Login here</a>
                        </p>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

</body>
</html>