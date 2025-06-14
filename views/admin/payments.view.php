<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Duyệt thanh toán - Nihongo Learn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
  <h1 class="text-2xl font-bold text-blue-800 mb-6">Danh sách thanh toán chờ duyệt</h1>

  <div class="grid md:grid-cols-2 gap-6">
    <?php foreach ($payments as $pay): ?>
      <div class="card bg-white shadow-md">
        <div class="card-body">
          <p><strong>Học viên:</strong> <?= htmlspecialchars($pay['user_name']) ?> (<?= $pay['user_email'] ?>)</p>
          <p><strong>Khóa học:</strong> <?= htmlspecialchars($pay['course_title']) ?></p>
          <p><strong>Thời gian gửi:</strong> <?= $pay['created_at'] ?></p>
          <img src="../uploads/<?= htmlspecialchars($pay['image']) ?>" alt="Ảnh chuyển khoản" class="rounded border my-3 max-h-64 object-contain">

          <form action="payments.view.php" method="POST" class="flex gap-2">
            <input type="hidden" name="purchase_id" value="<?= $pay['id'] ?>">
            <button name="action" value="approve" class="btn btn-success btn-sm">Duyệt</button>
            <button name="action" value="reject" class="btn btn-error btn-sm" onclick="return confirm('Từ chối đơn thanh toán này?')">Từ chối</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-6">
    <a href="dashboard.view.php" class="btn btn-outline">← Quay lại Dashboard</a>
  </div>
</div>

</body>
</html>
