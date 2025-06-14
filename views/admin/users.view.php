<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý người dùng - Nihongo Learn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-2xl font-bold text-blue-800 mb-6">Danh sách người dùng</h1>

  <div class="overflow-x-auto">
    <table class="table w-full bg-white shadow-md">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Ngày tạo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $user['id'] ?></td>
          <td><?= htmlspecialchars($user['name']) ?></td>
          <td><?= htmlspecialchars($user['email']) ?></td>
          <td><?= $user['created_at'] ?></td>
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
