<?php
require_once "db.php";
$sql = "SELECT * FROM khachhang";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_CLASS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị danh mục</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h2>Hiển thị danh mục</h2>
    <a  class="btn btn-primary" href="createaccount.php">Thêm khách hàng</a>
    <form action="view.php" method="POST">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Chức năng</th>
            </tr>
            <?php foreach ($result as $r) :?>
            <tr>
                <td><?=$r->id?></td>
                <td><?=$r->name?></td>
                <td><?=$r->account?></td>
                <td><?=$r->email?></td>
                <td><?=$r->password?></td>
                <td><?=$r->address?></td>
                <td>
                    <a class="btn btn-primary" href="editaccount.php?id=<?=$r->id?>">Edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?=$r->id?>" onclick="return confirm('Bạn có chắc chắn muốn xóa');">Delete</a>

                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        
    

    </form>
</body>
</html>