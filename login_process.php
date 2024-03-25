<?php
session_start();

// Kiểm tra xem người dùng đã gửi thông tin đăng nhập hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Kết nối đến cơ sở dữ liệu
    require_once "connect.php"; // Tệp connect.php chứa thông tin kết nối đến cơ sở dữ liệu

    // Lấy dữ liệu từ form đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập với cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];

        // Chuyển hướng đến trang tùy thuộc vào vai trò của người dùng
        if ($_SESSION['role'] === 'admin') {
            header("Location: admin_panel.php");
        } else {
            header("Location: user_dashboard.php"); // Đây là trang tùy chỉnh cho người dùng có vai trò là user
        }
        exit(); // Kết thúc script sau khi chuyển hướng
    } else {
        // Đăng nhập không thành công
        echo "Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.";
    }

    // Đóng kết nối
    $conn->close();
}
?>
