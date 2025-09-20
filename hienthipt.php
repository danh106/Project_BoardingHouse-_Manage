<?php
include 'db_connect.php';
include 'timkiempt.php';
// Lấy các phòng trọ xem nhiều nhất
$sql_most_viewed = "SELECT * FROM motel WHERE approve = 1 ORDER BY count_view DESC LIMIT 6";
$most_viewed = $conn->query($sql_most_viewed);

// Lấy các phòng trọ mới đăng tải
$sql_newest = "SELECT * FROM motel WHERE approve = 1 ORDER BY created_at DESC LIMIT 6";
$newest = $conn->query($sql_newest);

// Lấy các phòng trọ gần trường ĐH Vinh nhất (giả sử DISTRICTS có thông tin về vị trí)
$sql_near_vinh = "SELECT * FROM motel WHERE approve = 1 AND district_id = (SELECT ID FROM DISTRICTS WHERE Name LIKE '%ĐH Vinh%') LIMIT 6";
$near_vinh = $conn->query($sql_near_vinh);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách phòng trọ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center text-primary">Danh sách phòng trọ</h1>

        <!-- Các phòng trọ xem nhiều nhất -->
        <h2 class="text-primary">Phòng trọ xem nhiều nhất</h2>
        <div class="row">
            <?php while ($row = $most_viewed->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?php echo $row['images']; ?>" class="card-img-top" alt="Hình ảnh phòng trọ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="chitietpt.php?id=<?php echo $row['ID']; ?>"><?php echo $row['title']; ?></a></h5>
                            <p class="card-text">Giá: <?php echo number_format($row['price']); ?> VND</p>
                            <p class="card-text">Địa chỉ: <?php echo $row['address']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
                 <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
        <!-- Các phòng trọ mới được đăng tải -->
        <h2 class="text-primary">Phòng trọ mới được đăng tải</h2>
        <div class="row">
            <?php while ($row = $newest->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?php echo $row['images']; ?>" class="card-img-top" alt="Hình ảnh phòng trọ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="chitietpt.php?id=<?php echo $row['ID']; ?>"><?php echo $row['title']; ?></a></h5>
                            <p class="card-text">Giá: <?php echo number_format($row['price']); ?> VND</p>
                            <p class="card-text">Địa chỉ: <?php echo $row['address']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
        <!-- Các phòng trọ gần trường ĐH Vinh nhất -->
        <h2 class="text-primary">Phòng trọ gần trường ĐH Vinh nhất</h2>
        <div class="row">
            <?php while ($row = $near_vinh->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?php echo $row['images']; ?>" class="card-img-top" alt="Hình ảnh phòng trọ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="chitietpt.php?id=<?php echo $row['ID']; ?>"><?php echo $row['title']; ?></a></h5>
                            <p class="card-text">Giá: <?php echo number_format($row['price']); ?> VND</p>
                            <p class="card-text">Địa chỉ: <?php echo $row['address']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
