<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 1 Lab1</title>
    <style>
        * {
            width: 300px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <form action="ex1.php" method="POST">
        <h1>Thanh toán</h1>
        <label for="">Số tiền 860k/đêm</label>
        <br>
        <label for="">Số đêm</label>
        <input type="number" name="sodem" id="" min="0" value="0">
        <br>
        <input type="submit" value="Thanh toán" name="btnThanhToan">
    </form>
    <div>
        <?php
            if (isset($_POST['btnThanhToan'])) {
                $sodem = $_POST['sodem'];
                $thanhtien = 860000 * $sodem;
                echo "Thành tiền $thanhtien ";
            }
        ?>
    </div>
</body>

</html>