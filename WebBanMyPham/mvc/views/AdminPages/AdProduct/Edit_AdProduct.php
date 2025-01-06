<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
</head>
<body>

    <div class="container">
        <h2>Chỉnh sửa sản phẩm</h2>

        <?php if (isset($data['error'])): ?>
            <div class="error"><?php echo $data['error']; ?></div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_maloaisp">Mã loại sản phẩm</label>
                <input type="text" name="txt_maloaisp" value="<?php echo htmlspecialchars($data['Adproduct']['Ma_loaisp']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_tenloaisp">Tên sản phẩm</label>
                <input type="text" name="txt_tenloaisp" value="<?php echo htmlspecialchars($data['Adproduct']['Ten_loaisp']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_gianhap">Giá nhập</label>
                <input type="number" name="txt_gianhap" value="<?php echo htmlspecialchars($data['Adproduct']['gianhap']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_giaxuat">Giá xuất</label>
                <input type="number" name="txt_giaxuat" value="<?php echo htmlspecialchars($data['Adproduct']['giaxuat']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_soluong">Số lượng</label>
                <input type="number" name="txt_soluong" value="<?php echo htmlspecialchars($data['Adproduct']['soluong']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_khuyenmai">Khuyến mãi</label>
                <input type="text" name="txt_khuyenmai" value="<?php echo htmlspecialchars($data['Adproduct']['khuyenmai']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_motaloaisp">Mô tả sản phẩm</label>
                <textarea name="txt_motaloaisp" rows="5" required><?php echo htmlspecialchars($data['Adproduct']['Mota_loaisp']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="txt_create_date">Ngày tạo</label>
                <input type="date" name="txt_create_date" value="<?php echo htmlspecialchars($data['Adproduct']['create_date']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình ảnh</label>
                <input type="file" name="txt_hinhanh" accept="image/*">
                <?php if (!empty($data['Adproduct']['hinhanh'])): ?>
                    <img src="<?php echo BASE_URL . 'public/images/' . $data['Adproduct']['hinhanh']; ?>" alt="Hình ảnh sản phẩm">
                <?php endif; ?>
            </div>

            <button type="submit">Cập nhật</button>
        </form>

        <div class="back-link">
            <a href="<?php echo BASE_URL . 'AdProduct'; ?>">Quay lại danh sách sản phẩm</a>
        </div>
    </div>

</body>
</html>
