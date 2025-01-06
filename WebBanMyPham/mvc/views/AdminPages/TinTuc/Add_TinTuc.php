<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
</head>
<body>
    <div class="container">
        <h1>Thêm Tin Tức</h1>

        <?php if (!empty($data["error"])): ?>
            <div class="error-message">
                <?php echo $data["error"]; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo BASE_URL . 'TinTuc/add'; ?>" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="txt_matintuc">Mã Tin Tức:</label>
                <input type="text" name="txt_matintuc" id="txt_matintuc" value="<?php echo isset($data["matintuc"]) ? $data["matintuc"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_tieude">Tiêu đề:</label>
                <input type="text" name="txt_tieude" id="txt_tieude" value="<?php echo isset($data["txt_tieude"]) ? $data["txt_tieude"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình Ảnh:</label>
                <input type="file" name="txt_hinhanh" id="txt_hinhanh" required>
            </div>

            <div class="form-group">
                <label for="txt_noidung">Nội Dung:</label>
                <textarea name="txt_noidung" id="txt_noidung" rows="4" required><?php echo isset($data["noidung"]) ? $data["noidung"] : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="txt_create_date">Ngày Nhập:</label>
                <input type="date" name="txt_create_date" id="txt_create_date" value="<?php echo isset($data["create_date"]) ? $data["create_date"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <button type="submit">Thêm Tin Tức</button>
            </div>
        </form>
        <a href="../TinTuc/" class="details-button">Quay lại</a>
    </div>
</body>
</html>
