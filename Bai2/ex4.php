<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải phương trình bậc 1</title>
</head>
<body>
    <form action="ex4.php" method="POST">
        <label for="">Nhập vào</label>
        <input type="number" name="a" placeholder="Nhập vào a" id="">
        <br>
        <label for="">Nhập vào b</label>
        <input type="number" name="b" placeholder="Nhập vào b" id="">
        <br>
        <input type="submit" value="Giải pt" name="btngiaipt">
    </form>
    <?php
        if (isset($_POST['btngiaipt'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            if ($a != 0) {
                $kq = "-$b/$a";
                $kq = "Phương trình có nghiệm x=" .$kq;
            }
            else {
                $kq = "Phương trình vô nghiệm";

            }
            echo "<h3> $kq</h3>";
        }
    ?>
</body>
</html>