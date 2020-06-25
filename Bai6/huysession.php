<?php

session_start();
//Hủy session
if (isset($_SESSION['name'])) {
   session_destroy();
} else {
    echo "Session name k tồn tại";
}
?>
<a href="ktsession.php">Kiểm tra session</a>
