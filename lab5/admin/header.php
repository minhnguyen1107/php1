<?php
session_start();
 if (!isset($_SESSION['username'])) {
    header("Location:../login.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
</head>
<body>
    <div class="container">
        <header></header>
        <nav>
            <a href="../danhmuc/view.php">Danh mục</a>
            <a href="../sanpham/view.php">Sản phẩm</a>
        </nav>