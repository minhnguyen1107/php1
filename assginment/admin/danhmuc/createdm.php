<?php
    require_once "../../data/db.php";
    //Thêm dữ liệu
    if (isset($_POST['btnThem'])) {
        $name = $_POST['name'];
        //SQL
        $sql = "INSERT INTO categories SET name=:name";
        //Chuẩn bị prepare
        $stmt = $conn->prepare($sql);
        //BindParam
        $stmt->bindParam(":name", $name);
        //Execute
        if($stmt->execute()) {
            $message = "Thêm dữ liệu thành công";
        } else {
            $message = "Thêm dữ liệu thất bại!";
        }
    }
    
?>
<?php
    include_once "../layoutdashboard/header.php";
?>
    <h2>Thêm danh mục</h2>
    <a href="view.php">Danh sách danh mục</a>
    <?php if (isset($message)) : ?>
        <div>
            <?php echo $message ?>
        </div>
    <?php endif ?>
    <form action="createdm.php" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" name="name" placeholder="Tên danh mục sản phẩm" id="">
        <input type="submit" class="btn btn-primary" value="Thêm" name="btnThem">
    </form>
<?php
    include_once "../layoutdashboard/footer.php";
?>