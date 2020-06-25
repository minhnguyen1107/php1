<?php
include_once "../admin/header.php";

?>
<?php
    require_once "../data/db.php";
    $sql = "SELECT products.id, title, description, content, image, price, created_at, updated_at,name  FROM products INNER JOIN categories ON products.id_cate = categories.id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    
?>
    <h2>Danh sách sản phẩm</h2>
    <a href="createsp.php">Thêm</a>
    <div>
        <?php
            $message = isset($_GET['message'])?$_GET['message']:'';
            echo $message;
        ?>
    </div>
    <table border="1">
        <tr>
            <th>Mã sp</th>
            <th>Danh mục sản phảm</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Thêm từ khi</th>
            <th>Sửa lần cuối</th>
        </tr>
        <?php foreach ($result as $r) : ?>
            <tr>
                <td><?=$r->id?></td>
                <td><?=$r->name?></td>                
                <td><?=$r->title?></td>                
                <td><?=$r->description?></td>                
                <td><?=$r->content?></td>                                              
                <td><img width="100" src="../images/<?=$r->image?>" alt=""></td>
                <td><?=$r->price?></td>
                <td><?=$r->created_at?></td>
                <td><?=$r->updated_at?></td>
                <td>
                    <a href="editsp.php?id=<?=$r->id?>">Edit</a>
                    <a href="deletesp.php?id=<?=$r->id?>" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
include_once "../admin/footer.php";
?>
