<?php
require_once 'includes/config.php';
require_once 'controllers/AuthController.php';
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $error = AuthController::handleLogin($conn);
}

include 'views/login.view.php';
