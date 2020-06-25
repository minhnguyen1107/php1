<?php
    require_once "../../data/db.php";
    $sql = "SELECT * FROM categories";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    
?>
<?php include_once "../layoutdashboard/header.php";
?>
    <h2>Danh mục sản phẩm</h2>
        <?php
            $message = isset($_GET['message'])?$_GET['message']:'';
            echo $message;
        ?>
    <table class="table">
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th><a class="btn btn-primary" href="createdm.php">Thêm</a></th>
        </tr>
        <?php foreach ($result as $r) : ?>
            <tr>
                <td><?=$r->id?></td>
                <td><?=$r->name?></td>
                <td>
                    <a class="btn btn-primary"  href="editdm.php?id=<?=$r->id?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger"  href="deletedm.php?id=<?=$r->id?>" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php include_once "../layoutdashboard/footer.php";
?>