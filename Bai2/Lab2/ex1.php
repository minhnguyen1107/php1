<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 Lab2</title>
</head>
<body>
    <h2>Giải pt bậc 2 : Ax^2 + bx +c = 0</h2>
    <form method="POST" action="ex1.php">
        <label for="">Nhập số a</label>
        <input type="number" name="numbera" id="">
        <br>
        <label for="">Nhập số b</label>
        <input type="number" name="numberb" id="">
        <br>
        <label for="">Nhập số c</label>
        <input type="number" name="numberc" id="">
        <br>
        <input type="submit" value="Giải pt bậc 2" name="btntinh">
    </form>
    <div>
        <?php
            if (isset($_POST['btntinh'])) {
                $a = $_POST['numbera'];
                $b = $_POST['numberb'];
                $c = $_POST['numberc'];
                $delta = $b*$b - 4*$a*$c;
                if ($delta == 0) {
                    $x = -$b/(2*$a);
                    $kq = "Phương trình có nghiệm kép x=" .$x;
                } else if ($delta > 0) {
                    $x1 = (-$b + sqrt($delta))/(2*$a);
                    $x2 = (-$b - sqrt($delta))/(2*$a);
                    $kq = "Phương trình có nghiệm x1 =$x1; x2=$x2";

                } else {
                    $kq = "Phương trình vô nghiệm";
                }
                echo "$kq";
            }
        ?>
    <div>
</body>
</html>