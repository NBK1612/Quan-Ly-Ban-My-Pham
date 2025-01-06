<div class="main">
    <title>Chi tiết đơn hàng</title>
    <h1>Chi tiết đơn hàng</h1>
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
        </tr>
        <?php if(!empty($data["orderdetail"])): ?>
            <?php $i = 0 ?>
            <?php $tongtien = 0 ?>
            <?php foreach($data["orderdetail"] as $r):  ?>
                <tr>
                    <?php $tongtien +=  $r["thanhtien"] ?>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $r["masp"] ?></td>
                    <td><?php echo $r["tensp"] ?></td>
                    <td><img src="<?php echo BASE_URL . 'public/images/' . $r['hinhanh']; ?>" width="50" height="50"></td>
                    <td><?php echo $r["giaxuat"] ?></td>
                    <td><?php echo $r["khuyenmai"].'%' ?></td>
                    <td><?php echo $r["soluong"] ?></td>
                    <td><?php echo $r["thanhtien"] ?></td>  
                </tr>
            <?php endforeach; ?>
                <tr>
                  <td style="text-align: center;" colspan="9"><?php echo "Tổng tiền thanh toán: ".$tongtien ?> </td>
                </tr>
            <?php else: ?>
            <tr>
                <td colspan="9">Không có đơn hàng nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</form>
<a class="details-button" href="<?php echo BASE_URL . 'QuanLyDoanhThu'; ?>">Quay lại</a>
</div>