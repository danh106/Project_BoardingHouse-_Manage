<?php
    include('db_connect.php'); 
    $ma_nguoi_dung = $_GET['id'];
    $query = "SELECT * FROM user WHERE ID = $ma_nguoi_dung";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "Người dùng không tồn tại.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];
        $ho_ten = $_POST['ho_ten'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $vai_tro = $_POST['vai_tro'];
        $email=$_POST['email'];
        $query = "UPDATE user SET Username = '$ten_dang_nhap', Password = '$mat_khau', Name = '$ho_ten', Phone = '$so_dien_thoai', Email ='$email', Role = '$vai_tro' WHERE ID = $ma_nguoi_dung";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: xemtaikhoan.php");
        } else {
            echo "Đã xảy ra lỗi khi cập nhật thông tin người dùng: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Người Dùng</title>
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
    <h2>Sửa Thông Tin Người Dùng</h2>
    <form method="post">
        <label for="ten_dang_nhap">Tên Đăng Nhập:</label><br>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="<?php echo ($user['Username']); ?>" required><br><br>

        <label for="mat_khau">Mật Khẩu:</label><br>
        <input type="password" id="mat_khau" name="mat_khau" value="<?php echo ($user['Password']); ?>" required><br><br>

        <label for="ho_ten">Họ Tên:</label><br>
        <input type="text" id="ho_ten" name="ho_ten" value="<?php echo ($user['Name']); ?>" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo ($user['Email']); ?>" required><br><br>

        <label for="so_dien_thoai">Số Điện Thoại:</label><br>
        <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="<?php echo ($user['Phone']); ?>"><br><br>

        <label for="vai_tro">Vai Trò:</label><br>
        <select id="vai_tro" name="vai_tro" required>
            <option value="0" <?php if ($user['Role'] === '0') echo 'selected'; ?>>Khách Thuê</option>
            
            <option value="1" <?php if ($user['Role'] === '1') echo 'selected'; ?>>Quản Trị</option>
        </select><br><br>

        <button type="submit">Lưu Thay Đổi</button>
    </form>
</body>
</html>
