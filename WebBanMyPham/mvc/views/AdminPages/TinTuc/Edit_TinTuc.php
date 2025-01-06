<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa tin tức</title>
</head>
<body>

    <div class="container">
        <h2>Chỉnh sửa tin tức</h2>

        <?php if (isset($data['error'])): ?>
            <div class="error"><?php echo $data['error']; ?></div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_matintuc">Mã tin tức</label>
                <input type="text" name="txt_matintuc" value="<?php echo htmlspecialchars($data['TinTuc']['matintuc']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_tieude">Tiêu đề</label>
                <input type="text" name="txt_tieude" value="<?php echo htmlspecialchars($data['TinTuc']['tieude']); ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình ảnh</label>
                <input type="file" name="txt_hinhanh" accept="image/*">
                <?php if (!empty($data['Adproduct']['hinhanh'])): ?>
                    <img src="<?php echo BASE_URL . 'public/images/' . $data['TinTuc']['hinhanh']; ?>" alt="Hình ảnh sản phẩm">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="txt_noidung">Nội dung</label>
                <textarea name="txt_noidung" rows="5" required><?php echo htmlspecialchars($data['TinTuc']['noidung']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="txt_create_date">Ngày tạo</label>
                <input type="date" name="txt_create_date" value="<?php echo htmlspecialchars($data['TinTuc']['create_date']); ?>" required>
            </div>

            <button type="submit">Cập nhật</button>
        </form>

        <div class="back-link">
            <a href="<?php echo BASE_URL . 'TinTuc'; ?>">Quay lại danh sách tin tức</a>
        </div>
    </div>

</body>
</html>
