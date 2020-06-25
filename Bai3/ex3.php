<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính giai thừa của 1 số nguyên</title>
</head>
<body>
    <?php
    require "lib/function.php";
        if(isset($_POST['btntinh'])) {
            $n = $_POST['number1'];
            $gt = giaithua($n);

        }
    ?>
    <form method="post" action="ex3.php">
        <input type="number" name="number1" value="<?=$n?>" placeholder="Nhập vào 1 số">
        <input type="submit" value="Tính" name="btntinh">
    </form>
    <?php
        if(isset($gt)) {
            echo "Giai thừa của $n = $gt";
        }

    ?>
</body>
</html>