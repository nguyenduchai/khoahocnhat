<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Trang chủ - Học tiếng Nhật</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Header -->
<header class="navbar bg-white fixed top-0 left-0 right-0 z-50 shadow">
  <div class="container mx-auto px-4 flex justify-between items-center">
    <a href="index.php" class="brand">Nihongo Learn</a>
    <div class="hidden md:flex space-x-4">
      <a href="index.php" class="btn btn-ghost">Trang chủ</a>
      <a href="course.php" class="btn btn-ghost">Khóa học</a>
      <a href="#contact" class="btn btn-ghost">Liên hệ</a>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="login.php" class="btn btn-outline btn-primary">Đăng nhập</a>
      <?php else: ?>
        <a href="logout.php" class="btn btn-outline btn-error">Đăng xuất</a>
      <?php endif; ?>
    </div>
    <div class="md:hidden">
      <details class="dropdown">
        <summary class="btn btn-ghost">☰</summary>
        <ul class="menu dropdown-content p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="course.php">Khóa học</a></li>
          <li><a href="#contact">Liên hệ</a></li>
          <?php if (!isset($_SESSION['user_id'])): ?>
            <li><a href="login.php">Đăng nhập</a></li>
          <?php else: ?>
            <li><a href="logout.php">Đăng xuất</a></li>
          <?php endif; ?>
        </ul>
      </details>
    </div>
  </div>
</header>

<!-- Hero Section -->
<section class="pt-24 pb-12 bg-gradient-to-r from-red-100 via-white to-blue-100 text-center">
  <div class="container mx-auto px-4">
    <h1 class="text-4xl md:text-5xl font-bold text-red-700 mb-4">Học tiếng Nhật từ con số 0 đến JLPT N1</h1>
    <p class="text-lg mb-6">Khóa học online chất lượng, giảng viên N1, học mọi lúc mọi nơi</p>
    <a href="#courses" class="btn btn-primary btn-lg">Xem khóa học</a>
  </div>
</section>

<!-- Bộ lọc cấp độ -->
<section class="py-6" id="courses">
  <div class="container mx-auto px-4 text-center">
    <div class="inline-flex flex-wrap gap-2 justify-center">
      <?php
        $levels = ['all' => 'Tất cả', 'N5' => 'N5', 'N4' => 'N4', 'N3' => 'N3', 'Giao tiếp' => 'Giao tiếp', 'Luyện thi' => 'Luyện thi JLPT'];
        foreach ($levels as $key => $label): 
      ?>
        <a href="?level=<?= urlencode($key) ?>" class="btn btn-sm <?= ($_GET['level'] ?? 'all') === $key ? 'btn-primary' : 'btn-outline' ?>"><?= $label ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Danh sách khóa học nổi bật -->
<section class="py-4">
  <div class="container mx-auto px-4 grid md:grid-cols-3 gap-6">
    <?php foreach ($courses as $course): ?>
      <div class="card bg-base-100 shadow-md">
        <figure><img src="<?= htmlspecialchars($course['thumbnail']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="object-cover h-40 w-full"></figure>
        <div class="card-body">
          <h2 class="card-title text-blue-900"><?= htmlspecialchars($course['title']) ?></h2>
          <p><?= htmlspecialchars($course['short_description']) ?></p>
          <div class="mt-2 text-red-600 font-semibold"><?= number_format($course['price']) ?>đ</div>
          <div class="card-actions justify-end mt-4">
            <a href="course.php?id=<?= $course['id'] ?>" class="btn btn-sm btn-outline btn-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Lợi ích -->
<section class="py-10 bg-blue-50">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold text-center text-blue-900 mb-6">Lợi ích khi học tại Nihongo Learn</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
      <div><div class="text-4xl">🕐</div><p>Học mọi lúc, mọi nơi</p></div>
      <div><div class="text-4xl">🎥</div><p>Video chất lượng cao</p></div>
      <div><div class="text-4xl">👨‍🏫</div><p>Giảng viên giàu kinh nghiệm</p></div>
      <div><div class="text-4xl">💰</div><p>Học phí tiết kiệm</p></div>
    </div>
  </div>
</section>

<!-- Feedback -->
<section class="py-10 bg-white">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold text-center mb-6">Cảm nhận học viên</h2>
    <div class="grid md:grid-cols-3 gap-4">
      <div class="card bg-base-100 shadow">
        <div class="card-body">
          <p>"Khóa học dễ hiểu, giảng viên dạy cực kỳ nhiệt tình!"</p>
          <div class="mt-4 text-sm text-gray-500">– Minh Anh</div>
        </div>
      </div>
      <div class="card bg-base-100 shadow">
        <div class="card-body">
          <p>"Tôi đã đậu JLPT N3 sau 6 tháng nhờ khóa học này."</p>
          <div class="mt-4 text-sm text-gray-500">– Tuấn</div>
        </div>
      </div>
      <div class="card bg-base-100 shadow">
        <div class="card-body">
          <p>"Nội dung cập nhật mới, dễ tiếp thu và tiết kiệm thời gian!"</p>
          <div class="mt-4 text-sm text-gray-500">– Hằng</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA cuối trang -->
<section class="py-12 bg-blue-900 text-white text-center">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl md:text-3xl font-bold mb-4">Bạn đã sẵn sàng học tiếng Nhật?</h2>
    <a href="login.php" class="btn btn-primary btn-lg">Tạo tài khoản miễn phí</a>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gray-100 text-center py-8 text-sm" id="contact">
  <p class="font-semibold">Nihongo Learn</p>
  <p>Liên hệ: contact@example.com | Facebook | Zalo</p>
  <p><a href="#" class="underline">Điều khoản</a> | <a href="#" class="underline">Chính sách bảo mật</a></p>
  <p>© <?= date('Y') ?> Nihongo Learn</p>
</footer>

</body>
</html>
