<?php
require_once "db.php";
$id = isset($_GET['id'])?$_GET['id']:'';
if (isset($_POST['btnsua'])) {
    $sql = "UPDATE khachhang SET name=:name, account=:account, email=:email, password=:password, address=:address WHERE id=:id";
    $stmt= $conn->prepare($sql);
    $name = $_POST['name'];
    $account = $_POST['account'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":account", $account);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $message = "Sửa thành công";

    
    
}
    $sql = "SELECT * FROM khachhang WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
     if(isset($message)) {
         echo $message;
     }
    ?>
    <a href="view.php">Trang chủ</a>
    <h2>Sửa tài khoản</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control" name="name"value="<?=$row['name']?>" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" name="account" value="<?=$row['account']?>" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?=$row['email']?>" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" value="<?=$row['password']?>" id="">
        </div>
        <br>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="<?=$row['address']?>" id="">
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Sửa thông tin khách hàng" name="btnsua">

    </form>
    

</body>
</html>