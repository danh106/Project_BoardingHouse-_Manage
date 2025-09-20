<?php

    include('db_connect.php');
    $id = $_GET['id'];
    $query = "delete from user WHERE ID = $id";
    mysqli_query($conn, $query);
    header("Location: xemtaikhoan.php?this_id=".$id);
?>

