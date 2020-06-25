<?php
    require_once "../db.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM tblnhanvien WHERE id=:id ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
       
        if ($stmt->execute()) {
            $message = "Xóa thành công";
            header("Location:view.php?message=" .$message);

        } else {
            echo "Không thể xóa dữ liệu";
        }

    }
?>