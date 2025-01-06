<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhà Cung Cấp</title>
    <link href="<?php echo BASE_URL . 'public/styles/styleNhaCungCap.css?v=' . time(); ?>" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <h2>Thêm Nhà Cung Cấp Mới</h2>
        <form action="<?php echo BASE_URL . 'NhaCungCap/themNhaCungCap'; ?>" method="POST">
            <div class="input-group">
                <label for="ten_ncc">Tên Nhà Cung Cấp:</label>
                <input type="text" id="ten_ncc" name="ten_ncc" required placeholder="Nhập tên nhà cung cấp">
            </div>

            <div class="input-group">
                <label for="dia_chi">Địa Chỉ:</label>
                <input type="text" id="dia_chi" name="dia_chi" required placeholder="Nhập địa chỉ">
            </div>

            <div class="input-group">
                <label for="so_dien_thoai">Số Điện Thoại:</label>
                <input type="text" id="so_dien_thoai" name="so_dien_thoai" required placeholder="Nhập số điện thoại">
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Nhập email">
            </div>

            <div class="input-group">
                <label for="nguoi_lien_he">Người Liên Hệ:</label>
                <input type="text" id="nguoi_lien_he" name="nguoi_lien_he" required placeholder="Nhập người liên hệ">
            </div>

            <button type="submit">Thêm Nhà Cung Cấp</button>

            <a href="<?php echo BASE_URL . 'NhaCungCap'; ?>" class="back-link">Quay Lại</a>
        </form>
    </div>
</body>
</html>
