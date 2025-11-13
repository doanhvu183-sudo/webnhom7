<?php
// Kết nối CSDL
include __DIR__ . '/config/ketnoidb.php';

// Lấy sản phẩm
$sql = "SELECT * FROM sanpham WHERE trang_thai = 'Hien thi'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$sanpham = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Giao diện đầu trang
include __DIR__ . '/include/dautrang.php';
include __DIR__ . '/include/dieu_huong.php';
?>

<div class="container">
    <h2 style="margin: 20px 0;">Danh sách sản phẩm</h2>

    <div class="sanpham-list">
        <?php if (count($sanpham) == 0): ?>
            <p>Chưa có sản phẩm nào.</p>
        <?php endif; ?>

        <?php foreach ($sanpham as $sp): ?>
            <div class="sanpham-item">

                <?php 
                    $img = "public/hinh/" . $sp['hinh_anh'];
                    if (!file_exists($img)) {
                        $img = "public/hinh/no-image.png"; // Bạn tự thêm ảnh này vào thư mục
                    }
                ?>

                <img src="<?php echo $img; ?>" alt="Ảnh sản phẩm">

                <h3><?php echo $sp['ten_sanpham']; ?></h3>

                <p class="gia"><?php echo number_format($sp['gia']); ?>₫</p>

                <p class="mota"><?php echo $sp['mo_ta']; ?></p>

                <a href="chitiet_sanpham.php?id=<?php echo $sp['id_sanpham']; ?>" class="nut-xem">Xem chi tiết</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include __DIR__ . '/include/cuoi_trang.php'; ?>
