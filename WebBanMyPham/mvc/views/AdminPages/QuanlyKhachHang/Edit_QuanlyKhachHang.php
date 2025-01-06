<div class="container">
        <h2>Chỉnh Sửa Khách Hàng</h2>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (isset($data["error"]) && !empty($data["error"])): ?>
            <p class="error"><?php echo $data["error"]; ?></p>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_fullname">Họ và tên:</label>
                <input type="text" id="txt_fullname" name="txt_fullname" value="<?php echo isset($data['FullName']) ? $data['FullName'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_username">Tên đăng nhập:</label>
                <input type="text" id="txt_username" name="txt_username" value="<?php echo isset($data['UserName']) ? $data['UserName'] : ''; ?>" readonly><br>
            </div>

            <div class="form-group">
                <label for="txt_password">Mật khẩu:</label>
                <input type="password" id="txt_password" name="txt_password" value="<?php echo isset($data['PassWord']) ? $data['PassWord'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_email">Email:</label>
                <input type="email" id="txt_email" name="txt_email" value="<?php echo isset($data['Email']) ? $data['Email'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_dienthoai">Điện thoại:</label>
                <input type="text" id="txt_dienthoai" name="txt_dienthoai" value="<?php echo isset($data['DienThoai']) ? $data['DienThoai'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_gioitinh">Giới tính:</label>
                <select id="txt_gioitinh" name="txt_gioitinh">
                    <option value="Nam" <?php echo isset($data['GioiTinh']) && $data['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo isset($data['GioiTinh']) && $data['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                </select><br>
            </div>

            <div class="form-group">
                <label for="txt_quoctich">Quốc tịch:</label>
                <input type="text" id="txt_quoctich" name="txt_quoctich" value="<?php echo isset($data['QuocTich']) ? $data['QuocTich'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_diachi">Địa chỉ:</label>
                <input type="text" id="txt_diachi" name="txt_diachi" value="<?php echo isset($data['DiaChi']) ? $data['DiaChi'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình ảnh:</label>
                <input type="file" id="txt_hinhanh" name="txt_hinhanh"><br>
                <!-- Hiển thị ảnh hiện tại nếu có -->
                <?php if (isset($data['HinhAnh']) && !empty($data['HinhAnh'])): ?>
                    <img src="<?php echo BASE_URL . "public/images/" . $data['HinhAnh']; ?>" alt="Hình ảnh khách hàng" style="max-width: 150px;">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="txt_sothich">Sở thích:</label>
                <input type="text" id="txt_sothich" name="txt_sothich" value="<?php echo isset($data['SoThich']) ? $data['SoThich'] : ''; ?>"><br>
            </div>

            <div class="form-group">
                <label for="txt_level">Level:</label>
                <select id="txt_level" name="txt_level">
                    <option value="nguoidung" <?php echo isset($data['Level']) && $data['Level'] == 'nguoidung' ? 'selected' : ''; ?>>Người dùng</option>
                    <option value="quantri" <?php echo isset($data['Level']) && $data['Level'] == 'quantri' ? 'selected' : ''; ?>>Quản trị</option>
                </select><br>
            </div>

            <button type="submit">Cập nhật</button>
        </form>
    </div>