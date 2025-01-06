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
        <a href="<?php echo BASE_URL . 'Home'; ?>" class="details-button">Quay lại</a>
        </div>
</body>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        width: 100%;
        max-width: 100%;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        border: 1px solid #e1e1e1;
    }

    h2 {
        margin-top:  50px;
        font-size: 26px;
        color: #333;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .account-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .form-group label {
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 6px;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="email"] {
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f8f9fa;
        color: #333;
        font-size: 15px;
        width: 100%;
    }

    .account-image {
        max-width: 100px;
        max-height: 100px;
        border-radius: 50%;
        margin-top: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    .details-button {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 25px;
        color: #fff;
        background-color: #007bff;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .details-button:hover {
        background-color: #0056b3;
    }
    .no-pointer {
    pointer-events: none; /* Ngừng mọi sự kiện chuột như click, hover */
    background-color: #007bff; /* Đảm bảo màu nền dễ nhận diện */
    color: #333; /* Màu chữ */
    border: 1px solid #ddd; /* Viền nhạt */
}

</style>
