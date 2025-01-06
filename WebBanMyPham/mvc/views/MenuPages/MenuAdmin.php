<div class="header">
    <div class="header1">
        <h1>Trang Admin</h1>
    </div>
    <div class="header2">
        <ul class="menu1 mainmenu">
            <li class="dropdown">
                <a class="menu1">Quản lý sản phẩm</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASE_URL ?>./AdProductType">Loại sản phẩm</a>
                    <a href="<?php echo BASE_URL ?>./Adproduct">Sản phẩm</a>
                </div>
            </li>
            <li class="dropdown">
                <a class="menu1">Quản lý khách hàng</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASE_URL ?>./QuanlyKhachHang">Danh sách</a>
                    <a href="<?php echo BASE_URL ?>./GopY">Góp ý</a>
                    <a href="<?php echo BASE_URL ?>./Quanlydonhang">Đơn hàng</a>
                </div>
            </li>
            <li class="dropdown">
                <a class="menu1">Báo cáo</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASE_URL ?>./QuanLyTonKho">Tồn kho</a>
                    <a href="<?php echo BASE_URL ?>./QuanLyDoanhThu">Doanh thu</a>
                </div>
            </li>
            <li><a class="menu1" href="<?php echo BASE_URL ?>./TinTuc">Tin tức</a></li>
            <li><a class="menu1" href="<?php echo BASE_URL ?>./NhaCungCap">Quản Lý Nhà Cung Cấp</a></li>
            <!-- <li><a class="menu1" href="<?php echo BASE_URL ?>./KhuyenMai">Chương Trình Khuyến Mại</a></li> -->
            <li><a class="menu1" href="<?php echo BASE_URL ?>./DiscountController/show">Quản lý mã giảm giá</a></li>

            <li class="dropdown">
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="dropdown">Xin chào: <?php echo $_SESSION['user']; ?></a>
                    <div class="dropdown-content">
                    <a style="color: black;" href="<?php echo BASE_URL . 'Login/ThongTinTaiKhoan/' . $_SESSION["user"]?>">Thông Tin Tài Khoản</a>
                    <a style="color: black;" href="<?php echo BASE_URL . 'Login/DoiMatKhau'; ?>">Đổi Mật Khẩu</a>
                    <a href="<?php echo BASE_URL . 'Login/LogOut'; ?>">Đăng Xuất</a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo BASE_URL . 'QuanlyKhachHang/add'; ?>">Đăng Ký</a>
                    <a href="<?php echo BASE_URL . 'Login/checkLogin'; ?>">Đăng Nhập</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</div>

