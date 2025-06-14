<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Tài khoản của tôi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui@latest"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

  <!-- Header -->
  <?php include 'partials/header.php'; ?>

  <div class="container mx-auto px-4 pt-24 pb-10 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">Thông tin tài khoản</h2>

    <?php if (!empty($success)): ?>
      <div class="alert alert-success mb-4"><?= $success ?></div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="alert alert-error mb-4"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" class="space-y-4 bg-white p-6 rounded shadow">
      <div>
        <label class="block mb-1 font-semibold">Họ và tên</label>
        <input type="text" name="name" class="input input-bordered w-full" value="<?= htmlspecialchars($user['name']) ?>" required>
      </div>

      <div>
        <label class="block mb-1 font-semibold">Email</label>
        <input type="email" name="email" class="input input-bordered w-full" value="<?= htmlspecialchars($user['email']) ?>" required>
      </div>

      <div>
        <label class="block mb-1 font-semibold">Mật khẩu mới (nếu muốn đổi)</label>
        <input type="password" name="password" class="input input-bordered w-full">
      </div>

      <button class="btn btn-primary">Cập nhật</button>
    </form>

    <hr class="my-8">

    <h3 class="text-xl font-bold mb-2">Khóa học đã mua</h3>
    <ul class="space-y-2">
      <?php if (!empty($purchasedCourses)): ?>
        <?php foreach ($purchasedCourses as $course): ?>
          <li class="p-3 bg-white rounded shadow flex justify-between items-center">
            <span><?= htmlspecialchars($course['title']) ?></span>
            <a href="course.php?id=<?= $course['id'] ?>" class="btn btn-sm btn-outline btn-primary">Xem</a>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li>Chưa có khóa học nào được mua.</li>
      <?php endif; ?>
    </ul>
  </div>

</body>
</html>
