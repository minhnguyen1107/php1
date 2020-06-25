<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải pt bậc 2</title>
</head>
<body>
    <?php
     require_once "lib/function.php";
     if (isset($_POST['btntinh'])) {
         $a = $_POST['a'];
         $b = $_POST['b'];
         $c = $_POST['c'];
         $kq = phuongtrinhbac2($a, $b, $c);
     }
    ?>
    <form action="ex4.php" method="POST">
        <input type="number" name="a" placeholder="Nhập số a" value="<?=$a?>">
        <br>
        <input type="number" name="b" placeholder="Nhập số b" value="<?=$b?>">
        <br>
        <input type="number" name="c" placeholder="Nhập số c" value="<?=$c?>">
        <br>
        <input type="submit" value="Giải pt" name="btntinh">
    </form>
    <?php
     if(isset($kq)) {
         echo "$kq";
     }
    ?>
</body>
</html>