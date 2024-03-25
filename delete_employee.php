<?php
require_once "connect.php"; // Đảm bảo rằng tệp connect.php đã được bao gồm

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Lấy ID của nhân viên cần xoá
    $id = $_GET['id'];

    // Xoá dữ liệu từ cơ sở dữ liệu
    $sql = "DELETE FROM nhanvien WHERE Ma_NV='$id'";
    
    if ($conn->query($sql) === TRUE) {
        // Xoá thành công, chuyển hướng lại trang trước đó
        header("Location: admin_panel.php");
        exit(); // Kết thúc kịch bản
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

