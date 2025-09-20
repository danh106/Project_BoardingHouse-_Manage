<?php
include 'db_connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : "";
$min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
$max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 0;
$district_id = isset($_GET['district_id']) ? intval($_GET['district_id']) : 0;
$utilities = isset($_GET['utilities']) ? $_GET['utilities'] : "";

$sql = "SELECT * FROM motel WHERE approve = 1";

if ($search) {
    $sql .= " AND title LIKE '%$search%'";
}
if ($min_price > 0) {
    $sql .= " AND price >= $min_price";
}
if ($max_price > 0) {
    $sql .= " AND price <= $max_price";
}
if ($district_id > 0) {
    $sql .= " AND district_id = $district_id";
}
if ($utilities) {
    $sql .= " AND utilities LIKE '%$utilities%'";
}

$result = $conn->query($sql);

$sql_districts = "SELECT * FROM districts";
$districts = $conn->query($sql_districts);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm phòng trọ</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center text-primary">Tìm kiếm phòng trọ</h1>
        <form method="get" action="" class="mb-5">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="search" class="text-primary">Từ khóa</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm phòng trọ..." value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="min_price" class="text-primary">Giá tối thiểu</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Giá tối thiểu" value="<?php echo $min_price; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="max_price" class="text-primary">Giá tối đa</label>
                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Giá tối đa" value="<?php echo $max_price; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="district_id" class="text-primary">Khu vực</label>
                    <select name="district_id" id="district_id" class="form-control">
                        <option value="0">Chọn khu vực</option>
                        <?php while ($row = $districts->fetch_assoc()): ?>
                            <option value="<?php echo $row['ID']; ?>" <?php if ($row['ID'] == $district_id) echo 'selected'; ?>>
                                <?php echo $row['Name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="utilities" class="text-primary">Tiện ích</label>
                    <input type="text" name="utilities" id="utilities" class="form-control" placeholder="Tiện ích" value="<?php echo htmlspecialchars($utilities); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <h2 class="text-primary">Kết quả tìm kiếm</h2>
        <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 col-lg-4 mb-4'>";
                echo "<div class='card shadow-sm'>";
                echo "<img src='" . $row['images'] . "' class='card-img-top' alt='Hình ảnh phòng trọ'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'><a href='detail.php?id=" . $row['ID'] . "'>" . $row['title'] . "</a></h5>";
                echo "<p class='card-text'>Diện tích: " . $row['area'] . " m²</p>";
                echo "<p class='card-text'><strong>Giá:</strong> " . number_format($row['price']) . " VND</p>";
                echo "<p class='card-text'>Địa chỉ: " . $row['address'] . "</p>";
                echo "<p class='card-text'><strong>Tiện ích:</strong> " . $row['utilities'] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='col-12'>Không có kết quả nào.</p>";
        }
        // $conn->close();
        ?>
        </div>
       
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
