<?php
session_start();
//Kiểm tra session tồn tại hay không
if (count($_SESSION > 0)) {
   foreach ($_SESSION as $key => $name) {
       echo "$key" . $name . "<br>";
   }

} else {
    echo "Session không tồn tại";
}
?>
<a href="huysession.php">Hủy session</a>