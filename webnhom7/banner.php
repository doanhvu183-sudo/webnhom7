<?php
include 'config/ketnoidb.php';
$sql = "SELECT * FROM bander WHERE trang_thai='Hiển thị' LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$banner = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<section class="banner" style="text-align:center; margin-bottom: 30px;">
  <?php if ($banner): ?>
    <img src="public/hinh/<?php echo $banner['hinh_anh']; ?>" 
         alt="Banner khuyến mãi" style="width:90%;border-radius:12px;">
    <h2><?php echo $banner['tieu_de']; ?></h2>
    <p><?php echo $banner['mo_ta']; ?></p>
  <?php else: ?>
    <p>Không có banner nào hiển thị</p>
  <?php endif; ?>
</section>
