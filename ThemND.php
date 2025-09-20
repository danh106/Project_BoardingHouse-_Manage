<?php
include "db_connect.php"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email= $_POST['Email'];
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $vai_tro = $_POST['vai_tro'];
    $query = "INSERT INTO user (Name, Username, Email, Password, VaiTro, Phone) VALUES ('$ho_ten', '$ten_dang_nhap', '$email', '$mat_khau', '$vai_tro', '$so_dien_thoai')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: xemtaikhoan.php");
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
    <title>Thêm Người Dùng</title>
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
    <h2>Thêm Người Dùng</h2>
    <form method="post">
    

        <label for="ten_dang_nhap">Tên Đăng Nhập:</label><br>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" required><br>

        <label for="mat_khau">Mật Khẩu:</label><br>
        <input type="password" id="mat_khau" name="mat_khau" required><br>

        <label for="ho_ten">Họ Tên:</label><br>
        <input type="text" id="ho_ten" name="ho_ten" required><br>


        <label for="so_dien_thoai">Số Điện Thoại:</label><br>
        <input type="tel" id="so_dien_thoai" name="so_dien_thoai"><br>

        <label for="email">Email:</label><br>
        <input type="tel" id="email" name="Email"><br>  

        <label for="vai_tro">Vai Trò:</label><br>
        <select id="vai_tro" name="vai_tro" required>
            <option value="0">Khách Thuê</option>
        
            <option value="1">Quản Trị Viên</option>
        </select><br><br>

        <button type="submit">Thêm Người Dùng</button>
    </form>
</body>
</html>
