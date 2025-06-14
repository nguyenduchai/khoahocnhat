<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'includes/config.php';

// Gọi controller lấy danh sách khoá học
$courses = CourseController::index($conn);

// Hiển thị giao diện trang chủ
require_once 'views/home.view.php';
