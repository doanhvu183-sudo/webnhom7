<section class="sanphammoi">
  <h2 class="tieude">Sản phẩm mới</h2>
  <div class="khung-sanpham">
    <?php
    $sql = "SELECT * FROM sanpham ORDER BY ngay_them DESC LIMIT 8";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($list as $sp): ?>
      <div class="o-sanpham">
        <img src="public/hinh/<?php echo $sp['hinh_anh']; ?>" alt="<?php echo $sp['ten_sanpham']; ?>">
        <h3><?php echo $sp['ten_sanpham']; ?></h3>
        <p class="gia"><?php echo number_format($sp['gia']); ?>₫</p>
        <a href="sanpham/chitietsanpham.php?id_sanpham=<?php echo $sp['id_sanpham']; ?>" class="nut-xem">Xem chi tiết</a>
      </div>
    <?php endforeach; ?>
  </div>
</section>
