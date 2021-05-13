<?php 
  session_start();
  require_once("conn.php");
    
  $idRestoran = $_POST['id_restoran'];
  $ulasan = $_POST['ulasan'];
  $idUser = $_SESSION['idLogin'];

  $queryinsert = "INSERT into komentar values('', '$idUser', '$idRestoran', '$ulasan')";
  $result = mysqli_query($conn, $queryinsert);
  
  if ($result) {
    header('location: /foodfun-master/home.php');    
  }else {
      echo mysqli_error($conn);
      die();
  }

?>