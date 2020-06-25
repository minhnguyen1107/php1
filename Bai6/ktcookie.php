<?php

//Phương thức gọi cookie $_COOKIE
//Kiểm tra xem cookie có tồn tại không

if (isset($_COOKIE['name'])) {
    echo "Name:" . $_COOKIE['name'];
    echo "<br>";
    echo "day:" . $_COOKIE['day'];
} else {
    echo "Không có cookie nào cả";
}
?>
<a href="huycookie.php">logout</a>
