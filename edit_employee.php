<?php
require_once "connect.php"; // Đảm bảo rằng tệp connect.php đã được bao gồm

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Lấy ID của nhân viên cần chỉnh sửa
    $id = $_GET['id'];

    // Lấy thông tin của nhân viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM nhanvien WHERE Ma_NV='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $maNV = $row['Ma_NV'];
        $tenNV = $row['Ten_NV'];
        $phai = $row['Phai'];
        $noiSinh = $row['Noi_Sinh'];
        $maPhong = $row['Ma_Phong'];
        $luong = $row['Luong'];
    } else {
        echo "Không tìm thấy nhân viên";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $maNV = $_POST['maNV'];
    $tenNV = $_POST['tenNV'];
    $phai = $_POST['phai'];
    $noiSinh = $_POST['noiSinh'];
    $maPhong = $_POST['maPhong'];
    $luong = $_POST['luong'];

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $sql = "UPDATE nhanvien SET Ten_NV='$tenNV', Phai='$phai', Noi_Sinh='$noiSinh', Ma_Phong='$maPhong', Luong='$luong' WHERE Ma_NV='$maNV'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin nhân viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sửa thông tin nhân viên</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="maNV">Mã NV:</label>
        <input type="text" name="maNV" value="<?php echo $maNV; ?>" readonly><br>

        <label for="tenNV">Tên NV:</label>
        <input type="text" name="tenNV" value="<?php echo $tenNV; ?>" required><br>

        <label for="phai">Giới tính:</label>
        <input type="text" name="phai" value="<?php echo $phai; ?>" required><br>

        <label for="noiSinh">Nơi Sinh:</label>
        <input type="text" name="noiSinh" value="<?php echo $noiSinh; ?>" required><br>

        <label for="maPhong">Mã Phòng:</label>
        <input type="text" name="maPhong" value="<?php echo $maPhong; ?>" required><br>

        <label for="luong">Lương:</label>
        <input type="text" name="luong" value="<?php echo $luong; ?>" required><br>

        <input type="submit" name="submit" value="Cập nhật">
    </form>
    <a class="back-link" href="admin_panel.php">Quay lại</a>
</div>

</body>
</html>
