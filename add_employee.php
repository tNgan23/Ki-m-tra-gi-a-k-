<?php
require_once "connect.php"; // Đảm bảo rằng tệp connect.php đã được bao gồm

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $maNV = $_POST['maNV'];
    $tenNV = $_POST['tenNV'];
    $phai = $_POST['phai'];
    $noiSinh = $_POST['noiSinh'];
    $maPhong = $_POST['maPhong'];
    $luong = $_POST['luong'];

    // Thêm dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES ('$maNV', '$tenNV', '$phai', '$noiSinh', '$maPhong', '$luong')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm nhân viên thành công";
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
    <title>Thêm nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color: #000;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Thêm nhân viên</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="maNV">Mã NV:</label>
            <input type="text" id="maNV" name="maNV" required><br>

            <label for="tenNV">Tên NV:</label>
            <input type="text" id="tenNV" name="tenNV" required><br>

            <label for="phai">Giới tính:</label>
            <input type="text" id="phai" name="phai" required><br>

            <label for="noiSinh">Nơi Sinh:</label>
            <input type="text" id="noiSinh" name="noiSinh" required><br>

            <label for="maPhong">Mã Phòng:</label>
            <input type="text" id="maPhong" name="maPhong" required><br>

            <label for="luong">Lương:</label>
            <input type="text" id="luong" name="luong" required><br>

            <input type="submit" name="submit" value="Thêm">
        </form>
        <a href="admin_panel.php">Quay lại</a>
    </div>

</body>
</html>
