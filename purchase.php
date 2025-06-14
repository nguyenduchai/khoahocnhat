<?php
require_once 'includes/config.php';
require_once 'controllers/PaymentController.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $course_id = $_POST['course_id'] ?? 0;
  $file = $_FILES['receipt'] ?? null;

  if ($file && $file['error'] === UPLOAD_ERR_OK) {
    $result = PaymentController::submit($conn, $_SESSION['user_id'], $course_id, $file);
    $success = $result ? "Gửi thanh toán thành công! Vui lòng đợi admin duyệt." : "Gửi thất bại.";
  } else {
    $error = "Vui lòng chọn tệp hợp lệ.";
  }
}

include 'views/purchase_result.view.php';
