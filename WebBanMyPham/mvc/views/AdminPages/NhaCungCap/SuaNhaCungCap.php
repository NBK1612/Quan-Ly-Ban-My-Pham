<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Nhà Cung Cấp</title>
    <link href="<?php echo BASE_URL . 'public/styles/styleNhaCungCap.css?v=' . time(); ?>" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <h2>Sửa Thông Tin Nhà Cung Cấp</h2>
        <form action="<?php echo BASE_URL . 'NhaCungCap/suaNhaCungCap/' . $data['nhacungcap']['MaNCC']; ?>" method="POST">
            <div class="input-group">
                <label for="ten_ncc">Tên Nhà Cung Cấp:</label>
                <input type="text" id="ten_ncc" name="ten_ncc" value="<?php echo htmlspecialchars($data['nhacungcap']['TenNCC']); ?>" required>
            </div>

            <div class="input-group">
                <label for="dia_chi">Địa Chỉ:</label>
                <input type="text" id="dia_chi" name="dia_chi" value="<?php echo htmlspecialchars($data['nhacungcap']['DiaChi']); ?>" required>
            </div>

            <div class="input-group">
                <label for="so_dien_thoai">Số Điện Thoại:</label>
                <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="<?php echo htmlspecialchars($data['nhacungcap']['SoDienThoai']); ?>" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['nhacungcap']['Email']); ?>" required>
            </div>

            <div class="input-group">
                <label for="nguoi_lien_he">Người Liên Hệ:</label>
                <input type="text" id="nguoi_lien_he" name="nguoi_lien_he" value="<?php echo htmlspecialchars($data['nhacungcap']['NguoiLienHe']); ?>" required>
            </div>

            <button type="submit">Cập Nhật</button>
            <a href="<?php echo BASE_URL . 'NhaCungCap'; ?>" class="back-link">Quay Lại</a>
        </form>
    </div>
</body>
</html>
