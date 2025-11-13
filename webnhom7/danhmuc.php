<?php
// KẾT NỐI DATABASE
include 'config/ketnoidb.php';

// Lấy danh mục cha có trạng thái "Hiển thị"
$sql_danhmuc = "SELECT * FROM danhmuc WHERE trang_thai = 'Hien thi'";
$stmt = $conn->prepare($sql_danhmuc);
$stmt->execute();
$danhmuc_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh mục con theo dạng mảng phân nhóm
$danhsach_con = [];

foreach ($danhmuc_list as $dm) {
    $sql_con = "SELECT * FROM danhmuc_con WHERE id_danhmuc = ?";
    $stmt_con = $conn->prepare($sql_con);
    $stmt_con->execute([$dm['id_danh_muc']]);
    $danhsach_con[$dm['id_danh_muc']] = $stmt_con->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- HIỂN THỊ MENU DANH MỤC -->
<ul class="menu-danhmuc">
    <?php foreach ($danhmuc_list as $dm): ?>
        <li class="menu-cha">
            <a href="#"><?php echo $dm['ten_danh_muc']; ?></a>

            <!-- Nếu có danh mục con -->
            <?php if (!empty($danhsach_con[$dm['id_danh_muc']])): ?>
                <ul class="menu-con">
                    <?php foreach ($danhsach_con[$dm['id_danh_muc']] as $child): ?>
                        <li>
                            <a href="sanpham.php?danhmuc_con=<?php echo $child['id_danhmuc_con']; ?>">
                                <?php echo $child['ten_danhmuc_con']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
