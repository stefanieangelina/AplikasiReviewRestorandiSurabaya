<?php 
  require_once("conn.php");
  session_start();

  if(!isset($_SESSION['idLogin'])){
    header("location: index.php");
  }
    
  $idRestoran = $_POST['id_restoran'];
  $ulasan = $_POST['ulasan'];
  $idUser = $_SESSION['idLogin'];

  $queryinsert = "INSERT into komentar values('', '$idUser', '$idRestoran', '$ulasan')";
  $result = mysqli_query($conn, $queryinsert);
  
  if ($result) {
    header('location: /foodfun-master/restoranDetail.php?resto='. $idRestoran);    
  }else {
      echo mysqli_error($conn);
      die();
  }

?>