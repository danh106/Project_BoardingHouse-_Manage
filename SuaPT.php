<?php

include "db_connect.php";
$ma_phong = $_GET['id'];
$query = "SELECT * FROM motel WHERE ID = $ma_phong";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $room = mysqli_fetch_assoc($result);
} else {
    echo "phòng không tồn tại.";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $maPhong = $_POST['ma_phong'];
    $soPhong = $_POST['ten_phong'];
   $area =$_POST['ma_khu_vuc'];
   $image = $_POST['hinh_anh'];
    $gia = $_POST['gia'];
    
    $utilities = $_POST['tien_ich'];
    $phone=$_POST['phone'];
    $approve=$_POST['trang_thai'];
    $moTa = $_POST['mo_ta'];
    $diaChi = $_POST['dia_chi'];

    $query = "UPDATE motel SET ID = '$soPhong', title= '$maLoaiPhong', description = '$moTa', price = '$gia', area='$area', address = '$diaChi', images='$image', utilities='$utilities', phone='$phone', approve = '$approve' WHERE ID = $maPhong";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: xemphongtro.php");
    } else {
        echo "Đã xảy ra lỗi khi cập nhật thông tin phong trọ: " . mysqli_error($conn);
    }
   
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Phòng Trọ</title>
</head>
<body>
    <h2>Sửa Thông Tin Phòng Trọ</h2>
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
    <form method="post">
        <input type="hidden" name="ma_phong" value="<?php echo ($room['ID']); ?>">

        <label for="ten_phong">Tên Phòng:</label><br>
        <input type="text" id="ten_phong" name="ten_phong" value="<?php echo ($room['title']); ?>" required><br><br>

        <label for="mo_ta">Mô tả:</label><br>
        <textarea id="mo_ta" name="mo_ta" required><?php echo ($room['description']); ?></textarea><br>

        <label for="gia">Giá Phòng:</label><br>
        <input type="number" id="gia" name="gia" value="<?php echo ($room['price']); ?>" required><br>

        <label for="ma_khu_vuc">Khu Vực:</label><br>
        <input type="number" id="ma_khu_vuc" name="ma_khu_vuc" value="<?php echo ($room['area']); ?>" required><br> 
        
        <label for="dia_chi">Địa Chỉ:</label><br>
        <input type="text" id="dia_chi" name="dia_chi" value="<?php echo ($room['address']); ?>" required><br>

        <label for="hinh_anh">Image:</label><br>
        <input type="file" id="hinh_anh" name="hinh_anh" value="<?php echo ($room['images']); ?>" required><br>

        <label for="tien_ich">Tiện ích:</label><br>
        <input type="text" id="tien_ich" name="tien_ich" value="<?php echo ($room['utilities']); ?>" required><br>

        <label for="phone">Diện Thoại chủ trọ:</label><br>
        <input type="number" id="phone" name="phone" value="<?php echo ($room['phone']); ?>" required><br> 
        <label for="trang_thai">Trạng Thái:</label><br>
        <select id="trang_thai" name="trang_thai" required>
            <option value="1" <?php if ($room['approve'] === '1') echo 'selected'; ?>>Trống</option>
            <option value="2" <?php if ($room['approve'] === '2') echo 'selected'; ?>>Đã Thuê</option>
            <option value="3" <?php if ($room['approve'] === '3') echo 'selected'; ?>>Bảo Trì</option>
        </select><br><br>
       
        <button type="submit">Lưu Thay Đổi</button>
    </form>
</body>
</html>
