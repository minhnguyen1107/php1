<?php
     require_once "db.php";
     if (isset($_POST['btnthem'])) {
         $ten_dm = $_POST['ten_dm'];
         $ngay_tao = date("y-m-d h:i:s");
         $sql = "INSERT INTO danhmuc(ten_dm, ngay_tao) VALUES (:ten_dm, :ngay_tao)";
         //Chuẩn bị
         $stmt = $conn->prepare($sql);
         //Truyền giá trị cho tham số đã tạo;
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
    <title>Document</title>
</head>
<body>
    <h2>Thêm danh mục</h2>
    <div>
        <?php
             if (isset($message)) {
                echo $message;
            }
        ?>
    </div>
    <form action="createdanhmuc.php" method="post">
        <input type="text" name="ten_dm" placeholder="Nhập tên danh mục" id="">
        <br>
        <input type="submit" value="Thêm" name="btnthem">
    </form>
</body>
</html>