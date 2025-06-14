<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập - Nihongo Learn</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-white text-gray-800 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md p-8 space-y-6 bg-white border rounded-lg shadow-md">
  <h2 class="text-2xl font-bold text-center text-blue-800">Đăng nhập tài khoản</h2>

  <?php if (!empty($error)): ?>
    <div class="alert alert-error text-sm text-white">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form action="login.php" method="POST" class="space-y-4">
    <div class="form-control">
      <label class="label"><span class="label-text">Email</span></label>
      <input type="email" name="email" class="input input-bordered w-full" required>
    </div>
    <div class="form-control">
      <label class="label"><span class="label-text">Mật khẩu</span></label>
      <input type="password" name="password" class="input input-bordered w-full" required>
    </div>
    <button type="submit" class="btn btn-primary w-full">Đăng nhập</button>
  </form>

  <p class="text-sm text-center">Chưa có tài khoản? <a href="register.php" class="link link-primary">Đăng ký ngay</a></p>
  <p class="text-center mt-2">
    <a href="index.php" class="text-blue-600 underline">← Về trang chủ</a>
  </p>
</div>

</body>
</html>
