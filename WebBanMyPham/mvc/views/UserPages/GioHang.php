<?php 
// Kiểm tra nếu chưa đăng nhập
if (!isset($_SESSION['user'])) {
    // Chuyển hướng đến trang đăng nhập
    header("Location: " . BASE_URL . "Login");
    exit();
}
?>

<div class="container">
    <title>Giỏ hàng</title>
    <h1>Giỏ hàng</h1>
    <form action="<?php echo BASE_URL . 'GioHang/update'; ?>" method="POST">
    <table class="admin-table">
        <tr>
            <th>STT</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá bán</th>
            <th>Khuyến mãi</th>
            <th>Số lượng</th>
            <th>Mã giảm giá</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
        
        <?php if (!empty($_COOKIE["giohang"])): ?>
            <?php   
                // Giải mã cookie giohang thành mảng
                $gioHang = json_decode($_COOKIE["giohang"], true);
                $username = $_SESSION['user']; // Giả sử bạn lưu tên người dùng trong session
                $userCart = isset($gioHang[$username]) ? $gioHang[$username] : []; // Giỏ hàng của người dùng

                if (is_array($userCart) && !empty($userCart)): // Kiểm tra xem nó có phải là mảng không
            ?>
            <?php $i = 0 ?>
            <?php $tongtien = 0 ?>
            <?php foreach ($userCart as $r): ?>
                <tr>
                    <?php 
                    $giaxuat = isset($r["giaxuat"]) ? $r["giaxuat"] : 0;
                    $qty = isset($r["qty"]) ? $r["qty"] : 0;
                    $khuyenmai = isset($r["khuyenmai"]) ? $r["khuyenmai"] : 0;
                    $thanhtien = ($giaxuat * $qty) - ($giaxuat * $qty * $khuyenmai / 100);
                    $tongtien += $thanhtien; // Tính tổng tiền
                    ?>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo isset($r["masp"]) ? $r["masp"] : 'N/A' ?></td>
                    <td><?php echo isset($r["tensp"]) ? $r["tensp"] : 'N/A' ?></td>
                    <td>
                        <?php if (isset($r['hinhanh'])): ?>
                            <img src="./public/images/<?php echo $r['hinhanh']; ?>" width="50" height="50">
                        <?php else: ?>
                            <img src="./public/images/default.png" width="50" height="50"> <!-- Hình ảnh mặc định nếu không có -->
                        <?php endif; ?>
                    </td>
                    <td><?php echo isset($r["giaxuat"]) ? $r["giaxuat"] : 'N/A' ?></td>
                    <td><?php echo isset($r["khuyenmai"]) ? $r["khuyenmai"] . '%' : 'N/A' ?></td>
                    <td>
                        <input name="soluong[<?php echo isset($r['masp']) ? $r['masp'] : 'N/A'; ?>]" 
                            style="width: 50px" 
                            value="<?php echo isset($r['qty']) ? $r['qty'] : 1; ?>" 
                            type="number" min="1" max="100">
                    </td>
                    <td>
                        <label for="discount_code">Mã giảm giá:</label>
                        <input type="text" name="discount_code" placeholder="Nhập mã giảm giá">
                        <button type="submit">Áp dụng</button>
                    </td>

                    <td><?php echo $thanhtien ?></td>
                    <td><a class="details-button" href="<?php echo BASE_URL . 'GioHang/delete/' . (isset($r['masp']) ? $r['masp'] : ''); ?>">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td style="text-align: center;" colspan="9">
                    <?php 
                    // Tính tổng tiền sau khi áp dụng mã giảm giá
                    if (isset($_SESSION['discount'])) {
                        $discount = $_SESSION['discount'];
                        $tongtien -= ($tongtien * $discount['discount_percentage'] / 100); // Áp dụng giảm giá
                        echo "Tổng tiền thanh toán sau khi áp dụng mã giảm giá: " . number_format($tongtien) . " VNĐ";
                    } else {
                        echo "Tổng tiền thanh toán: " . number_format($tongtien) . " VNĐ";
                    }
                    ?>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="9">Giỏ hàng không hợp lệ.</td>
            </tr>
        <?php endif; ?>
    <?php else: ?>
        <tr>
            <td colspan="9">Không có sản phẩm nào.</td>
        </tr>
    <?php endif; ?>


    </table>
    <!-- Nút Cập nhật sẽ gửi yêu cầu POST với tất cả các giá trị số lượng -->
    <button type="submit" class="details-button">Cập nhật</button>
    <a class="details-button" href="<?php echo BASE_URL . 'Home/adProduct'; ?>">Mua tiếp</a>
    <a class="details-button" href="<?php echo BASE_URL . 'DatHang'; ?>">Đặt hàng</a>
</form>
</div>
