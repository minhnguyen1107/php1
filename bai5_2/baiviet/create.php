<?php
    require_once "../data/db.php";
    //Thêm dữ liệu
    if (isset($_POST['btnThem'])) {
        $tieu_de = $_POST['tieu_de'];
        $id_dm = $_POST['id_dm'];
        $mo_ta = $_POST['mo_ta'];
        $noi_dung = $_POST['noi_dung'];
        $hinh = $_FILES['image']['name'];
        $dir = "../images/";
        //SQL
        $sql = "INSERT INTO baiviet SET tieu_de=:tieu_de, id_dm=:id_dm, hinh=:hinh, mo_ta=:mo_ta, noi_dung=:noi_dung";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        $stmt->bindParam(":tieu_de", $tieu_de);
        $stmt->bindParam(":id_dm", $id_dm);
        $stmt->bindParam(":hinh", $hinh);
        $stmt->bindParam(":mo_ta", $mo_ta);
        $stmt->bindParam(":noi_dung", $noi_dung);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
            move_uploaded_file($_FILES['image']['tmp_name'], $dir . $hinh);
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    
    //Load dữ liệu của danh mục
    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết mới</title>
    
</head>
<body>
    <h2>Thêm bài viết</h2>
    <a href="view.php">danh sách bài viết</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="tieu_de" placeholder="Tiêu đề" id="">
        <br>
        <!--Danh mục-->
        <select name="id_dm" id="">
            <?php foreach($result as $r) : ?>
                <option value="<?=$r['id']?>"><?=$r['ten_dm']?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="file" name="image" id="">
        <br>
        <textarea name="mo_ta" id="" cols="30" rows="5" placeholder="Mô tả"></textarea>
        <br>
        <textarea name="noi_dung" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
        <br>
        <input type="submit" value="Thêm" name="btnThem">
    </form>
</body>
</html>