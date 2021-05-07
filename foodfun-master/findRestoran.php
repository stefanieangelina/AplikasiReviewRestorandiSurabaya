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
                <div class="col-lg-12">
                    <div class="search-bar">
                        <div class="left" >
                            <b style="color:black">Cari Restoran :</b>
                        </div>
                        <div class="right">
                            <form method="post" style="form-inline">
                                <input type="text" placeholder="Search">
                                <button class="btn btn-warning">Search</button>
                            </form>  
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nama Restoran</h5>
                            <p class="card-text">Alamat Restoran</p>
                            <a href="#" class="btn btn-warning">Detail</a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->
</body>
</html>