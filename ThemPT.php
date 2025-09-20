<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db_connect.php";

    
    $so_phong = $_POST['so_phong'];
    $ma_loai_phong = $_POST['ma_loai_phong'];
    $gia = $_POST['gia'];
    $ma_nguoi_dung = $_GET['id']; 
    $ma_khu_vuc = $_POST['ma_khu_vuc'];
    $mo_ta = $_POST['mo_ta'];
    $trang_thai = $_POST['trang_thai'];
    $dia_chi = $_POST['dia_chi'];

    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
           
            $uploadOk = 1;
        } else {
            
            $error = "Tập tin không phải là một hình ảnh.";
            $uploadOk = 0;
        }
    }

    
    if (file_exists($target_file)) {
        $error = "Tập tin đã tồn tại.";
        $uploadOk = 0;
    }

    
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $error = "Tập tin quá lớn.";
        $uploadOk = 0;
    }

   
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $error = "Chỉ cho phép tải lên các định dạng JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }

   
    if ($uploadOk == 0) {
        $error = "Tập tin của bạn không được tải lên.";
    } else {
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           
            $hinh_anh = $target_file;

           
            $query = "INSERT INTO PhongTro (SoPhong, MaLoaiPhong, Gia, TrangThai, MaNguoiDung, MaKhuVuc, MoTa, HinhAnh, DiaChi) 
                      VALUES ('$so_phong', '$ma_loai_phong', '$gia', '$trang_thai', '$ma_nguoi_dung', '$ma_khu_vuc', '$mo_ta', '$hinh_anh', '$dia_chi')";
            $result = mysqli_query($conn, $query);

            if ($result) {
               
                header("Location: Chunha.php?this_id=".$ma_nguoi_dung);
                exit();
            } else {
                
                $error = "Đã xảy ra lỗi khi thêm phòng.";
            }
        } else {
            $error = "Đã xảy ra lỗi khi tải lên tập tin.";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phòng Trọ</title>
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
    <h2>Thêm Phòng Trọ</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="so_phong">Số Phòng:</label><br>
        <input type="text" id="so_phong" name="so_phong" required><br>
        <label for="ma_loai_phong">Loại Phòng:</label><br>
        <input type="number" id="ma_loai_phong" name="ma_loai_phong" required><br>
        <label for="gia">Giá Phòng:</label><br>
        <input type="number" id="gia" name="gia" required><br>
        <label for="ma_khu_vuc">Khu Vực:</label><br>
        <input type="number" id="ma_khu_vuc" name="ma_khu_vuc" required><br>
        
        <label for="mo_ta">Mô Tả:</label><br>
        <textarea id="mo_ta" name="mo_ta" required></textarea><br>
        <label for="dia_chi">Địa Chỉ:</label><br>
        <input type="text" id="dia_chi" name="dia_chi" required><br>
        <select id="trang_thai" name="trang_thai" required>
            <option value="Trong">Trống</option>
            <option value="DaThue">Đã thuê</option>
            <option value="BaoTri">Bảo trì</option>
        </select><br><br>
        <label for="fileToUpload">Ảnh Phòng:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
        <button type="submit" name="submit">Thêm Phòng</button>
    </form>
</body>
</html>
