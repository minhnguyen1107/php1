<?php
    require_once "../data/db.php";
    $id = isset($_GET['id'])?$_GET['id']:'';
    //Cập nhật dữ liệu
    if (isset($_POST['btnCapnhat'])) {
        $sql = "UPDATE danhmuc SET ten_dm=:ten_dm, ngay_cap_nhat=:ngay_cap_nhat WHERE id=:id";
        $stmt = $conn->prepare($sql);
        //Truyền giá trị cho tham số
        $ten_dm = $_POST['ten_dm'];
        $ngay_cap_nhat = date("Y-m-d h:i:s");

        $stmt->bindParam(":ten_dm", $ten_dm);
        $stmt->bindParam(":ngay_cap_nhat", $ngay_cap_nhat);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $message = "Cập nhật dữ liệu thành công";
    }

    //Lấy dữ liệu theo id
    $sql = "SELECT * FROM danhmuc WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh muc</title>
</head>
<body>
    <h2>Cập nhật danh mục</h2>
    <form action="" method="POST">
        <input type="text" name="ten_dm" value="<?=$row['ten_dm']?>" required id="">
        <br>
        <input type="submit" value="Cập nhật" name="btnCapnhat">
    </form>
</body>
</html>