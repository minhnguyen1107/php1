<?php
//Hàm trong php 

//Khai báo 1 hàm không có giá trị trả về
//function tenham($thamso1, $thamso2,...)

function tinhtong($a, $b) {
    $t = $a + $b;
    echo "Tổng của $a+ $b = $t";
}

//Lời gọi hàm
tinhtong(10,3);
//Khai báo 1 hàm có giá trị trả về
function tinh_tong($a, $b) {
    $t = $a + $b;
    return $t;

}
$a=100;
$b=89;
echo "<br> Tổng của $a + $b = " . tinh_tong($a,$b);
//Hàm có tham số không xác định
function array_count() {
    $arr = func_get_args();
    print_r($arr);

};
echo "<br>";
array_count(12,3,'hello', 'string', 'float');