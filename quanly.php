<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }
        .nav a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .nav a:hover {
            background-color: #ddd;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trang Quản Lý</h1>
        <div class="nav">
            <a href="xemtaikhoan.php">Quản Lý Tài Khoản</a>
            <a href="xemphongtro.php">Quản Lý Phòng Trọ</a>
        </div>
        <div class="content">
            <h2>Chào mừng bạn đến với trang quản lý!</h2>
            <p>Chọn một trong các mục ở trên để bắt đầu.</p>
        </div>
    </div>
</body>
</html>