<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vòng lặp for while do while</title>
</head>
<body>
    <h2>Bạn muốn lặp lại bao nhiêu lần</h2>
    <form action="ex3.php" method="POST">
        <input type="number" name="number1" placeholder="Số lần lặp lại" id="">
        <br>
        <input type="submit" value="Chạy" name="btnSubmit">
    </form>
    <div>
        <?php
            if (isset($_POST['btnSubmit'])) {
                $number1 = $_POST['number1'];
                //Sử dụng vòng lặp for
                echo "<h3>Vòng lặp for</h3>";
                for ($i=0; $i <$number1; $i++) {
                    echo "<h6>$i. Vòng lặp for</h6>";
                }
                //Sử dụng vòng lặp while
                echo "<h3>Vòng lặp while</h3>";
                $dem = 0;
                while ($dem < $number1 ) {
                    echo "<h6>$dem. Vòng lặp while</h6>";
                    $dem++;

                }
                //Sử dụng vòng lặp do...while
                echo "<h3>Vòng lặp do...while</h3>";
                $dem  = 0;
                do {
                    echo "<h6>$dem. Vòng lặp do ... While</h6>";
                    $dem++;
                } while ($dem < $number1);
            }
        ?>
    </div>
</body>
</html>