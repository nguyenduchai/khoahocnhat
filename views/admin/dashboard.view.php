<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Nihongo Learn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-3xl font-bold text-blue-900 mb-6">Bảng điều khiển Admin</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="users.view.php" class="card bg-white shadow hover:shadow-md transition p-6">
      <div class="text-xl font-semibold">👥 Quản lý người dùng</div>
      <p class="text-sm text-gray-600 mt-2">Xem và chỉnh sửa thông tin người dùng.</p>
    </a>
    <a href="courses.view.php" class="card bg-white shadow hover:shadow-md transition p-6">
      <div class="text-xl font-semibold">📚 Quản lý khóa học</div>
      <p class="text-sm text-gray-600 mt-2">Thêm, sửa, xóa các khóa học.</p>
    </a>
    <a href="payments.view.php" class="card bg-white shadow hover:shadow-md transition p-6">
      <div class="text-xl font-semibold">💳 Duyệt thanh toán</div>
      <p class="text-sm text-gray-600 mt-2">Xem ảnh chuyển khoản và duyệt đơn hàng.</p>
    </a>
  </div>

  <div class="mt-8">
    <a href="../index.php" class="btn btn-outline">← Về trang chính</a>
    <a href="../logout.php" class="btn btn-error ml-2">Đăng xuất</a>
  </div>
</div>

</body>
</html>
