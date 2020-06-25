<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=assignment; charset=utf8", "root", "");
    //echo "Kết nối dữ liệu thành công";
} catch (PDOException $e){
    echo "Kết nối dữ liệu thất bại: " . $e->getMessage();
}