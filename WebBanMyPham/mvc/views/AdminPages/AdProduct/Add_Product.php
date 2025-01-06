<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <div class="container">
        <h1>Thêm Sản Phẩm</h1>

        <?php if (!empty($data["error"])): ?>
            <div class="error-message">
                <?php echo $data["error"]; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo BASE_URL . 'AdProduct/add'; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_maloaisp">Mã Loại Sản Phẩm:</label>
                <select name="txt_maloaisp" id="txt_maloaisp" required>
                    <option value="" disabled selected>-- Chọn loại sản phẩm --</option>
                    <?php if (!empty($data["allMaLoaiSanPham"])): ?>
                        <?php foreach ($data["allMaLoaiSanPham"] as $maloaisp): ?>
                            <option value="<?php echo htmlspecialchars($maloaisp['Ma_loaisp']); ?>"><?php echo htmlspecialchars($maloaisp['Ma_loaisp']); ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">Không có loại sản phẩm</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_masp">Mã Sản Phẩm:</label>
                <input type="text" name="txt_masp" id="txt_masp" value="<?php echo isset($data["ma_sp"]) ? $data["ma_sp"] : ''; ?>" required>
            </div>


            <div class="form-group">
                <label for="txt_tenloaisp">Tên Sản Phẩm:</label>
                <input type="text" name="txt_tenloaisp" id="txt_tenloaisp" value="<?php echo isset($data["txt_tenloaisp"]) ? $data["txt_tenloaisp"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình Ảnh:</label>
                <input type="file" name="txt_hinhanh" id="txt_hinhanh" required>
            </div>

            <div class="form-group">
                <label for="txt_gianhap">Giá Nhập:</label>
                <input type="number" name="txt_gianhap" id="txt_gianhap" value="<?php echo isset($data["gianhap"]) ? $data["gianhap"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_giaxuat">Giá Xuất:</label>
                <input type="number" name="txt_giaxuat" id="txt_giaxuat" value="<?php echo isset($data["giaxuat"]) ? $data["giaxuat"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_soluong">Số Lượng:</label>
                <input type="number" name="txt_soluong" id="txt_soluong" value="<?php echo isset($data["soluong"]) ? $data["soluong"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_khuyenmai">Khuyến Mãi (%):</label>
                <input type="number" name="txt_khuyenmai" id="txt_khuyenmai" value="<?php echo isset($data["khuyenmai"]) ? $data["khuyenmai"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_motaloaisp">Mô Tả:</label>
                <textarea name="txt_motaloaisp" id="txt_motaloaisp" rows="4" required><?php echo isset($data["Mota_loaisp"]) ? $data["Mota_loaisp"] : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="txt_create_date">Ngày Nhập:</label>
                <input type="date" name="txt_create_date" id="txt_create_date" value="<?php echo isset($data["create_date"]) ? $data["create_date"] : ''; ?>" required>
            </div>

            <div class="form-group">
                <button type="submit">Thêm Sản Phẩm</button>
            </div>
        </form>
        <a href="../AdProduct/" class="details-button">Quay lại</a>
    </div>
</body>
</html>
