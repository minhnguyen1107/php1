<?php
    require_once "db.php";
    $sql = "Select * From danhmuc";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    //var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị danh mục</title>
</head>
<body>
    <h2>Danh mục tin</h2>
    <a href="createdanhmuc.php">Thêm</a>
    <?php
        $message = isset($_GET['message'])?$_GET['message']:'';
        echo $message;
    ?>
    <table border="1">
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Ngày tạo danh mục</th>
        </tr>
        <?php foreach ($result as $r) :?>
            <tr>
                <td><?=$r->id?></td>
                <td><?=$r->ten_dm?></td>
                <td><?=$r->ngay_tao?></td>
                <td>
                        <a href="editdanhmuc.php?id=<?=$r->id?>">Edit</a>
                        <a href="deletedanhmuc.php?id=<?=$r->id?>">Delete</a>

                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>
</html>