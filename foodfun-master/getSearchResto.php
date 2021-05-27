<?php 
    require_once("conn.php");
    session_start();

    // if(!isset($_SESSION['idLogin'])){
    //     header("location: index.php");
    // }

    $keySearch = "";
    if(isset($_POST["key"])) $keySearch = $_POST["key"];
    $keySearch = strtolower($keySearch);

    $querySelect = "SELECT * FROM restoran WHERE status=1 AND lower(nama) like '%$keySearch%'";
    $result = mysqli_query($conn, $querySelect);

    if($result->num_rows > 0) {
        $querySelect = "SELECT * FROM restoran WHERE status=1 AND lower(nama) like '%$keySearch%'";
        $isiDB = mysqli_query($conn, $querySelect)->fetch_all();
    } else {
        $isiDB = "none";
    }

    echo json_encode($isiDB);

    //echo "$keySearch";
?>