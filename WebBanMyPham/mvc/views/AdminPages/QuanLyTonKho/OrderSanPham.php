<div class="main">
    <div class="admin-header">
        <h2>Order Thêm Sản Phẩm</h2>
    </div>
    <form action="<?php echo BASE_URL . 'QuanLyTonKho/add/' . $data['product']['ma_sp']; ?>" method="POST">
        <table class="admin-form">
            <tr>
                <td>Mã Sản Phẩm:</td>
                <td><?php echo $data['product']['ma_sp']; ?></td>
            </tr>
            <tr>
                <td>Tên Sản Phẩm:</td>
                <td><?php echo $data['product']['Ten_loaisp']; ?></td>
            </tr>

            <tr>
                <td>Số Lượng Tồn Hiện Tại:</td>
                <td><?php echo $data['product']['soluong']; ?></td>
            </tr>
            <tr>
                <td>Nhập Số Lượng Cần Order Thêm:</td>
                <td><input type="number" name="order_quantity" required min="1"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Xác Nhận Order</button></td>
            </tr>
        </table>
    </form>
    <a href="<?php echo BASE_URL; ?>QuanLyTonKho" class="btn">Quay lại</a>
</div>
