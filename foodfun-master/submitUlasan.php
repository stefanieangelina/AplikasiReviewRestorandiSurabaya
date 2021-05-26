<?php 
  require_once("conn.php");
  session_start();

  if(!isset($_SESSION['idLogin'])){
    header("location: index.php");
  }
    
  $idRestoran = $_POST['id_restoran'];
  $ulasan = $_POST['ulasan'];
  $rating = $_POST['rating'];
  $idUser = $_SESSION['idLogin'];

  $queryinsert = "INSERT into komentar values('', '$idUser', '$idRestoran', '$ulasan',$rating)";
  $result = mysqli_query($conn, $queryinsert);
  
  if ($result) {
    $selectAvg = "SELECT AVG(rating) as rating from komentar where id_restoran=$idRestoran";
    $resultAvg = mysqli_query($conn, $selectAvg)->fetch_all(MYSQLI_ASSOC);
    if (!empty($resultAvg)) {
      $avg = $resultAvg[0]['rating'];
      $queryupdate = "UPDATE restoran set rating=$avg where id_restoran=$idRestoran";
      mysqli_query($conn, $queryupdate);
    }
    header('location: /foodfun-master/restoranDetail.php?resto='. $idRestoran);    
  }else {
      echo mysqli_error($conn);
      die();
  }

?>