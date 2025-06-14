<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý khóa học - Nihongo Learn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-2xl font-bold text-blue-800 mb-6">Danh sách khóa học</h1>

  <a href="add_course.php" class="btn btn-primary mb-4">+ Thêm khóa học</a>

  <div class="overflow-x-auto">
    <table class="table w-full bg-white shadow-md">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tiêu đề</th>
          <th>Giá</th>
          <th>Level</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($courses as $course): ?>
        <tr>
          <td><?= $course['id'] ?></td>
          <td><?= htmlspecialchars($course['title']) ?></td>
          <td><?= number_format($course['price']) ?>đ</td>
          <td><?= htmlspecialchars($course['level']) ?></td>
          <td>
            <a href="edit_course.php?id=<?= $course['id'] ?>" class="btn btn-sm btn-outline btn-info">Sửa</a>
            <a href="delete_course.php?id=<?= $course['id'] ?>" onclick="return confirm('Xoá khóa học này?')" class="btn btn-sm btn-outline btn-error ml-2">Xoá</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    <a href="dashboard.view.php" class="btn btn-outline">← Quay lại Dashboard</a>
  </div>
</div>

</body>
</html>
