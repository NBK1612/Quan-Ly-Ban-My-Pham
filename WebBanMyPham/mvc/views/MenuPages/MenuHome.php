<div class="main">
    <!-- code header -->
    <div class="header2">
        <nav>
            <ul class="menu1">
            <img src="<?php echo BASE_URL; ?>/public/images/logo.png"  width="150px" style="float: left; margin-right: 10px;">
                <li><a class="a-header" href="<?php echo BASE_URL . 'Home'; ?>" style="color: black;">Trang chủ</a></li>
                <li class="dropdown">
                    <a class="a-header dropdown-btn" href="<?php echo BASE_URL . 'Home/adProduct'; ?>">Sản phẩm</a>
                    <!-- <div class="dropdown-content">
                        <?php
                        // Kiểm tra có bản ghi nào trong danh sách sản phẩm hay không
                        if (!empty($data["products"])) {
                            // Lặp qua các sản phẩm và lấy ra danh mục
                            foreach ($data["products"] as $product) {
                                echo "<a class='a-header' href='#'>" . $product['Ten_loaisp'] . "</a>";
                            }
                        } else {
                        }
                        ?>
                    </div> -->
                </li>
                <li><a class="a-header" href="<?php echo BASE_URL . 'Home/TinTuc'; ?>" style="color: black;">Tin tức</a></li>
                <li><a class="a-header" href="<?php echo BASE_URL . 'GopY/themGopY'; ?>" style="color: black;">Góp ý</a></li>
                <li><a class="a-header" href="<?php echo BASE_URL . 'DonHang'; ?>" style="color: black;">Đơn hàng</a></li>
                <li><a class="a-header" href="<?php echo BASE_URL . 'DonHang/lichsumuahang'; ?>" style="color: black;">Lịch sử mua hàng</a></li>
                <li><a class="a-header" href="<?php echo BASE_URL . 'GioHang'; ?>" style="color: black;">Giỏ hàng</a></li>

                <li class="dropdown">
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="dropdown">Xin chào: <?php echo $_SESSION['user']; ?></a>
                    <div class="dropdown-content">
                        <a style="color: black;" href="<?php echo BASE_URL . 'Login/ThongTinTaiKhoan/' . $_SESSION["user"]?>">Thông Tin Tài Khoản</a>
                        <a style="color: black;" href="<?php echo BASE_URL . 'Login/DoiMatKhau'; ?>">Đổi Mật Khẩu</a>

                        <a style="color: black;" href="<?php echo BASE_URL . 'Login/LogOut'; ?>">Đăng Xuất</a>
                    </div>
                <?php else: ?>
                    <span>
                        <a style=" color: black;" href="<?php echo BASE_URL . 'QuanlyKhachHang/DangKy'; ?>">Đăng Ký</a>
                    </span>
                    <span>
                        <a style="color: black;" href="<?php echo BASE_URL . 'Login/checkLogin'; ?>">Đăng Nhập</a>
                    </span>
                <?php endif; ?>
            </li>
            </ul>
        </nav>
        <div id="slide">
            <a href="#"><img src="../public/images/giaodien.jpg" alt=""></a>
        </div>
        
    </div>
</div>
