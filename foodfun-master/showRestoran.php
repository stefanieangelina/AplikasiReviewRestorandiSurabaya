<?php 
    require_once("conn.php");
    session_start();

    if(!isset($_SESSION['idLogin'])){
        header("location: index.php");
    }

    $querySelect = "SELECT * FROM restoran WHERE status=1";
    $result = mysqli_query($conn, $querySelect);

    if($result->num_rows > 0) {
        $querySelect = "SELECT * FROM restoran WHERE status=1";
        $isiDB = mysqli_query($conn, $querySelect)->fetch_all();
    } else {
        $isiDB = "none";
    }

    echo json_encode($isiDB);
?>