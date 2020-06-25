<?php
  require_once "../data/db.php";
  $sql = "SELECT * FROM products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $count1 = $stmt->rowCount();

  $sql2 = "SELECT * FROM categories";
  $stmt = $conn->prepare($sql2);
  $stmt->execute();
  $count2 = $stmt->rowCount();

  


?>
<?php
  include_once "header.php"
?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Danh mục</h3>

                <p>Hiện đang có <?=$count2?> danh mục</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="danhmuc/view.php" class="small-box-footer">Quản lý <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Sản phẩm</h3>

                <p>Hiện đang có <?=$count1?> sản phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="sanpham/view.php" class="small-box-footer">Quản lý <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
<?php 
  include_once "footer.php";
?>
