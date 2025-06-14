<?php
class Purchase
{
  // Tạo đơn thanh toán mới (sau khi upload ảnh)
  public static function create($conn, $user_id, $course_id, $filename)
  {
    $stmt = $conn->prepare("INSERT INTO purchases (user_id, course_id, image, status) VALUES (?, ?, ?, 'pending')");
    $stmt->bind_param("iis", $user_id, $course_id, $filename);
    return $stmt->execute();
  }

  // Cập nhật trạng thái đơn thanh toán
  public static function updateStatus($conn, $id, $status)
  {
    $stmt = $conn->prepare("UPDATE purchases SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    return $stmt->execute();
  }

  // Lấy danh sách đơn theo trạng thái (pending, approved, rejected)
  public static function getByStatus($conn, $status)
  {
    $stmt = $conn->prepare("
      SELECT purchases.*, users.name AS user_name, courses.title AS course_title
      FROM purchases
      JOIN users ON purchases.user_id = users.id
      JOIN courses ON purchases.course_id = courses.id
      WHERE purchases.status = ?
      ORDER BY purchases.id DESC
    ");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    return $stmt->get_result();
  }

  // Lấy tất cả đơn hàng theo user (học viên xem khoá đã mua)
  public static function getByUser($conn, $user_id)
  {
    $stmt = $conn->prepare("
      SELECT purchases.*, courses.title, courses.thumbnail, courses.level
      FROM purchases
      JOIN courses ON purchases.course_id = courses.id
      WHERE purchases.user_id = ? AND purchases.status = 'approved'
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result();
  }

  // Kiểm tra user đã mua khoá học cụ thể chưa
  public static function hasPurchased($conn, $user_id, $course_id)
  {
    $stmt = $conn->prepare("SELECT id FROM purchases WHERE user_id = ? AND course_id = ? AND status = 'approved' LIMIT 1");
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() !== null;
  }
}
