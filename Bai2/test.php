<html>
<head>
<title>Tinh giai thua cua mot so nguyen duong bat ky!</title>
</head>
<body>
   <fieldset>
   <legend><h2>Tinh giai thua cua mot so n nguyen duong:</h2></legend>
   <form method="post" action="test.php">
      Nhap so can tinh giai thua:
         <input type="text" name="n"><br/>
      <input type="submit" name="tinh" value="Tinh giai thua n!">
   </form>
   </fieldset>
   <?php
        if (isset($_POST['tinh'])) {
            $n=$_POST['n'];
            if($n==0)
            {
            $giaithua=1;
            }
            else
            {
            $giaithua=1;
            for($i=1;$i<=$n;$i++)
            {
                $giaithua=$giaithua*$i;
            }
            }
            echo "Giai thua cua ".$n."! = ".$giaithua."<br/>";
        }
   
?>
</body>
</html>