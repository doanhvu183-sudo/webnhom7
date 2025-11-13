<section class="danhmuc">
  <h2 class="tieude">Danh mục nổi bật</h2>
  <div class="khung-danhmuc">
    <?php
    $sql = "SELECT * FROM danhmuc WHERE trangthai='Hiển thị' LIMIT 6";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($list):
      foreach ($list as $dm): ?>
        <div class="o-danhmuc">
          <a href="sanpham/danhsachsanpham.php?id_danhmuc=<?php echo $dm['id_danhmuc']; ?>">
            <img src="public/hinh/<?php echo $dm['hinh_anh']; ?>" alt="<?php echo $dm['ten_danhmuc']; ?>">
            <p><?php echo $dm['ten_danhmuc']; ?></p>
          </a>
        </div>
    <?php endforeach;
    else: ?>
      <p>Chưa có danh mục nổi bật.</p>
    <?php endif; ?>
  </div>
</section>
