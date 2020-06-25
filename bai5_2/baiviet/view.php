<?php
include_once "../admin/header.php";

?>
<?php
    require_once "../data/db.php";
    $sql = "Select bv.id as id_bv, tieu_de, hinh, ten_dm, luot_xem From baiviet as bv INNER JOIN danhmuc as dm ON bv.id_dm=dm.id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    
?>
    <h2>Danh mục tin</h2>
    <a href="create.php">Thêm</a>
    <div>
        <?php
            $message = isset($_GET['message'])?$_GET['message']:'';
            echo $message;
        ?>
    </div>
    <table border="1">
        <tr>
            <th>Mã bài viết</th>
            <th>Tiêu đề</th>
            <th>hinh</th>
            <th>ten_dm</th>
            <th>Lượt xem</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($result as $r) : ?>
            <tr>
                <td><?=$r->id_bv?></td>
                <td><?=$r->tieu_de?></td>                
                <td><img width="100" src="../images/<?=$r->hinh?>" alt=""></td>
                <td><?=$r->ten_dm?></td>
                <td><?=$r->luot_xem?></td>
                <td>
                    <a href="edit.php?id=<?=$r->id_bv?>">Edit</a>
                    <a href="delete.php?id=<?=$r->id_bv?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
include_once "../admin/footer.php";
?>
