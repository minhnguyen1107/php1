<?php
    session_start();
    require_once "data/db.php";
    if (isset($_SESSION['username'])) {
        header("Location:admin/index.php");
    }
    if (isset($_POST['btnLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username=:username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($result);
        if ($result == false) {
            $message = "Tài khoản chưa đúng";

        } else {
            $password_hash = $result['password'];
            if (password_verify($password, $password_hash)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $result['role'];
                header("Location:admin/index.php");
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
    <input type="text" name="username" placeholder="Tài khoản" id="">
    <br>
    <input type="password" name="password" placeholder="Mật khẩu" id="">
    <br>
    <button type="submit" name="btnLogin">Login</button>
    </form>
</body>
</html>