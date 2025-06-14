<?php
class DB
{
  public static function connect()
  {
    // Cấu hình kết nối (nên tách ra file riêng nếu cần bảo mật)
    $host = 'localhost';
    $user = 'thongked_nihongo_user';
    $pass = 'DucHai96@'; // nếu dùng XAMPP, để trống
    $dbname = 'thongked_nihongo_learn';

    // Kết nối MySQL
    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
      die("Lỗi kết nối MySQL: " . $conn->connect_error);
    }

    // Đảm bảo charset UTF-8 cho tiếng Nhật
    $conn->set_charset("utf8mb4");

    return $conn;
  }
}
