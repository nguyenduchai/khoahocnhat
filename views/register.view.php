<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký tài khoản</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui@latest"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

  <div class="min-h-screen flex flex-col items-center justify-center px-4">
    <div class="w-full max-w-md bg-white p-6 rounded shadow">
      <h2 class="text-2xl font-bold mb-4 text-center text-blue-800">Tạo tài khoản</h2>

      <?php if ($success): ?>
        <div class="alert alert-success mb-4">🎉 Đăng ký thành công! <a href="login.php" class="underline">Đăng nhập</a></div>
      <?php endif; ?>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-error mb-4">
          <ul class="list-disc list-inside text-sm">
            <?php foreach ($errors as $error): ?>
              <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="post" class="space-y-4">
        <input type="text" name="name" class="input input-bordered w-full" placeholder="Họ và tên" required>
        <input type="email" name="email" class="input input-bordered w-full" placeholder="Email" required>
        <input type="password" name="password" class="input input-bordered w-full" placeholder="Mật khẩu" required>
        <input type="password" name="confirm_password" class="input input-bordered w-full" placeholder="Xác nhận mật khẩu" required>

        <button class="btn btn-primary w-full">Đăng ký</button>
        <div class="text-sm text-center mt-2">
          Đã có tài khoản? <a href="login.php" class="underline text-blue-600">Đăng nhập</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
