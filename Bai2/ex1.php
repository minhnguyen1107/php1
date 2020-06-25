<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lệnh IF</title>
</head>
<body>
    <form method="POST" action="ex1.php">
        <input type="number" name="number1" placeholder="Hãy nhập 1 số" id="">
        <br>
        <input type="submit" value="Kiểm tra" name="btnSubmit">
    </form>

    <?php
        //Kiểm tra số nhập vào có >2 không.
        //Kiểm tra ng dùng đã nhấn vào button chưa, nếu chưa nhấn thì thực hiện
        if (isset($_POST['btnSubmit'])) {
            $number1 = $_POST['number1'];
            if ($number1 > 10) {
                echo "<h3>Số $number1 lớn hơn 10</h3>";
            } else if($number1 == 10) {
                echo "<h3>Số $number1 = 10</h3>";
            } else {
                echo "<h3>Số $number1 nhỏ hơn 10</h3>";
            }
        }
    ?>
</body>
</html>