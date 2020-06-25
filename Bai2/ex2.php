<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh switch case</title>
</head>
<body>
    <form action="ex2.php" method="post">
        <input type="number" name="chanel" placeholder="Chọn 1 kênh" id="">
        <br>
        <input type="submit" value="Chọn" name="btnSubmit">
        <div>
            <?php
                if (isset($_POST['btnSubmit']))  {
                    $number = $_POST['chanel'];
                    //Sử dụng switch case
                    switch ($number) {
                        case "0":
                            echo "Bạn chọn kênh số 0";
                        break;
                        case "1":
                            echo "Bạn chọn kênh số 1";
                        break;
                        default:
                        echo "Kênh ko tồn tại";
                    }
                }

            ?>
        </div>
    </form>
</body>
</html>