<?php
require_once 'models/Course.php';

class CourseController
{
     public static function getCoursesByUser($conn, $userId)
    {
        // Truy vấn lấy khóa học đã mua của người dùng
        $stmt = $conn->prepare("
            SELECT c.id, c.title
            FROM purchases p
            JOIN courses c ON p.course_id = c.id
            WHERE p.user_id = ? AND p.status = 'approved'
        ");
        
        // Kiểm tra xem câu truy vấn có thành công hay không
        if ($stmt === false) {
            return "Lỗi truy vấn: " . $conn->error; // Trả về thông báo lỗi nếu prepare thất bại
        }

        // Gắn tham số vào câu truy vấn
        $stmt->bind_param("i", $userId);

        // Thực thi câu truy vấn
        if (!$stmt->execute()) {
            return "Lỗi thực thi câu lệnh SQL: " . $stmt->error;
        }

        // Lấy kết quả và trả về mảng các khóa học
        $result = $stmt->get_result();
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }

        // Trả về kết quả là danh sách khóa học
        return $courses;
    }

    
  // Lấy danh sách tất cả hoặc theo cấp độ (N5, N4, N3, Giao tiếp, v.v.)
  public static function index($conn)
  {
    $level = $_GET['level'] ?? 'all';
    return $level === 'all'
      ? Course::getAll($conn)
      : Course::getByLevel($conn, $level);
  }

  // Lấy chi tiết khóa học theo ID
  public static function show($conn, $id)
    {
        return Course::getById($conn, $id);
    }

  // Thêm một khóa học mới (dành cho admin)
  public static function create($conn, $data)
  {
    $title = trim($data['title'] ?? '');
    $short = trim($data['short_description'] ?? '');
    $desc = trim($data['description'] ?? '');
    $thumb = trim($data['thumbnail'] ?? '');
    $price = (int)($data['price'] ?? 0);
    $level = trim($data['level'] ?? '');

    return Course::create($conn, $title, $short, $desc, $thumb, $price, $level);
  }

  // Xoá khoá học (admin)
  public static function delete($conn, $id)
  {
    return Course::delete($conn, (int)$id);
  }
}
