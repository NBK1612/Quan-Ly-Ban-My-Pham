<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khách Hàng</title>
</head>
<body>
    <div class="container">
        <h2>Thêm Khách Hàng Mới</h2>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (isset($data["error"]) && !empty($data["error"])): ?>
            <div class="error-message">
                <?php echo $data["error"]; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_fullname">Họ và tên:</label>
                <input type="text" id="txt_fullname" name="txt_fullname" value="<?php echo isset($data['FullName']) ? htmlspecialchars($data['FullName']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_username">Tên đăng nhập:</label>
                <input type="text" id="txt_username" name="txt_username" value="<?php echo isset($data['UserName']) ? htmlspecialchars($data['UserName']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_password">Mật khẩu:</label>
                <input type="password" id="txt_password" name="txt_password" required>
            </div>

            <div class="form-group">
                <label for="txt_email">Email:</label>
                <input type="email" id="txt_email" name="txt_email" value="<?php echo isset($data['Email']) ? htmlspecialchars($data['Email']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_dienthoai">Điện thoại:</label>
                <input type="text" id="txt_dienthoai" name="txt_dienthoai" value="<?php echo isset($data['DienThoai']) ? htmlspecialchars($data['DienThoai']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_gioitinh">Giới tính:</label>
                <select id="txt_gioitinh" name="txt_gioitinh" required>
                    <option value="Nam" <?php echo isset($data['GioiTinh']) && $data['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo isset($data['GioiTinh']) && $data['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_quoctich">Quốc tịch:</label>
                <input type="text" id="txt_quoctich" name="txt_quoctich" value="<?php echo isset($data['QuocTich']) ? htmlspecialchars($data['QuocTich']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="txt_diachi">Địa chỉ:</label>
                <input type="text" id="txt_diachi" name="txt_diachi" value="<?php echo isset($data['DiaChi']) ? htmlspecialchars($data['DiaChi']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình ảnh:</label>
                <input type="file" id="txt_hinhanh" name="txt_hinhanh">
            </div>

            <div class="form-group">
                <label for="txt_sothich">Sở thích:</label>
                <input type="text" id="txt_sothich" name="txt_sothich" value="<?php echo isset($data['SoThich']) ? htmlspecialchars($data['SoThich']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="txt_level">Level:</label>
                <select id="txt_level" name="txt_level" required>
                    <option value="nguoidung" <?php echo isset($data['Level']) && $data['Level'] == 'nguoidung' ? 'selected' : ''; ?>>Người dùng</option>
                    <option value="quantri" <?php echo isset($data['Level']) && $data['Level'] == 'quantri' ? 'selected' : ''; ?>>Quản trị</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Thêm Khách Hàng</button>
            </div>
        </form>
        <a href="../QuanlyKhachHang" class="details-button">Quay lại</a>
    </div>
</body>
</html>
