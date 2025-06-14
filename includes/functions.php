<?php
// includes/functions.php

// Kiểm tra người dùng đã đăng nhập chưa
function isLoggedIn()
{
  return isset($_SESSION['user_id']);
}

// Lấy ID người dùng hiện tại
function currentUserId()
{
  return $_SESSION['user_id'] ?? null;
}

// Escape HTML đầu ra
function e($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// Hiển thị flash message và xoá sau khi hiển thị
function flash($key)
{
  if (!empty($_SESSION['flash'][$key])) {
    $msg = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return '<div class="alert alert-info">' . e($msg) . '</div>';
  }
  return '';
}
