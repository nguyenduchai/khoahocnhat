<?php
require_once 'models/User.php';

class AuthController
{
  // Xử lý đăng nhập
  public static function handleLogin($conn)
  {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
      return "Vui lòng nhập đầy đủ email và mật khẩu.";
    }

    $user = User::findByEmail($conn, $email);

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_email'] = $user['email'];
      $_SESSION['user_name'] = $user['name'];
      header('Location: index.php');
      exit;
    }

    return "Sai email hoặc mật khẩu.";
  }

  // Xử lý đăng ký người dùng mới
 public static function register($conn, $name, $email, $password)
{
    // Kiểm tra email đã tồn tại chưa
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        return "Email đã tồn tại trong hệ thống.";
    }

    // Mã hóa mật khẩu và lưu vào CSDL
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed);

    if ($stmt->execute()) {
        return true;
    } else {
        return "Lỗi đăng ký. Vui lòng thử lại.";
    }
}


  // Xử lý đăng xuất
  public static function logout()
  {
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
  }
}
