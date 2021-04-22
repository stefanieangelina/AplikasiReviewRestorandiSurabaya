<?php
    include('conn.php');
    session_start();

    $idLogin = "";
    $namaLogin = "";
    $alamatLogin = "";
    $emailLogin = "";
    $passLogin = "";
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
                $passLogin = $row["password"];
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


    if(isset($_POST['edit'])){
        if(isset($_FILES['photo'])){
            $target_dir = "./assets/images/profile/"; // tempat file akan disimpan
            $target_file = $target_dir.$_FILES["photo"]["name"]; 
            // value dari $target_dir + nama file yang diupload, hasil nya akan disimpan ke dalam $target_file.
            // $_FILES mengambil nama dari file yang di submit
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file); 
            // gambar di simpan di temp, baru dipindah ke $target_dir

            $nama = "assets/images/profile/" . $_FILES["photo"]["name"];
            $stmt = $conn->prepare("UPDATE foto SET nama = ? WHERE id_foto = ?");
            $stmt->bind_param("si", $namaFile, $idFoto); // ('tipe data', parameters)
            // s --> string (tipe data langsung di jejer tanpa spasi) 
            // ('ss', $nama, $username) --> string, string
            $namaFile = $nama;
            $idFoto = $tempSrc;
            $stmt->execute();
        }
        
        $name = $_POST["nama"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        $alamat = $_POST["alamat"];

        if($pass == ""){
            $queryupdate = "UPDATE users SET nama='$name', 
                            alamat='$alamat'
                            WHERE id_user = $idLogin";
            $res = mysqli_query($conn , $queryupdate);

            if($res){
            echo "<script>alert('Berhasil mengedit profile!')</script>";
            }   
        } else {
            if($cpass == $pass){
                $password = password_hash($pass, PASSWORD_DEFAULT);
                $queryupdate = "UPDATE users SET nama='$name', 
                                alamat='$alamat', password='$password'
                                WHERE id_user = $idLogin";
                $res = mysqli_query($conn , $queryupdate);
    
                if($res){
                    echo "<script>alert('Berhasil mengedit profile!')</script>";
                }
            } else{
                echo "<script>alert('Password dan confirm password harus sama!')</script>";
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
                            <li><a href="profile.php">Profil Saya</a></li>
                            <li><a href="restoranSaya.php">Restoran Saya</a></li>
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
                        <form method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <input type='file' name='photo' style="transform:translateX(20%)"> <br/>
                                <small id="uploadgambarHint"> <center>
                                    Make sure the image and the format (.jpg / .png) is correct! 
                                </center></small>
                                <br/> <br/>

                                <label style="color: orange;">Name : </label>
                                <input type="text" value="<?= $namaLogin ?>" name="nama" class="form-control"><br/>
                                
                                <label style="color: orange;">Email : </label>
                                <input type="email" value="<?= $emailLogin ?>" class="form-control" disabled><br/>
                                
                                <label style="color: orange;">Address : </label>
                                <input type="text" value="<?= $alamatLogin ?>" name="alamat" class="form-control"><br/>                              
                                
                                <label style="color: orange;">Password : </label>
                                <input type="password" value="" name="pass" class="form-control">
                                <small id="passHint">If you didn't want change the password, leave it blank </small> <br/><br/>
                                
                                <label style="color: orange;">Confirm Password : </label>
                                <input type="password" value="" name="cpass" class="form-control">
                                <small id="confPassHint">If you didn't want change the password, leave it blank </small> <br/><br/>
                                
                                <input type="submit" class="btn btn-warning" value="     Edit Profile     " name="edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>