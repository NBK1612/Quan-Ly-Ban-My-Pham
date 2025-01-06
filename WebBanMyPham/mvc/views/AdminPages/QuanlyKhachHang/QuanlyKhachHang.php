<!DOCTYPE html>
<html>

<head>
    <title>Quản Lý Khách Hàng</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Đảm bảo đã link đến file CSS của bạn -->
    <script>
        function filterAccounts() {
            var level = document.getElementById("levelFilter").value;
            var rows = document.getElementsByClassName("account-row");
            for (var i = 0; i < rows.length; i++) {
                if (level === "all" || rows[i].getAttribute("data-level") === level) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
</head>

<body>
    <div class="main">
        <div class="admin-header">
            <h2>Quản Lý Khách Hàng</h2>
        </div>
        <form action="<?php echo BASE_URL . 'QuanlyKhachHang/add'; ?>" method="post">
            <table class="admin-form">
                <tr>
                    <td>
                        <a href="<?php echo BASE_URL . 'QuanlyKhachHang/add'; ?>" class="details-button">Thêm mới</a> <!-- Thêm một nút để thêm sản phẩm mới -->
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="levelFilter">Lọc theo Level:</label>
                        <select id="levelFilter" onchange="filterAccounts()">
                            <option value="all">Tất cả</option>
                            <option value="quantri">Admin</option>
                            <option value="nguoidung">User</option>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="admin-table">
                <tr>
                    <th>STT</th>
                    <th>Tên Khách Hàng</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Mật Khẩu</th>
                    <th>Giới Tính</th>
                    <th>Quốc Tịch</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Hình Ảnh</th>
                    <th>Sở Thích</th>
                    <th>Level</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                <?php if (!empty($data["QuanlyKhachHang"])): ?>
                    <?php $i = 0; ?> <!-- Khởi tạo biến STT ở đây -->
                    <?php foreach ($data["QuanlyKhachHang"] as $r): ?>
                        <tr class="account-row" data-level="<?php echo $r['Level']; ?>">
                            <td><?php echo ++$i; ?></td> <!-- Tăng giá trị của $i trước khi hiển thị -->
                            <td><?php echo $r['FullName']; ?></td>
                            <td><?php echo $r['UserName']; ?></td>
                            <td><?php echo $r['PassWord']; ?></td>
                            <td><?php echo $r['Email']; ?></td>
                            <td><?php echo $r['DienThoai']; ?></td>
                            <td><?php echo $r['GioiTinh']; ?></td>
                            <td><?php echo $r['QuocTich']; ?></td>
                            <td><?php echo $r['DiaChi']; ?></td>
                            <td><img src="./public/images/<?php echo $r['HinhAnh']; ?>" width="50" height="50"></td> <!-- Sửa lại cú pháp -->
                            <td><?php echo $r['SoThich']; ?></td>
                            <td><?php echo $r['Level']; ?></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'QuanlyKhachHang/delete/' . $r['UserName']; ?>">Xóa</a></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'QuanlyKhachHang/edit/' . $r['UserName']; ?>">Sửa</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="14">Không có khách hàng nào.</td> <!-- Thông báo nếu không có dữ liệu -->
                    </tr>
                <?php endif; ?>
            </table>
        </form>
    </div>
</body>

</html>
