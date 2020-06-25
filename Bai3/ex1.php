<?php
//Khởi tạo mảng
$array = [];
$array[0] = "hello";
$array[1] = 15;
$array[2] = 12.3;
$array[3] = "World";


//in mảng
print_r($array);

//Cách 2, khởi tạo với giá trị của mảng
$arr1 = [12,"string", 16, "Nguyễn Văn Minh", 'minhnd'];
echo "<pre>";
print_r($arr1);
echo "</pre>";

//Truy cập từng phần tử mảng với vòng lặp for
for ($i=0; $i<count($arr1); $i++) {
    echo "Phần tử thứ $i là " .$arr1[$i] . "<br>" ;
}
//Mảng có khóa và giá trị
$arr2 = [
    "name" => "Nguyễn Đức Minh",
    "age" => 21,
    "email" => "minhnd110799@gmail.com",
    "address" => "Hà nội"
];
//Sử dụng vòng lặp foreach để truy cập đến phần tử mảng
foreach ($arr2 as $k => $v) {
    echo "Key : $k, Value: $v <br>";
}
//Mảng nhiều chiều
$arr3 = [
    ['Nguyễn Đức Minh', 21, 'minhnd@fpt.edu.vn','hà nội'],
    ['Mai Xuân Hà', 9, 'habeo@gmail.com', 'Nam định'],
    ['Phan Huyền Thanh', 21, 'thanhxinhgai@gmail.com', 'Nam Định'],

];
//Truy cập đến phần tử mảng
foreach ($arr3 as $value) {
    echo "Họ tên : $value[0], Tuổi: $value[1], Email: $value[2], Địa chỉ: $value[3]" ."<br>";
}

?>