<?php

    include "db_connect.php";
    $maPhong = $_GET['ID'];
    $query = "delete from motel WHERE ID = $maPhong";
    mysqli_query($conn, $query);
    $id = $_GET['ma'];
    header("Location: xemphongtro.php?this_id=".$id);
?>

