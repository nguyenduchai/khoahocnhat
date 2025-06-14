<?php
class User
{
  // Tìm người dùng theo email
  public static function findByEmail($conn, $email)
  {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  // Tìm người dùng theo ID
  public static function getById($conn, $id)
  {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  // Tạo người dùng mới
  public static function create($conn, $name, $email, $hashedPassword)
  {
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);
    return $stmt->execute();
  }

  // Cập nhật thông tin cá nhân
  public static function updateProfile($conn, $id, $name, $email)
  {
    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);
    return $stmt->execute();
  }

  // Cập nhật mật khẩu
  public static function updatePassword($conn, $id, $hashedPassword)
  {
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashedPassword, $id);
    return $stmt->execute();
  }

  // Trả về danh sách toàn bộ user (dành cho admin)
  public static function getAll($conn)
  {
    return $conn->query("SELECT id, name, email, created_at FROM users ORDER BY id DESC");
  }
}
