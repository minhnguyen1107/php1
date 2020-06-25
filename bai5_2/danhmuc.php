<?php
    require_once "data/db.php";
    //Load dữ liệu cho menu
    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Lấy bài viết theo danh mục
    $id = $_GET['id'];
    $sql = "SELECT * FROM baiviet WHERE id_dm=:id_dm ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_dm', $id);
    $stmt->execute();
    $baiviet = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <!--logo-->
        <header>
            <img src="images/logo.png" alt="">
        </header>
        <!--end logo-->

        <nav>
            <!--Menu-->
            <ul>
                <li>
                    <a href="./">Trang chủ</a>
                </li>

                <?php foreach($danhmuc as $dm) : ?>
                    <li>
                        <a href="danhmuc.php?id=<?=$dm['id']?>"><?=$dm['ten_dm']?></a>
                    </li>
                <?php endforeach; ?>
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
            <img src="images/banner.jpg" alt="">
        </div>
        <!--End banner-->
        <!--News 1-->
        <div class="headline">
            <!-- <h2>TIN TỨC TRANG CHỦ 1</h2> -->
        </div>
        <div class="row">
            <?php foreach ($baiviet as $bv) :?>
                <div class="col">
                <h3>
                    <a href="chitet.php?id=<?=$bv['id']?>"><?=$bv['tieu_de']?></a>
                </h3>
                <img src="images/<?=$bv['hinh']?>" alt="">
                <div class="desc">
                   <?=$bv['mo_ta']?>
                </div>
            </div>
            <?php endforeach ;?>
        </div>
        <!--End news 1-->
        <!--News 2-->
        <!--End news 2-->
        <footer>
            FPT POLYTECHNIC
        </footer>
    </div>
</body>

</html>