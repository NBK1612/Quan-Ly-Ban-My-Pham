<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <div class="container">
        <h1>Thêm loại Sản Phẩm</h1>

        <?php if (!empty($data["error"])): ?>
            <div class="error-message">
                <?php echo $data["error"]; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo BASE_URL . 'AdProductType/add'; ?>" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="txt_masp">Mã loại Sản Phẩm:</label>
                <input type="text" name="txt_maloaisp" id="txt_masp" value="<?php echo isset($data["ma_sp"]) ? $data["ma_sp"] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="txt_masp">Tên loại Sản Phẩm:</label>
                <input type="text" name="txt_tenloaisp" id="txt_masp" value="<?php echo isset($data["ma_sp"]) ? $data["ma_sp"] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="txt_motaloaisp">Mô Tả:</label>
                <textarea name="txt_motaloaisp" id="txt_motaloaisp" rows="4" required><?php echo isset($data["Mota_loaisp"]) ? $data["Mota_loaisp"] : ''; ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit">Thêm Loại Sản Phẩm</button>
            </div>
        </form>
        <a href="../AdProductType/" class="details-button">Quay lại</a>
    </div>
</body>
</html>
