<?php
    require_once "../db.php";
    $sql = "SELECT * FROM tblphongban";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (isset($_POST['btnThem'])) {
        $firstname = $_POST['firstname'];
        $id_pb = $_POST['id_pb'];
        $lastname = $_POST['lastname'];
        $avatar = $_FILES['avatar']['name'];
        $birthday = $_POST['birthday'];
        $id_card = $_POST['id_card'];
        $dir = "../image/";

        $sql = "INSERT INTO tblnhanvien SET firstname=:firstname, id_pb=:id_pb, lastname=:lastname, avatar=:avatar, dateofbirth=:birthday, id_card=:id_card";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":id_pb", $id_pb);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":avatar", $avatar);
        $stmt->bindParam(":birthday", $birthday);
        $stmt->bindParam(":id_card", $id_card);

        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
            move_uploaded_file($_FILES['avatar']['tmp_name'], $dir . $avatar);
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
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($message)) {
        echo $message;
    }

    ?>
    <h2>Thêm nhân viên</h2>
    <a href="view.php">Trở về trang chủ</a>
    <form action="createnv.php" method="POST" enctype="multipart/form-data">
        <select name="id_pb">
            <?php foreach($result as $r) :?>
                <option value="<?=$r['id']?>"><?=$r['name']?></option>
            <?php endforeach ;?>
        </select>  
        <br>
        <input type="text" name="firstname" placeholder="Nhập họ nhân viên">
        <br>
        <input type="text" name="lastname" placeholder="Nhập tên nhân viên">
        <br>
        <input type="file" name="avatar">
        <br>
        <input type="text" name="birthday" placeholder="Nhập ngày sinh">
        <br>
        <input type="number" name="id_card" placeholder="Nhập số CMND">
        <input type="submit" name="btnThem" value="Lưu">
    </form>
</body>
</html>