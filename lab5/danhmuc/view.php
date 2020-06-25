<?php
include_once "../admin/header.php";

?>
<?php
    require_once "../data/db.php";
    $sql = "SELECT * FROM categories";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    
?>
    <h2>Danh mục sp</h2>
    <a href="createdm.php">Thêm</a>
    <div>
        <?php
            $message = isset($_GET['message'])?$_GET['message']:'';
            echo $message;
        ?>
    </div>
    <table border="1">
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
        </tr>
        <?php foreach ($result as $r) : ?>
            <tr>
                <td><?=$r->id?></td>
                <td><?=$r->name?></td>                >
                <td>
                    <a href="editdm.php?id=<?=$r->id?>">Edit</a>
                    <a href="deletedm.php?id=<?=$r->id?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
include_once "../admin/footer.php";
?>