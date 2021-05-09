<?php 
    require_once("conn.php");

    $querySelect = "SELECT * FROM restoran WHERE status=1";
    $result = mysqli_query($conn, $querySelect);

    if($result->num_rows > 0) {
        $querySelect = "
            SELECT r.id_restoran, r.nama, r.deskripsi, r.no_tlp, r.alamat, r.rating
            , GROUP_CONCAT(k.ulasan SEPARATOR '#_#') as ulasans, GROUP_CONCAT(u.nama SEPARATOR '#_#') as namas
            FROM restoran r 
            LEFT JOIN komentar k ON k.id_restoran = r.id_restoran
            LEFT JOIN users u ON u.id_user = k.id_user
            WHERE r.status=1
            GROUP BY r.id_restoran
        ";
        $isiDB = mysqli_query($conn, $querySelect)->fetch_all(MYSQLI_ASSOC);
    } else {
        $isiDB = "none";
    }

    echo json_encode($isiDB);
?>