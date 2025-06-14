<?php
require_once 'models/Purchase.php';

class PaymentController
{
  // Xử lý gửi thanh toán (học viên upload ảnh)
  public static function submit($conn, $user_id, $course_id, $file)
  {
    $upload_dir = 'uploads/';
    $filename = uniqid() . '_' . basename($file['name']);
    $target_path = $upload_dir . $filename;

    // Kiểm tra và upload file ảnh
    if (move_uploaded_file($file['tmp_name'], $target_path)) {
      return Purchase::create($conn, $user_id, $course_id, $filename);
    }

    return false;
  }

  // Admin duyệt thanh toán
  public static function approve($conn, $purchase_id)
  {
    return Purchase::updateStatus($conn, $purchase_id, 'approved');
  }

  // Admin từ chối thanh toán
  public static function reject($conn, $purchase_id)
  {
    return Purchase::updateStatus($conn, $purchase_id, 'rejected');
  }

  // Lấy danh sách đơn chờ duyệt
  public static function pendingList($conn)
  {
    return Purchase::getByStatus($conn, 'pending');
  }
}
