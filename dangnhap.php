<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "db_connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE Username ='$username' AND Password ='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['ID'];
        $_SESSION['username'] = $user['UserName'];
        $_SESSION['role'] = $user['Role'];
        $id = $user['ID'];
        if($user['Role'] === '0') {
            header("Location: hienthipt.php");
            exit();
        } elseif($user['Role'] === '1') {
            header("Location: quanly.php");
            exit();
        }
        
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
</head>
<body>
<style>
        form{
            padding-left : 10px;
            max-width: 400px;
            width: 100%;
        }
        button{
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
        }
        button:hover{
            background-color: rgba(77, 77, 215, 0.4);
        }
        p{
            margin: 0 0 10px;
            font-weight: bold;
        }
        input{
            width: 100%;
            border-radius: 4px;
            margin-bottom: 5px;
            padding: 10px;
        }
    </style>
    <h2>Đăng Nhập</h2>
    <?php if(isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post" action="">
        <p>Tên đăng nhập:</p>
        <input type="text" id="username" name="username" >
        <p>Mật khẩu:</p>
        <input type="password" id="password" name="password">
        <button type="submit">Đăng Nhập</button>
    </form>
    <p>Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
</body>
</html>
