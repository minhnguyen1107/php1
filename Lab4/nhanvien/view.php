<?php
    require_once "../db.php";
    $sql = "SELECT tblnhanvien.id, firstname, lastname, avatar, dateofbirth, id_card,name FROM tblnhanvien INNER JOIN tblphongban ON tblnhanvien.id_pb = tblphongban.id";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $nhanvien = $stmt->fetchAll(PDO::FETCH_CLASS);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>
<body>
    <h2>Danh sách nhân viên</h2>
    <a href="createnv.php">Thêm nhân viên</a>
    <?php
        $message = isset($_GET['message'])?$_GET['message']:'';
        echo $message;
    ?>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Phòng ban</td>
            <td>Họ</td>
            <td>Tên</td>
            <td>Ảnh</td>
            <td>Ngày sinh</td>
            <td>CMND</td>
           
        </tr>
        
        <?php foreach ($nhanvien as $r):?>
            <tr>
            <td><?=$r->id?></td>
            <td><?=$r->name?></td>
            <td><?=$r->firstname?></td>
            <td><?=$r->lastname?></td>
            <td><img src="../image/<?=$r->avatar?>" alt="" width="30px" height="30px"></td>
            <td><?=$r->dateofbirth?></td>
            <td><?=$r->id_card?></td>
            <td><a href="editnv.php?id=<?=$r->id?>">Sửa</a></td>
            <td><a href="deletenv.php?id=<?=$r->id?>" onclick="return confirm('Bạn có chắc chắn muốn xóa');">Xóa</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>