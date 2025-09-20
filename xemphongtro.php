<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        button{
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
        }
        button:hover{
            background-color: rgba(77, 77, 215, 0.4);
        }
    </style>
    <button id="submit" name="btn"><a href="ThemPT.php">Thêm phòng trọ</a></button> <br><br>
    <table border="1">
        <tr>
            <th>Tên Phòng</th>
            <th>Mô tả</th>
            <th>Giá phòng</th>
            <th>Địa chỉ</th>
            <th>Điện thoại chủ trọ</th>
           
        </tr>
        <?php
            include "db_connect.php";
            $sql = "select * from motel";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['phone']."</td>";
            
                    echo '<td><span><a href="SuaPT.php?id=' . $row['ID'] . '">Sửa</a> ';
                    echo '<a href="XoaPT.php?id=' . $row['ID'] . '">Xóa</a></span></td>';
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>