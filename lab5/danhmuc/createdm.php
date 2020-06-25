<?php
    require_once "../data/db.php";
    //Thêm dữ liệu
    if (isset($_POST['btnThem'])) {
        $name = $_POST['name'];
        //SQL
        $sql = "INSERT INTO categories SET name=:name";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        $stmt->bindParam(":name", $name);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục sản phẩm mới</title>
    
</head>
<body>
    <h2>Thêm danh mụcsản phẩm</h2>
    <a href="view.php">Danh sách danh mục Sản phẩm</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="createdm.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Tên danh mục sản phẩm" id="">
        <input type="submit" value="Thêm" name="btnThem">
    </form>
</body>
</html>