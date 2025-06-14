<?php
class Course
{
  // Lấy tất cả khóa học
  public static function getAll($conn)
  {
    return $conn->query("SELECT * FROM courses ORDER BY id DESC");
  }

  // Lấy khóa học theo cấp độ (N5, N4, N3, Giao tiếp,...)
  public static function getByLevel($conn, $level)
  {
    $stmt = $conn->prepare("SELECT * FROM courses WHERE level = ? ORDER BY id DESC");
    $stmt->bind_param("s", $level);
    $stmt->execute();
    return $stmt->get_result();
  }

  // Lấy chi tiết một khóa học theo ID
  public static function getById($conn, $id)
  {
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  // Thêm khóa học mới (admin)
  public static function create($conn, $title, $short, $desc, $thumb, $price, $level)
  {
    $stmt = $conn->prepare("INSERT INTO courses (title, short_description, description, thumbnail, price, level) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $title, $short, $desc, $thumb, $price, $level);
    return $stmt->execute();
  }

  // Xóa khóa học theo ID (admin)
  public static function delete($conn, $id)
  {
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }

  // Cập nhật thông tin khóa học (tùy chọn mở rộng)
  public static function update($conn, $id, $title, $short, $desc, $thumb, $price, $level)
  {
    $stmt = $conn->prepare("UPDATE courses SET title=?, short_description=?, description=?, thumbnail=?, price=?, level=? WHERE id=?");
    $stmt->bind_param("ssssisi", $title, $short, $desc, $thumb, $price, $level, $id);
    return $stmt->execute();
  }
}
