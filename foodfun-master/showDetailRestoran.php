<?php 
    require_once("conn.php");

    $idResto = $_POST["idResto"];

    $querySelect = "SELECT * FROM restoran WHERE status=1 AND id_restoran=$idResto";
    $result = mysqli_query($conn, $querySelect);

    if($result->num_rows > 0) {
        $querySelect = "SELECT * FROM restoran WHERE status=1 AND id_restoran=$idResto";
        $isiDB = mysqli_query($conn, $querySelect)->fetch_all();
    } else {
        $isiDB = "none";
    }

    echo json_encode($isiDB);
?>