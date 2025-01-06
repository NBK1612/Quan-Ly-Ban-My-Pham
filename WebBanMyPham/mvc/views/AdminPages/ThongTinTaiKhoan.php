<body>
    <div class="container">
        <h2>Thông Tin Tài Khoản</h2>

        <!-- Hiển thị thông tin chi tiết khách hàng -->
        <form action="<?php echo BASE_URL . 'Login/update'; ?>" method="POST" enctype="multipart/form-data">
            <div class="account-info">
                <div class="form-group">
                    <label>Họ và tên:</label>
                    <input type="text" name="FullName" value="<?php echo htmlspecialchars($data['FullName']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập:</label>
                    <input type="text" name="UserName" value="<?php echo htmlspecialchars($data['UserName']); ?>" readonly disabled>
                    <!-- Trường hidden để đảm bảo tên đăng nhập được gửi đi khi form submit -->
                    <input type="hidden" name="UserName" value="<?php echo htmlspecialchars($data['UserName']); ?>">
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="Email" value="<?php echo htmlspecialchars($data['Email']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Điện thoại:</label>
                    <input type="text" name="DienThoai" value="<?php echo htmlspecialchars($data['DienThoai']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Giới tính:</label>
                    <select name="GioiTinh" required>
                        <option value="Nam" <?php echo ($data['GioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo ($data['GioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Quốc tịch:</label>
                    <input type="text" name="QuocTich" value="<?php echo htmlspecialchars($data['QuocTich']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" name="DiaChi" value="<?php echo htmlspecialchars($data['DiaChi']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <?php if (!empty($data['HinhAnh'])): ?>
                        <img src="<?php echo BASE_URL . 'public/images/' . htmlspecialchars($data['HinhAnh']); ?>" alt="Hình ảnh khách hàng" class="account-image">
                        <input type="file" name="HinhAnh" accept="image/*">
                    <?php else: ?>
                        <input type="file" name="HinhAnh" accept="image/*">
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Sở thích:</label>
                    <input type="text" name="SoThich" value="<?php echo htmlspecialchars($data['SoThich']); ?>" required>
                </div>


                <button type="submit" class="details-button">Cập nhật thông tin</button>
            </div>
        </form>
    </div>
</body>