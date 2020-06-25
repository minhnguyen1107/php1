<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP1 Lấy dữ liệu từ form theo GET và POST</title>
</head>
<body>
    <form action="ex3.php" method="POST">
        username: <input type ="text" name="username" id="">
        <br>
        password: <input type ="password" name="password" id="">
        <br>
        <input type="submit" value="Login" name="btnLogin" id="">
    </form>
    <?php
        //Kiểm tra xem người dùng có nhận vào nút btnLogin không
        if(isset($_POST['btnLogin'])) {
                //$_GET để lấy dữ liệu theo method
                $username = $_POST['username'];
                $password = $_POST['password'];
                echo "Username: $username <br>";
                echo "Password: $password";
        }
    ?>
</body>
</html>