<header class="navbar bg-white fixed top-0 left-0 right-0 z-50 shadow">
  <div class="container mx-auto px-4 flex justify-between items-center">
    <a href="index.php" class="text-xl font-bold text-blue-900">Nihongo Learn</a>
    <div class="hidden md:flex space-x-4">
      <a href="index.php" class="btn btn-ghost">Trang chủ</a>
      <a href="course.php" class="btn btn-ghost">Khóa học</a>
      <a href="#contact" class="btn btn-ghost">Liên hệ</a>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="profile.php" class="btn btn-ghost">Tài khoản</a>
        <a href="logout.php" class="btn btn-outline btn-error">Đăng xuất</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-outline btn-primary">Đăng nhập</a>
      <?php endif; ?>
    </div>
    <div class="md:hidden">
      <details class="dropdown">
        <summary class="btn btn-ghost">☰</summary>
        <ul class="menu dropdown-content p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="course.php">Khóa học</a></li>
          <li><a href="#contact">Liên hệ</a></li>
          <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="profile.php">Tài khoản</a></li>
            <li><a href="logout.php">Đăng xuất</a></li>
          <?php else: ?>
            <li><a href="login.php">Đăng nhập</a></li>
          <?php endif; ?>
        </ul>
      </details>
    </div>
  </div>
</header>

