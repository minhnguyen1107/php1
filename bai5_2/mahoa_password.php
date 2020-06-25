<?php

$password = '123456';
//Mã hóa
$hash = password_hash($password, PASSWORD_DEFAULT);

//Hiển thị mật khẩu đã đc mã hóa
echo $hash;
