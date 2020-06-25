<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2 Lab2</title>
</head>
<body>
    <form method="POST" action="ex2.php">
        <label for="">
            Nhập số n
        </label>
        <input type="number" value="1" min="1" name="numbera">
        <br>
        <input type="submit" value="Tìm số chẵn từ 1 > N" name="btntinh">
    </form>
    <div>
        <?php
            if (isset($_POST['btntinh'])) {
                $a = $_POST['numbera'];
                for ($i=0; $i <$a; $i++) {
                    if ($i % 2 == 0) {
                        echo " <br> $i là số chẵn";
                    }
                }

            }
        ?>
    </div>
</body>
</html>