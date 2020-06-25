<?php
require_once "db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM danhmuc WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    if ($stmt->execute())  {
        //Trở lại trang view khi xóa xong dữ liệu
        $message = "Xóa dữ liệu thành công";
        header("Location:view.php?message=" .$message);
    } else {
        echo "Không thể xóa dữ liệu";
    }


    
}