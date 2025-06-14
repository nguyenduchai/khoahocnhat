<?php
require_once 'models/User.php';
require_once 'models/Course.php';
require_once 'models/Purchase.php';

class AdminController
{
  // Kiểm tra đăng nhập admin (ví dụ phân quyền theo email)
  public static function isAdmin()
  {
    return isset($_SESSION['user_email']) && $_SESSION['user_email'] === 'admin@example.com';
  }

  // Lấy danh sách người dùng
  public static function listUsers($conn)
  {
    return User::getAll($conn);
  }

  // Lấy danh sách khóa học
  public static function listCourses($conn)
  {
    return Course::getAll($conn);
  }

  // Thêm khóa học mới
  public static function addCourse($conn, $data)
  {
    return CourseController::create($conn, $data);
  }

  // Xóa khóa học
  public static function deleteCourse($conn, $id)
  {
    return CourseController::delete($conn, $id);
  }

  // Duyệt / từ chối thanh toán
  public static function approvePayment($conn, $purchase_id)
  {
    return Purchase::updateStatus($conn, $purchase_id, 'approved');
  }

  public static function rejectPayment($conn, $purchase_id)
  {
    return Purchase::updateStatus($conn, $purchase_id, 'rejected');
  }

  // Lấy danh sách thanh toán theo trạng thái (pending, approved, rejected)
  public static function listPayments($conn, $status = 'pending')
  {
    return Purchase::getByStatus($conn, $status);
  }
}
