<?php 
    require_once "db.php";
    if (isset($_POST['btnthem'])) {
        $name = $_POST['name'];
        $account = $_POST['account'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        $sql = "INSERT INTO khachhang(name, account, email, password, address) VALUES (:name,:account,:email,:password,:address)";
        $stmt = $conn->prepare($sql);
         
         $stmt->bindParam(":name", $name);
         $stmt->bindParam(":account", $account);
         $stmt->bindParam(":email", $email);
         $stmt->bindParam(":password", $password);
         $stmt->bindParam(":address", $address);
         if ($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
         } else {
             $message = "Account hoặc email đã tồn tại, vui lòng nhập lại";
         }
       
       
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <h2>Thêm account</h2>
    <a href="view.php">Trang chủ</a>
    <form action="" method="POST">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control" name="name" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" name="account" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="">
        </div>
        <br>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="">
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Tạo tài khoản mới" name="btnthem">
    </form>
    
</body>
</html>