<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($course['title']) ?> - Chi tiết khóa học</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Header (reusable include if needed) -->
<!-- codex/hiển-thị-menu-cho-admin -->
<header class="navbar bg-white shadow-md sticky top-0 z-40">
  <div class="container mx-auto px-4 flex justify-between items-center py-2">
<!-- <<<<<<< codex/thiết-kế-lại-css-theo-hướng-hiện-đại -->
    <a href="index.php" class="brand">Nihongo Learn</a>
    <a href="index.php" class="btn btn-ghost">Trang chủ</a>
<!-- ======= -->
    <a href="index.php" class="text-xl font-bold text-blue-900">Nihongo Learn</a>
    <div class="space-x-2">
      <a href="index.php" class="btn btn-ghost">Trang chủ</a>
      <?php if (AdminController::isAdmin()): ?>
        <a href="views/admin/dashboard.view.php" class="btn btn-ghost">Quản trị</a>
      <?php endif; ?>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="login.php" class="btn btn-outline btn-primary">Đăng nhập</a>
      <?php else: ?>
        <a href="logout.php" class="btn btn-outline btn-error">Đăng xuất</a>
      <?php endif; ?>
    </div>
<!-- >>>>>>> main -->
  </div>
</header>
=======
<?php include __DIR__ . '/partials/header.php'; ?>
<!-- main -->

<!-- Course Detail Section -->
<main class="container mx-auto px-4 py-8">
  <div class="grid md:grid-cols-2 gap-8">
    <div>
      <img src="<?= htmlspecialchars($course['thumbnail']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="rounded shadow">
    </div>
    <div>
      <h1 class="text-3xl font-bold text-blue-800 mb-2"><?= htmlspecialchars($course['title']) ?></h1>
      <p class="mb-4 text-gray-700"><?= nl2br(htmlspecialchars($course['description'])) ?></p>
      <p class="text-red-600 font-semibold text-lg mb-4">Giá: <?= number_format($course['price']) ?>đ</p>

      <?php if ($isPurchased): ?>
        <div class="aspect-video mb-4">
          <iframe src="https://www.youtube.com/embed/<?= $firstLessonYouTubeId ?>" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
        </div>
        <script src="assets/js/watermark.js"></script>
      <?php elseif (isset($_SESSION['user_id'])): ?>
        <form action="purchase.php" method="POST" enctype="multipart/form-data" class="space-y-4">
          <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
          <div>
            <label class="block mb-1">Ảnh xác nhận chuyển khoản:</label>
            <input type="file" name="payment_image" accept="image/*" class="file-input file-input-bordered w-full" required>
          </div>
          <button type="submit" class="btn btn-primary">Gửi xác nhận thanh toán</button>
        </form>
      <?php else: ?>
        <p>Vui lòng <a href="login.php" class="link link-primary">đăng nhập</a> để mua khóa học này.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Danh sách bài học -->
  <?php if ($isPurchased): ?>
    <div class="mt-10">
      <h2 class="text-xl font-bold mb-4">Danh sách bài học</h2>
      <ul class="space-y-2">
        <?php foreach ($lessons as $lesson): ?>
          <li class="border p-4 rounded shadow-sm">
            <h3 class="font-semibold text-blue-700"><?= htmlspecialchars($lesson['title']) ?></h3>
            <p class="text-sm text-gray-600 mb-2"><?= htmlspecialchars($lesson['description']) ?></p>
            <div class="aspect-video">
              <iframe src="https://www.youtube.com/embed/<?= htmlspecialchars($lesson['youtube_id']) ?>" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
</main>

</body>
</html>
