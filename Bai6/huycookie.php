<?php

//Hủy cookie
setcookie('name', '', time()-3600,'/');
setcookie('day', '', time()-3600,'/');
?>
<a href="ktcookie.php">Kiểm tra cookie</a>