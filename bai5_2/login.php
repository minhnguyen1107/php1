<?php
    session_start();
    require_once "data/db.php";
    if (isset($_SESSION['taikhoan'])) {
        header("Location:admin/index.php");
    }
    if (isset($_POST['btnLogin'])) {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];

        $sql = "SELECT * FROM nguoidung WHERE taikhoan=:taikhoan";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":taikhoan", $taikhoan);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($result);
        if ($result == false) {
            $message = "Tài khoản chưa đúng";

        } else {
            $matkhau_hash = $result['matkhau'];
            if (password_verify($matkhau, $matkhau_hash)) {
                $_SESSION['taikhoan'] = $taikhoan;
                $_SESSION['quyen'] = $result['quyen'];
                header("Location:baiviet/view.php");
            } else {
                $message = "Mật khẩu không chính xác";

            }

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if(isset($message)) :?>
        <h4><?=$message?></h4>
    <?php endif ;?>
    <form action="" method="POST">
    <input type="text" name="taikhoan" placeholder="Tài khoản" id="">
    <br>
    <input type="password" name="matkhau" placeholder="Mật khẩu" id="">
    <br>
    <button type="submit" name="btnLogin">Login</button>
    </form>
</body>
</html>