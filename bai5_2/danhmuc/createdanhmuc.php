<?php
    require_once "../data/db.php";
    if (isset($_POST['btnThem'])) {
        $ten_dm = $_POST['ten_dm'];
        $ngay_tao = date("Y-m-d h:i:s");
        $sql = "INSERT INTO danhmuc(ten_dm, ngay_tao) VALUES(:ten_dm, :ngay_tao)";
        //Chuẩn bị
        $stmt = $conn->prepare($sql);
        //Truyền giá trị cho tham số
        $stmt->bindParam(":ten_dm", $ten_dm);
        $stmt->bindParam(":ngay_tao", $ngay_tao);
        //Thực thi
        $stmt->execute();
        //Thông báo
        $message = "Thêm dữ liệu thành công";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
</head>
<body>
    <div>
        <a href="view.php">Danh mục</a>
    </div>
    <h2>Thêm danh mục</h2>
    <div>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
    </div>
    <form action="" method="POST">
        <input type="text" name="ten_dm" placeholder="Nhập tên danh mục" required id="">
        <br>
        <input type="submit" value="Thêm" name="btnThem">
    </form>
</body>
</html>