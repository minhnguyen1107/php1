<?php
 require_once "data/db.php";

 $sql = "SELECT * FROM categories";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);

 $id =$_GET['id'];

 $sql3 = "SELECT * FROM categories WHERE id =:id";
 $stmt = $conn->prepare($sql3);
 $stmt->bindParam(':id', $id);
 $stmt->execute();
 $menu1 = $stmt->fetchAll(PDO::FETCH_ASSOC);


 $sql2 = "SELECT * FROM products WHERE id_cate=:id_cate ORDER BY id DESC";
 $stmt = $conn->prepare($sql2);
 $stmt->bindParam('id_cate', $id );
 $stmt->execute();
 $products2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($menu1 as $m1) :?>
    <title><?=$m1['name']?></title>
    <?php endforeach ;?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <!--logo-->
        <header>
            <img width="150" height="100" src="images/mi.png" alt="">
        </header>
        <!--end logo-->

        <nav>
            <!--Menu-->
            <ul>
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <?php foreach ($menu as $m) :?>
                <li>
                    <a href="danhmucsp.php?id=<?=$m['id']?>"><?=$m['name']?></a>
                </li>
                <?php endforeach ;?>
            </ul>
            <!--End menu-->
            <!--Search-->
            <form action="">
                <input type="search" required name="keyword" id="">
                <button type="submit">Tìm kiếm</button>
            </form>
            <!--End search-->
        </nav>
        <!--Banner-->
        <div class="banner">
            <img src="images/a.jpg" alt="">
        </div>
        <!--End banner-->
        <!--News 1-->
        <div class="headline">
            <h2>Sản phẩm mới</h2>
        </div>
        <div class="row">
            <?php foreach ($products2 as $p) :?>
            <div class="col">
                <img src="admin/images/<?=$p['image']?>" alt="">
                <div class="price"><?=$p['price']?></div>
                <div class="desc">
                    <?=$p['description']?>
                </div>
                <h3>
                    <a href="detailsp.php?id=<?=$p['id']?>"><?=$p['title']?></a>
                </h3>
            </div>
            <?php endforeach ;?>
        </div>
        <!--End news 1-->
        <footer>
            <p>Di động Shop, Chuyên cung cấp điện thoại chính hãng</p>
            <p>Địa chỉ : 196 Cầu Giấy, Quan Hoa, Hà Nội</p>
            <p>SĐT :0962634917</p>
        </footer>
    </div>
</body>

</html>