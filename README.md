# 📘 Nihongo Learn - Website Học Tiếng Nhật

Dự án web PHP học tiếng Nhật qua video, hỗ trợ thanh toán thủ công bằng ảnh chuyển khoản, quản trị thủ công đơn hàng và quản lý nội dung khóa học.

---

## 🧰 Công nghệ sử dụng

- PHP thuần (no framework)
- MySQL / MariaDB
- HTML + Tailwind CSS + DaisyUI (CDN)
- Video học: nhúng YouTube
- Watermark động: JavaScript

---

## 📦 Cấu trúc thư mục

```
/ (web root)
├── index.php                  ← Entry point cho trang chủ
├── login.php                 ← Giao diện login
├── logout.php
├── course.php                ← Xem chi tiết 1 khóa học
├── profile.php
├── purchase.php
│
├── controllers/
│   ├── AuthController.php     ← Xử lý login/logout/register
│   ├── CourseController.php   ← Load danh sách khóa học, chi tiết
│   ├── PaymentController.php  ← Xử lý thanh toán
│   └── AdminController.php    ← Admin logic (duyệt, thêm, xoá)
│
├── models/
│   ├── DB.php                 ← Kết nối MySQL
│   ├── User.php              ← Class user, load/sửa
│   ├── Course.php            ← Class course, load, thêm, xoá
│   └── Purchase.php          ← Class cho đơn mua
│
├── views/
│   ├── home.view.php
│   ├── login.view.php
│   ├── course_detail.view.php
│   └── admin/
│       ├── dashboard.view.php
│       ├── users.view.php
│       ├── courses.view.php
│       └── payments.view.php
│
├── includes/
│   ├── config.php
│   └── functions.php
│
├── uploads/                 ← ảnh chuyển khoản
├── assets/js/watermark.js
├── schema.sql
└── README.md
```

---

## 🚀 Cách cài đặt và chạy local

1. **Tải mã nguồn** và copy vào thư mục webserver của bạn (ví dụ: `htdocs/nihongo-learn` nếu dùng XAMPP).

2. **Tạo CSDL** mới tên là `nihongo_learn` trong phpMyAdmin hoặc command-line.

3. **Import CSDL mẫu**:

   Vào phpMyAdmin → chọn database `nihongo_learn` → Import file `schema.sql`

4. **Cấu hình kết nối** trong `includes/config.php`:
```php
const DB_HOST = 'localhost';
const DB_NAME = 'nihongo_learn';
const DB_USER = 'root'; // hoặc user khác nếu cần
const DB_PASS = '';      // nhập password nếu có
```

5. **Mở trình duyệt truy cập**:
   - Trang chủ: [http://localhost/nihongo-learn/index.php](http://localhost/nihongo-learn/index.php)
   - Admin: đăng nhập với tài khoản mẫu trong `schema.sql`
     - Email: `a@example.com`
     - Mật khẩu: `123456`

---

## 👨‍🏫 Tính năng chính

- Đăng ký / Đăng nhập
- Danh sách & chi tiết khóa học
- Mua khóa học bằng upload ảnh chuyển khoản
- Watermark động email học viên trên video (chống quay màn hình)
- Trang quản trị:
  - Quản lý người dùng, khóa học, bài học
  - Duyệt thanh toán thủ công

---

## 📸 Demo giao diện (tham khảo)

> Responsive thiết kế bằng Tailwind + DaisyUI, ưu tiên mobile.

---

## 📄 License

Mã nguồn mẫu phục vụ mục đích học tập, không dùng cho thương mại nếu không có sự cho phép.
