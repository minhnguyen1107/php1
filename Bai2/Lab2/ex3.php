<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3 Lab 2</title>
</head>
<body>
    <form method="post" action="ex3.php">
        <label for="">Nhập số N</label>
        <input type="number" name="n" min="1">
        <br>
        <input type="submit" value="Tính N!" name="btntinh">
    </form>
    <div>
        <?php
            if (isset($_POST['btntinh'])) {
                $n=$_POST['n'];
                if($n==0){
                    $giaithua=1;
                } else{
                    $giaithua=1;
                    for($i=1;$i<=$n;$i++){
                        $giaithua=$giaithua*$i;
                    }
                }
                echo "Giai thừa của ".$n."! = ".$giaithua."<br/>";
            }
        ?>
    </div>
</body>
</html>