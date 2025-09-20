<?php
include "db_connect.php"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ten_dang_nhap = $_POST['Username'];
    $mat_khau = $_POST['Password'];
    $ho_ten = $_POST['Name'];
   $email =$_POST['Email'];
    $so_dien_thoai = $_POST['Phone'];
   
    $vai_tro = $_POST['Role'];

    
    $query = "INSERT INTO user (Name, Username, Email, Password, Role, Phone, Avatar) VALUES ('$ho_ten', '$ten_dang_nhap', '$email', '$mat_khau', '0', '$so_dien_thoai', 'Null')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: dangnhap.php");
    } else {
        echo "Đã xảy ra lỗi khi thêm người dùng: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
        input{
            width: 100%;
            border-radius: 4px;
            margin-bottom: 5px;
            padding: 10px;
        }
    </style>
    <h2>Đăng ký</h2>
    <form  method="post">
        <label for="ten_dang_nhap">Tên Đăng Nhập:</label><br>
        <input type="text" id="ten_dang_nhap" name="Username" required><br>

        <label for="mat_khau">Mật Khẩu:</label><br>
        <input type="password" id="mat_khau" name="Password" required><br>

        <label for="ho_ten">Họ Tên:</label><br>
        <input type="text" id="ho_ten" name="Name" required><br>


        <label for="so_dien_thoai">Số Điện Thoại:</label><br>
        <input type="text" id="so_dien_thoai" name="Phone"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="Email"><br>
        

        <button type="submit">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
</body>
</html>
