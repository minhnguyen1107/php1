<?php
    if (isset($_POST['btnUpload'])) {
        //var_dump($_FILES['image']);
        //Kiểm tra người dùng đã chọn file chưa
        if ($_FILES['image']['size'] > 0)  {
            $dir = "images/"; //Thư mục để chứa file upload
            $img_name = $_FILES['image']['name'];//Lấy tên của file
            //Upload file lên server
            move_uploaded_file($_FILES['image']['tmp_name'], $dir . $img_name);
        } else {
            echo "Bạn chưa chọn file!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <br>
        <input type="submit" value="Upload" name="btnUpload">
    </form>
</body>
</html>