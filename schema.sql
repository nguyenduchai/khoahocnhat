-- schema.sql - Tạo cấu trúc CSDL và dữ liệu mẫu cho website Nihongo Learn

CREATE DATABASE IF NOT EXISTS nihongo_learn DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nihongo_learn;

-- Bảng người dùng
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng khóa học
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  short_description TEXT,
  description TEXT,
  thumbnail VARCHAR(255),
  price INT,
  level VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng bài học
CREATE TABLE lessons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  title VARCHAR(255),
  description TEXT,
  youtube_id VARCHAR(100),
  sort_order INT,
  FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Bảng thanh toán / mua khóa học
CREATE TABLE purchases (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  course_id INT,
  image VARCHAR(255),
  is_approved BOOLEAN DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Dữ liệu mẫu
INSERT INTO users (name, email, password) VALUES
('Nguyễn Văn A', 'a@example.com', SHA1('123456')),
('Trần Thị B', 'b@example.com', SHA1('123456'));

INSERT INTO courses (title, short_description, description, thumbnail, price, level) VALUES
('N5 Cơ bản', 'Học từ vựng và ngữ pháp N5', 'Chi tiết bài học cho N5...', 'https://i.imgur.com/n5.png', 490000, 'N5'),
('Giao tiếp cơ bản', 'Tình huống thực tế', 'Học giao tiếp cơ bản hằng ngày...', 'https://i.imgur.com/n5b.png', 390000, 'Giao tiếp');

INSERT INTO lessons (course_id, title, description, youtube_id, sort_order) VALUES
(1, 'Bài 1: Giới thiệu bản thân', 'Cách tự giới thiệu', 'abc123', 1),
(1, 'Bài 2: Ngữ pháp cơ bản', 'Giới thiệu trợ từ wa, ga', 'def456', 2),
(2, 'Bài 1: Mua hàng', 'Hội thoại tại cửa hàng', 'ghi789', 1);
