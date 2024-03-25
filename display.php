<?php
require_once "connect.php"; // Đảm bảo rằng tệp connect.php đã được bao gồm

// Thiết lập số lượng nhân viên trên mỗi trang
$soNhanVienTrenTrang = 5;

// Xác định trang hiện tại
if (isset($_GET['trang']) && is_numeric($_GET['trang'])) {
    $trangHienTai = intval($_GET['trang']);
} else {
    $trangHienTai = 1;
}

// Tính toán vị trí bắt đầu của các nhân viên trên trang hiện tại
$viTriBatDau = ($trangHienTai - 1) * $soNhanVienTrenTrang;

// Truy vấn SQL để lấy số lượng nhân viên tương ứng với trang hiện tại
$sql = "SELECT * FROM nhanvien LIMIT $viTriBatDau, $soNhanVienTrenTrang";
$result = $conn->query($sql);

// Kiểm tra kết quả trả về
if ($result->num_rows > 0) {
    // Hiển thị danh sách nhân viên
    echo "<h2>Danh sách nhân viên:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Mã NV</th><th>Tên NV</th><th>Giới tính</th><th>Nơi Sinh</th><th>Mã Phòng</th><th>Lương</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["Ma_NV"]."</td>";
        echo "<td>".$row["Ten_NV"]."</td>";
        // Kiểm tra giới tính và chèn hình ảnh tương ứng
        echo "<td>";
        if ($row["Phai"] == "NU") {
            echo "<img src='img/nu.jpg' alt='Woman' width='50' height='50'>";
        } else {
            echo "<img src='img/nam.jpg' alt='Man' width='50' height='50'>";
        }
        echo "</td>";
        echo "<td>".$row["Noi_Sinh"]."</td>";
        echo "<td>".$row["Ma_Phong"]."</td>";
        echo "<td>".$row["Luong"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}

// Tính toán số trang
$sql = "SELECT COUNT(*) AS total FROM nhanvien";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$soLuongNhanVien = $row['total'];
$soTrang = ceil($soLuongNhanVien / $soNhanVienTrenTrang);

// Hiển thị phân trang
echo "<div>";
for ($trang = 1; $trang <= $soTrang; $trang++) {
    echo "<a href='index.php?trang=$trang'>$trang</a> ";
}
echo "</div>";

// Đóng kết nối
$conn->close();
?>
