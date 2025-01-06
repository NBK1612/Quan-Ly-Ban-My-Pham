<div class="container">
    <title>Danh sách sản phẩm</title>
    <h1>Danh sách sản phẩm</h1>
    <form action="" method="POST">
    <table class="admin-table">
        <tr>
            <th>STT</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá bán</th>
            <th>Khuyến mãi</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Chi tiết sản phẩm</th>
            <th>Thêm vào giỏ hàng</th>
        </tr>
        <?php if(!empty($data["adproduct"])): ?>
            <?php $i = 0 ?>
            <?php $tongtien = 0 ?>
            <?php foreach($data["adproduct"] as $r):  ?>
                <tr>
                    <?php $tongtien += $r["giaxuat"] - ($r["giaxuat"] * $r["khuyenmai"] / 100); ?>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $r["ma_sp"]; ?></td>
                    <td><?php echo $r["Ten_loaisp"]; ?></td>
                    <td><img src="<?php echo BASE_URL . 'public/images/' . $r['hinhanh']; ?>" width="50" height="50"></td>
                    <td><?php echo $r["giaxuat"]; ?></td>
                    <td><?php echo $r["khuyenmai"] . '%'; ?></td>
                    <td><?php echo $r["soluong"]; ?></td>
                    <td><?php echo $r["giaxuat"] - ($r["giaxuat"] * $r["khuyenmai"] / 100); ?></td>
                    <td><a class="details-button" href="<?php echo BASE_URL . 'Home/getDetailsProduct/' . $r['ma_sp']; ?>">Chi tiết</a></td>
                    <td><a class="details-button" href="<?php echo BASE_URL . 'GioHang/add/' . $r['ma_sp']; ?>">Thêm</a></td>
                </tr>

            <?php endforeach; ?>
                <tr>
                
                </tr>
            <?php else: ?>
            <tr>
                <td colspan="9">Không có đơn hàng nào.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a class="details-button" href="<?php echo BASE_URL . 'Home'; ?>">Quay lại</a>
</form>



</div>