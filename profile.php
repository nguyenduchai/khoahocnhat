<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'includes/config.php';
require_once 'controllers/UserController.php';
require_once 'controllers/CourseController.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$success = '';
$error = '';

// Xử lý cập nhật thông tin nếu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'] ?? null;

    $result = UserController::updateProfile($conn, $userId, $name, $email, $password);
    if ($result === true) {
        $success = "Cập nhật thành công.";
    } else {
        $error = $result;
    }
}

// Lấy thông tin người dùng
$user = UserController::getById($conn, $userId);

// Lấy danh sách khóa học đã mua
$purchasedCourses = CourseController::getCoursesByUser($conn, $userId);

require_once 'views/profile.view.php';
