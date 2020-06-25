<?php
    //Hàm tính giai thừa của 1 số nguyên $n là tham số của hàm
        function giaithua($n) {
            $gt = 1;
            for ($i=1; $i<=$n; $i++) {
                $gt = $gt*$i;
            }
            return $gt;
        }
    //Ham giải pt bậc 2
    function phuongtrinhbac2 ($a, $b, $c) {
        $kq = "";
        $delta = $b*$b - 4*$a*$c;
        if ($delta >0) {
            $x1 = (-$b + sqrt($delta))/(2*$a);
            $x2 = (-$b - sqrt($delta))/(2*$a);
            $kq = "Phương trình có 2 nghiệm phân biệt <br>";
            $kq .= "x1" .$x1;
            $kq .= "<br>x2 ="  .$x2;
        } else if ($delta == 0) {
            $x = -$b/(2*$a);
            $kq = "Phương trình có nghiệm kép x = $x";
        } else {
            $kq = "Phương trình vô nghiệm";
        }
        return $kq;
        
    }
?>