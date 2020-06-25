<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài ví dụ</title>
</head>
<body>
    <h1>Bảng tính thuế lương</h1>
    <form method="POST" action="ex5.php">
        <label for="">Nhập số lương</label>
        <input type="number" name="luong" value="0" min="0">
        <br>
        <input type="submit" value="Tính thuế" name="btntinh">

    </form>
    <div>
        <?php
            if (isset($_POST['btntinh'])) {
                $luong = $_POST['luong'];
                $thue = 0;
                if ($luong > 9000000 && $luong < 15000000) {
                    $thue = ($luong-9000000)*0.1;

                } else if ($luong >= 15000000 && $luong <30000000) {
                    $thue = (15000000 - 9000000)*0.1 + ($luong - 15000000)*0.15;
                } else if ($luong >30000000) {
                    $thue = (150000000 - 9000000)*0.1% + (30000000 - 15000000)*0.15 + ($luong - 30000000)*0.2;
                }
                echo "Thuế thu nhập của người có mức thu nhập $luong là : $thue";
            }

        ?>
    </div>
</body>
</html>