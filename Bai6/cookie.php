<?php

//Sử dụng cookie

//Tạo cooki
setcookie('name', 'minhnd', time() +60*60*24, '/');
setcookie('day', 'minhnd', time() +60*60*24, '/');

?>
<a href="ktcookie.php">Kiểm tra cookie</a>