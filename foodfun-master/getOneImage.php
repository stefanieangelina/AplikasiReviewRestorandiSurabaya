<?php 
    include("conn.php");
    session_start();

    if(isset($_SESSION['idLogin'])){
        $idLogin = $_SESSION['idLogin'];
        $namaLogin = $_SESSION['namaLogin'];
    } else {
        header("location: index.php");
    }

    $id = $_POST['idx'];

    $querySelect = "SELECT nama FROM foto WHERE restoran_id=$id";
    $result = mysqli_query($conn, $querySelect);

    if($result->num_rows > 0){
        $querySelect = "SELECT nama FROM foto WHERE restoran_id=$id";
        $isiDB = mysqli_query($conn, $querySelect)->fetch_assoc();
        $isiDB = $isiDB['nama'];
    } else {
        $isiDB = "none";
    }
    echo json_encode($isiDB);
?>