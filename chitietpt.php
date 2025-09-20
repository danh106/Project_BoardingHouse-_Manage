<?php
include 'db_connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM motel WHERE ID = $id AND approve = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $motel = $result->fetch_assoc();
} else {
    echo "Phòng trọ không tồn tại.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo $motel['title']; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container my-4">
        <h1 class="text-primary"><?php echo $motel['title']; ?></h1>
        <div class="row">
            <div class="col-md-8">
                <img src="<?php echo $motel['images']; ?>" class="img-fluid" alt="Hình ảnh phòng trọ">
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm bg-white">
                    <h3 class="text-primary">Thông tin chi tiết</h3>
                    <p><strong>Mô tả:</strong> <?php echo $motel['description']; ?></p>
                    <p><strong>Giá:</strong> <?php echo number_format($motel['price']); ?> VND</p>
                    <p><strong>Địa chỉ:</strong> <?php echo $motel['address']; ?></p>
                    <p><strong>Tiện ích:</strong> <?php echo $motel['utilities']; ?></p>
                    <p><strong>Liên hệ:</strong> <?php echo $motel['phone']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
