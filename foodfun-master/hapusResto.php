  
<?php
    session_start();
    include_once("conn.php");

    $idx = $_POST['idx'];
    $returnValue = "Gagal mengahpus restoran!";
       
    $queryUpdate = "UPDATE restoran SET status = 0 WHERE id_restoran = $idx";
    $result = mysqli_query($conn, $queryUpdate);

    if($result){
        $returnValue = "Berhasil menghapus restoran!";
    }

    echo json_encode($returnValue);
?>