<?php
// includes/config.php

// Cấu hình database
const DB_HOST = 'localhost';
const DB_NAME = 'thongked_nihongo_learn';
const DB_USER = 'thongked_nihongo_user';
const DB_PASS = 'DucHai96@';

// Khởi động session nếu chưa có
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload class từ models và controllers
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../models/' . $class . '.php',
        __DIR__ . '/../controllers/' . $class . '.php'
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});

// Kết nối CSDL
$conn = DB::connect();

// Múi giờ VN
date_default_timezone_set('Asia/Ho_Chi_Minh');
