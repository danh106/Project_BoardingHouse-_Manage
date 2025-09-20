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
    <button id="submit" name="btn"><a href="ThemND.php">Thêm người dùng</a></button> <br><br>
    <table border="1">
        <tr>
            <th>Mã người dùng</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Họ tên</th>
            <th>Điện thoại</th>
            <th>Vai trò</th>
            <th>Chức năng</th>
        </tr>
        <?php
            include "db_connect.php";
            $sql = "select * from user";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['ID']."</td>";
                    echo "<td>".$row['Username']."</td>";
                    echo "<td>".$row['Password']."</td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['Phone']."</td>";
                    echo "<td>".$row['Role']."</td>";
                    echo '<td><span><a href="SuaND.php?id=' . $row['ID'] . '">Sửa</a> ';
                    echo '<a href="XoaND.php?id=' . $row['ID'] . '">Xóa</a></span></td>';
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>