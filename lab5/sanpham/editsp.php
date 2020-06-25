<?php
    require_once "../data/db.php";

    //Lấy id trên url
    $id = $_GET['id'];
    if (isset($_POST['btnSua'])) {
        $title = $_POST['title'];
        $id_cate = $_POST['id_cate'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $price = $_POST['price'];
        $imagesp = isset($_POST['imagesp']) ? $_POST['imagesp'] : '';
        $uploadOk = false;
        if ($_FILES['imagesp']['size'] > 0) {
            $uploadOk = true;
            $image = $_FILES['imagesp']['name'];
        }
        
        $dir = "../images/";
        //SQL
        $sql = "UPDATE products SET title=:title, id_cate=:id_cate, image=:image, description=:description, content=:content, price=:price WHERE id=:id";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        if ($uploadOk == true) {
            $image = $image;
        } else {
            $image = $imagesp;
        }
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":id_cate", $id_cate);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":id", $id);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
            if ($uploadOk == true) {
                move_uploaded_file($_FILES['imagesp']['tmp_name'], $dir . $image);
            }
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    //Lấy dữ liệu có id là $id
    $sql = "SELECT * FROM products WHERE id=:id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Truyền giá trị cho tham số :id
    $stmt->bindParam(':id', $id);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Lấy danh mục
    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết mới</title>
    
</head>
<body>
    <h2>Sửa sản phẩm</h2>
    <a href="view.php">DS sản phẩm</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?=$result[0]['title']?>" id="">
        <br>
        <!--Danh mục-->
        <select name="id_cate" id="">
            <?php foreach ($categories as $d) : ?>
                <?php if ($d['id'] == $result[0]['id_cate']) : ?>
                    <option value="<?=$d['id']?>" selected><?=$d['name']?></option>
                <?php else : ?>
                    <option value="<?=$d['id']?>"><?=$d['name']?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <?php if ($result[0]['image'] != ""): ?>
            <img src="../images/<?=$result[0]['image']?>" width="220" alt="">
            <input type="hidden" name="imagesp" value="<?=$result[0]['image']?>">
        <?php endif ?>
        <br>
        <input type="file" name="imagesp" id="">
        <br>
        <textarea name="description" id="" cols="30" rows="5" placeholder="Mô tả"><?=$result[0]['description']?></textarea>
        <br>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Nội dung"><?=$result[0]['content']?></textarea>
        <br>
        <input type="text" name="price" value="<?=$result[0]['price']?>" placeholder="Giá" id="">

        <input type="submit" value="Sửa" name="btnSua">
    </form>
</body>
</html>