<?php
    require_once "../../data/db.php";

    //Lấy id trên url
    $id = $_GET['id'];
    if (isset($_POST['btnSua'])) {
        $name = $_POST['name'];
        //SQL
        $sql = "UPDATE categories SET name=:name WHERE id=:id";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":id", $id);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    //Lấy dữ liệu có id là $id
    $sql = "SELECT * FROM categories WHERE id=:id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Truyền giá trị cho tham số :id
    $stmt->bindParam(':id', $id);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include_once "../layoutdashboard/header.php"
?>
    <h2>Sửa danh mục</h2>
    <a href="view.php">DS sản phẩm</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" name="name" value="<?=$result[0]['name']?>" id="">
        <input type="submit" class="btn btn-primary" value="Sửa" name="btnSua">
    </form>
<?php include_once "../layoutdashboard/footer.php"
?>