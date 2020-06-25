<?php
    require_once "../db.php";
    $id = $_GET['id'];
    if (isset($_POST['btnSua'])) {
        $id_pb = $_POST['id_pb'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dateofbirth = $_POST['dateofbirth'];
        $anh = isset($_POST['anh']) ? $_POST['anh'] : '';
        $uploadavatar = false;
        $id_card = $_POST['id_card'];
        if ($_FILES['image']['size']>0) {
            $uploadavatar = true;
            $avatar = $_FILES['image']['name'];
        }
        $dir = "../image/";

        $sql = "UPDATE tblnhanvien SET id_pb=:id_pb, firstname=:firstname, lastname=:lastname, avatar=:avatar, dateofbirth=:dateofbirth, id_card=:id_card WHERE id=:id";

        $stmt = $conn->prepare($sql);
        
        if($uploadavatar == true) {
            $avatar = $avatar;
        } else {
            $avatar = $anh;
        }
        $stmt->bindParam(":id_pb", $id_pb);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":avatar", $avatar);
        $stmt->bindParam(":dateofbirth", $dateofbirth);
        $stmt->bindParam(":id_card", $id_card);
        $stmt->bindParam(":id", $id);

        if($stmt->execute()) {
            $message = "Sửa dự liệu thành công";
            if($uploadavatar == true) {
                move_uploaded_file($_FILES['image']['tmp_name'], $dir . $avatar);

            } 
            } else {
                $message = "Sửa dữ liệu thất bại";
        }
        


    }
  
    $sql = "SELECT * FROM tblnhanvien WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $nhanvien = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM tblphongban";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $phongban = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin nhân viên</title>
</head>
<body>
    <?php if (isset($message)) : ?>
            <div>
                <?php echo $message ?>
            </div>
    <?php endif ; ?>
    <h2>Sửa thông tin nhân viên</h2>
    <a href="view.php">Trở về trang chủ</a>
    <form action="" enctype="multipart/form-data" method="POST">
    <select name="id_pb">
        <?php foreach  ($phongban as $n) :?>
            <?php if($n['id'] == $phongban[0]['id_pb']) :?>
                <option value="<?=$n['id']?>" selected="<?=$n['name']?>"></option>
            <?php else : ?>
                <option value="<?=$n['id']?>"><?=$n['name']?></option>
            <?php endif ; ?>
        <?php endforeach ; ?>
    </select>
    Họ tên nhân viên:<input type="text" name="firstname" value="<?=$nhanvien[0]['firstname']?>" placeholder="Sửa họ nhân viên">
    <br>
    Tên nhân viên:<input type="text" name="lastname" value="<?=$nhanvien[0]['lastname']?>" placeholder="Sửa tên nhân viên">
    <br>
    <?php if($nhanvien[0]['avatar'] !="") :?>
        <img src="../image/<?=$nhanvien[0]['avatar']?>" width="200" height="200">
        <input type="hidden" name="anh" value="<?=$nhanvien[0]['avatar']?>">
    <?php endif ;?>
    <br>
    Ảnh mới nhân viên:<input type="file" value="" name="image">
    <br>
    Ngày sinh:<input type="text" value="<?=$nhanvien[0]['dateofbirth']?>" name="dateofbirth">
    <br>
    Số CMND:<input type="number" value="<?=$nhanvien[0]['id_card']?>" name="id_card">
    <br>
    <input type="submit" value="Cập nhật" name="btnSua">



    </form>
    
</body>
</html>