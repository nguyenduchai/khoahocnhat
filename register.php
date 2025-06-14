<?php
require_once 'includes/config.php';
require_once 'controllers/AuthController.php';

// Nếu người dùng đã đăng nhập → chuyển về trang chủ
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$errors = [];
$success = false;

// Xử lý form đăng ký
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    // Kiểm tra đầu vào
    if ($password !== $confirm) {
        $errors[] = "Mật khẩu xác nhận không khớp.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Mật khẩu tối thiểu 6 ký tự.";
    }

    // Nếu không có lỗi, tiến hành đăng ký
    if (empty($errors)) {
        $result = AuthController::register($conn, $name, $email, $password);

        if ($result === true) {
            $success = true;
        } else {
            $errors[] = $result;
        }
    }
}

require_once 'views/register.view.php';
