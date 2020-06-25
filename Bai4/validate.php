<?php
    $errors = ['tieude' =>'', 'email'=>'', 'noidung'=>''];
    if (isset($_POST['btngui'])) {
        if (empty($_POST['tieude'])) {
            $errors['tieude'] = "Bạn cần nhập tiêu đề <br>";
        } else {
            $tieude = $_POST['tieude'];
            echo $tieude ."<br>";
        }
        if (empty($_POST['email'])) {
            $errors['email'] = "Bạn cần nhập email <br>";
        } else {
            $email = $_POST['email'];
            echo $email ."<br>";
        }
        if (empty($_POST['noidung'])) {
            $errors['noidung'] = "Bạn cần nhập nội dung <br>";
        } else {
            $noidung = $_POST['noidung'];
            echo $noidung ."<br>";
        }
        //Hoàn thành và chạy chương trình
        if (array_filter($errors)) {
            echo "Not submit";
        } else {
            echo "Oy yeahhh.OKKK";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="validate.php" method="post">
        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" name="tieude" value="<?=isset($tieude)?$tieude:''?>" id="">
            <?php echo $errors['tieude'] ?>
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="email" name="email" value="<?=isset($email)?$email:''?>" id="">
            <?php echo $errors['email'] ?>
        </div>
        <div class="form-group">
            <label for="">nội dung</label>
            <textarea name="noidung" id=""><?=isset($noidung)?$noidung:''?></textarea>
            <?php echo $errors['noidung'] ?>
        </div>
        <input type="submit" name="btngui" value="Gửi">
       
    </form>
</body>
</html>