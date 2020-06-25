<?php
    require_once "../data/db.php";
    //Thêm dữ liệu
    if (isset($_POST['btnThem'])) {
        $title = $_POST['title'];
        $id_cate = $_POST['id_cate'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $price = $_POST['price'];
        $imagesp = $_FILES['image']['name'];
        $dir = "../images/";
        //SQL
        $sql = "INSERT INTO products(title, price, id_cate, image, content, description) VALUES(:title, :price, :id_cate, :image, :content,:description)";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":id_cate", $id_cate);
        $stmt->bindParam(":image", $imagesp);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":content", $content);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
            move_uploaded_file($_FILES['image']['tmp_name'], $dir . $imagesp);
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    
    //Load dữ liệu của danh mục
    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    
</head>
<body>
    <h2>Thêm sản phẩm</h2>
    <a href="view.php">Danh sách Sản phẩm</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="createsp.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Tên sản phẩm" id="">
        <br>
        <!--Danh mục-->
        <select name="id_cate" id="">
            <?php foreach($result as $r) : ?>
                <option value="<?=$r['id']?>"><?=$r['name']?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="file" name="image" id="">
        <br>
        <textarea name="description" id="" cols="30" rows="5" placeholder="Mô tả"></textarea>
        <br>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
        <input type="text" name="price" id="" placeholder="Giá"></textarea>
        <br>
        <input type="submit" value="Thêm" name="btnThem">
    </form>
</body>
</html>