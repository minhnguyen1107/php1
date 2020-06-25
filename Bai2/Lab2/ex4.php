<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="ex4.php">
        <label for="">Nhập số n</label>
        <input type="number" value="1" min="1" name="numbera">
        <br>
        <input type="submit" value="Tìm số nguyên tố từ 1 > N" name="btntinh">
    </form>
    <?php
     if (isset($_POST['btntinh'])) {
        $a = $_POST['numbera'];
        function kt_ngto($a){
            $kt = 1;
            for($i=2;$i<=sqrt($a);$i++)
            {
                if($a%$i==0 && $a>2)
                {
                $kt = 0;
                }    
            }
            return $kt;
        }
        function lk_ngto($a){
            $i=2;
            $dem =0;
            (string) $ketqua = "";
            while($dem<$a)
            {
                if(kt_ngto($i)==1)
                {
                $ketqua .= $i."  ";
                $dem++;  
                }  
                $i++;
            }
            return $ketqua;
        } 
        $ketqua = lk_ngto($a);
        echo " Các số nguyên tốt từ 1 > $a là: $ketqua";

    } 
    ?>
</body>
</html>