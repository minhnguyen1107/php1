<?php
//Sử dụng session
//Để sử dụng session thì đầu tiên ta phải gọi phương thức session
session_start();
//Gán giá trị cho session
$_SESSION['name'] = 'minhnd';
$_SESSION['role'] = 'admin';

?>
<a href="ktsession.php">Kiểm tra session</a>