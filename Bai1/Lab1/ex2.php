<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            background-color: orangered;
            color: white;
            margin: 0 auto;
        }
        
        input {
            color: black;
            background-color: white;
        }
    </style>
</head>

<body>
    <form action="ex2.php" method="POST">
        <table>
            <tr>
                <th colspan="3">Tính tiền</th>
            </tr>
            <tr>
                <th>Tên món</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
            </tr>
            <tr>
                <td>Cà ri</td>
                <td>15000đ</td>
                <td><input type="number" min="0" name="soluongca" value="0" id=""></td>
            </tr>
            <tr>
                <td>Rau sào</td>
                <td>5000đ</td>
                <td><input type="number" min="0" name="soluongrau" value="0" id=""></td>
            </tr>
            <tr>
                <td>Cá kho</td>
                <td>25000đ</td>
                <td><input type="number" min="0" name="soluongcakho" value="0" id=""></td>
            </tr>
            <tr>
                <td>Cơm</td>
                <td>10000đ</td>
                <td><input type="number" min="0" name="soluongcom" value="0" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Tính tiền" name="btntinh"></td>
                <td>
                    <?php
                        if (isset($_POST['btntinh'])) {
                            $soluongca = $_POST['soluongca'];
                            $soluongrau = $_POST['soluongrau'];
                            $soluongcakho = $_POST['soluongcakho'];
                            $soluongcom = $_POST['soluongcom'];
                            $tongtien = 15000 * $soluongca + 5000 * $soluongrau + 25000* $soluongcakho + 10000 * $soluongcom;
                            echo "Tổng số tiền là: $tongtien đ";
                        }
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>