<?php 
    require_once("conn.php");

    $idLogin = $_POST["idLogin"];

    $querySelect = "SELECT * FROM restoran WHERE status=1 AND user_id=$idLogin";
    $result = mysqli_query($conn, $querySelect);

    if($result->num_rows > 0) {
        $querySelect = "SELECT * FROM restoran WHERE status=1 AND user_id=$idLogin";
        $isiDB = mysqli_query($conn, $querySelect)->fetch_all();
    } else {
        $isiDB = "none";
    }

    echo json_encode($isiDB);
?>