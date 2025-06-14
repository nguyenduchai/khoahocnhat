<?php

// Hiển thị lỗi khi debug (tắt khi đưa lên production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load cấu hình + autoload
require_once 'includes/config.php';
require_once 'controllers/CourseController.php';

// Lấy ID khóa học từ query string, ép kiểu số nguyên an toàn
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Lấy thông tin khóa học
$course = CourseController::show($conn, $id);

// Nếu không tìm thấy khóa học, chuyển hướng về trang chủ
if (!$course) {
    header('Location: index.php');
    exit;
}

// Gọi giao diện chi tiết
require_once 'views/course_detail.view.php';
