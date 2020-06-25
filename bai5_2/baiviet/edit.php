<?php
    require_once "../data/db.php";

    //Lấy id trên url
    $id = $_GET['id'];
    if (isset($_POST['btnSua'])) {
        $tieu_de = $_POST['tieu_de'];
        $id_dm = $_POST['id_dm'];
        $mo_ta = $_POST['mo_ta'];
        $noi_dung = $_POST['noi_dung'];
        $anh = isset($_POST['anh']) ? $_POST['anh'] : '';
        $uploadOk = false;
        if ($_FILES['image']['size'] > 0) {
            $uploadOk = true;
            $hinh = $_FILES['image']['name'];
        }
        
        $dir = "../images/";
        //SQL
        $sql = "UPDATE baiviet SET tieu_de=:tieu_de, id_dm=:id_dm, hinh=:hinh, mo_ta=:mo_ta, noi_dung=:noi_dung WHERE id=:id";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        if ($uploadOk == true) {
            $hinh = $hinh;
        } else {
            $hinh = $anh;
        }
        $stmt->bindParam(":tieu_de", $tieu_de);
        $stmt->bindParam(":id_dm", $id_dm);
        $stmt->bindParam(":hinh", $hinh);
        $stmt->bindParam(":mo_ta", $mo_ta);
        $stmt->bindParam(":noi_dung", $noi_dung);
        $stmt->bindParam(":id", $id);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
            if ($uploadOk == true) {
                move_uploaded_file($_FILES['image']['tmp_name'], $dir . $hinh);
            }
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    //Lấy dữ liệu có id là $id
    $sql = "SELECT * FROM baiviet WHERE id=:id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Truyền giá trị cho tham số :id
    $stmt->bindParam(':id', $id);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Lấy danh mục
    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết mới</title>
    
</head>
<body>
    <h2>Sửa bài viết</h2>
    <a href="view.php">danh sách bài viết</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="tieu_de" value="<?=$result[0]['tieu_de']?>" id="">
        <br>
        <!--Danh mục-->
        <select name="id_dm" id="">
            <?php foreach ($danhmuc as $d) : ?>
                <?php if ($d['id'] == $result[0]['id_dm']) : ?>
                    <option value="<?=$d['id']?>" selected><?=$d['ten_dm']?></option>
                <?php else : ?>
                    <option value="<?=$d['id']?>"><?=$d['ten_dm']?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <?php if ($result[0]['hinh'] != ""): ?>
            <img src="../images/<?=$result[0]['hinh']?>" width="220" alt="">
            <input type="hidden" name="anh" value="<?=$result[0]['hinh']?>">
        <?php endif ?>
        <br>
        <input type="file" name="image" id="">
        <br>
        <textarea name="mo_ta" id="" cols="30" rows="5" placeholder="Mô tả"><?=$result[0]['mo_ta']?></textarea>
        <br>
        <textarea name="noi_dung" id="" cols="30" rows="10" placeholder="Nội dung"><?=$result[0]['noi_dung']?></textarea>
        <br>
        <input type="submit" value="Sửa" name="btnSua">
    </form>
</body>
</html>