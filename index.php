<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Đây là file chạy chính (Là nơi chúng require các file)
require_once "./env.php";    // Chứa các biến môi trường

require_once "./vendor/autoload.php";
// Không cần require controller và model


// // Use các class mà ta muốn sử dụng
// use App\Controllers\CustomerController;

// // Route (Điều hướng)
// $act = $_GET['act'] ?? '/';

// match ($act) {
//     // Nơi khai báo các đường dẫn
//     '/' => (new CustomerController())->index(),
// };
require_once "./routes/routes.php";