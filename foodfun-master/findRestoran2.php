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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

</head>
<script type="text/javascript" src="assets/js/vendor/jquery-2.2.4.min.js"></script>

<body>
    <div class="hasil">

    </div>

        <div class="form-group">
			<div class="input-group">
                <input type="text" name="txtSearch" id="txtSearch" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-brown" onclick="newFunc()">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </span>
                <!-- <button onclick="myFunction()">Copy Text</button> -->
            </div>
        </div>

</body>
</html>
<script>
    function newFunc(){
            var a = document.getElementById("txtSearch").value;
            alert(a);
            $.ajax({
                method: 'post',
                url: 'getSearchResto.php',
                data: `key=${a}`,
                success : function(res){
                    alert(res);
                }
            });
        }
</script>