<?php
    include('conn.php');
    session_start();

    $idLogin = "";
    $idResto = "";
    $nama = "";
    $alamat = "";
    $rating = 0;
    $nomorTelp = "0";
    $deskripsi = "";
    $tempSrc = 0;
    $imgSrc = 0;

    if(isset($_SESSION['idLogin'])){
        $idLogin = $_SESSION['idLogin'];
        $idResto = $_SESSION["idxEdit"];

        $queryget = "SELECT * FROM restoran";
        $res = mysqli_query($conn , $queryget);

        while($row = mysqli_fetch_assoc($res)){
            if($row["id_restoran"] == $idResto){
                $nama = $row["nama"];
                $alamat = $row["alamat"];
                $rating = $row["rating"];
                $nomorTelp = "0".$row["no_tlp"];
                $deskripsi = $row["deskripsi"];
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
        if(isset($_FILES['photo']) && !empty($_FILES["photo"]["name"])){
            $target_dir = "./assets/images/resto/"; // tempat file akan disimpan
            $target_file = $target_dir.$_FILES["photo"]["name"]; 
            // value dari $target_dir + nama file yang diupload, hasil nya akan disimpan ke dalam $target_file.
            // $_FILES mengambil nama dari file yang di submit
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file); 
            // gambar di simpan di temp, baru dipindah ke $target_dir

            $nama = "assets/images/resto/" . $_FILES["photo"]["name"];
            $stmt = $conn->prepare("UPDATE foto SET nama = ? WHERE id_foto = ?");
            $stmt->bind_param("si", $namaFile, $idFoto); // ('tipe data', parameters)
            // s --> string (tipe data langsung di jejer tanpa spasi) 
            // ('ss', $nama, $username) --> string, string
            $namaFile = $nama;
            $idFoto = $tempSrc;
            $stmt->execute();
        }
        
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $deskripsi = $_POST["deskripsi"];
        $nomorTelp = $_POST["nomorTelp"];

        $queryupdate = "UPDATE restoran SET nama='$nama', alamat='$alamat', 
                        deskripsi='$deskripsi', no_tlp = $nomorTelp
                        WHERE id_restoran = $idResto";
        $res = mysqli_query($conn , $queryupdate);

        if($res){
            echo "<script>alert('Berhasil mengedit data restoran!')</script>";
        } else {
            echo "<script>alert('Gagal mengedit data restoran!')</script>";
        }

        header("refresh: 0");
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

    <section class="banner-area text-center" style="padding-top: 50px; color:white; font-size:20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="halamanprofile">
                        <div class="fotoprofil"><img src="<?php echo($imgSrc) ?>" style="width:150%; height:150%; border:1px solid darkblue; border-radius:50%"></div>
                    </div>
                    <br/> <br/> <br/> 
                   
                    <div class="formpendaftaran" style="text-align: left;">
                        <form method="POST" enctype='multipart/form-data'>
                        <input type='file' name='photo' style="transform:translateX(120%)"> <br/>
                        <small id="uploadgambarHint"> <center>
                            Make sure the image and the format (.jpg / .png) is correct! 
                        </center></small>
                        <br/> <br/>

                        <div class="form-group">
                              <label for="namalbl">Nama Restoran : </label>
                              <input type="text" name="nama" value="<?= $nama ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Rating : </label> 
                                <input type="number" value="<?= $rating ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label>Alamat : </label>
                                <input type="text" class="form-control" value="<?= $alamat ?>" name="alamat">
                            </div>
                            <div class="form-group">
                              <label for="nolbl">Telepon Restoran : </label>
                              <input input type = "number" value="<?= $nomorTelp ?>" name="nomorTelp" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label>Deskripsi : </label>
                                <textarea class="form-control" name="deskripsi" rows="4"><?= $deskripsi ?></textarea>
                            </div><br/>                            
                            <center>
                                <button type="submit" class="form-control btn btn-warning" name="edit">Edit Data Restoran</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>