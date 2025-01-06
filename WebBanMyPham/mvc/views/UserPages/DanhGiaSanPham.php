<!-- views/DanhGiaView.php -->
<div class="review-section">
    <h1 class="section-title">Đánh Giá Sản Phẩm</h1>

    <!-- Hiển thị form đánh giá -->
    <form action="<?php echo BASE_URL; ?>DonHang/themDanhGia" method="POST" class="review-form">
        <input type="hidden" name="mahd" value="<?php echo htmlspecialchars($data['mahd']); ?>">
        <div class="form-group">
            <label for="ten_khach_hang">Tên của bạn:</label>
            <input type="text" id="ten_khach_hang" name="ten_khach_hang" required class="form-control">
        </div>
        
        <div class="form-group">
            <label for="danh_gia">Đánh giá của bạn:</label>
            <textarea id="danh_gia" name="danh_gia" rows="4" required class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="sao">Chọn số sao:</label>
            <select id="sao" name="sao" required class="form-control">
                <option value="">-- Chọn số sao --</option>
                <option value="1">1 Sao</option>
                <option value="2">2 Sao</option>
                <option value="3">3 Sao</option>
                <option value="4">4 Sao</option>
                <option value="5">5 Sao</option>
            </select>
        </div>
        
        <button type="submit" class="btn-submit">Gửi Đánh Giá</button>
    </form>

    <!-- Hiển thị danh sách đánh giá -->
    <h2 class="review-title">Đánh Giá Trước Đây</h2>
    <?php if (!empty($data['danhGia'])): ?>
        <ul class="review-list">
            <?php foreach ($data['danhGia'] as $review): ?>
                <li class="review-item">
                    <div class="review-header">
                        <strong><?php echo htmlspecialchars($review['tenkhachhang']); ?></strong>
                        <span class="rating"><?php echo htmlspecialchars($review['sao']); ?> Sao</span>
                    </div>
                    <p class="review-content"><?php echo nl2br(htmlspecialchars($review['danh_gia'])); ?></p>
                    <small class="review-date">Ngày đánh giá: <?php echo htmlspecialchars($review['ngay_danh_gia']); ?></small>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="no-review">Chưa có đánh giá nào.</p>
    <?php endif; ?>
</div>

<style>
    .review-section {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.section-title, .review-title {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.review-form {
    margin-bottom: 20px;
}

.form-group {
    position: relative;
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    position: absolute;
    top: 10px;
    left: 15px;
    transition: all 0.2s ease-in-out;
    color: #666;
    pointer-events: none; /* Prevent label from blocking input */
}

.form-control {
    width: 75%;
    padding: 12px 15px;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    transition: border 0.3s;
    background: #f9f9f9; /* Màu nền nhẹ cho input */
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
}

.form-control:not(:placeholder-shown) + label,
.form-control:focus + label {
    top: -10px; /* Đưa label lên trên */
    left: 15px;
    font-size: 12px;
    color: #007bff; /* Đổi màu chữ label khi có dữ liệu */
}

input[type="text"] {
    padding: 10px;
    font-size: 16px;
    width: 74%;
    border: 1px solid #4caf50;
    border-radius: 5px;
    background-color: #fff;
    color: #000;
    margin-right: 10px;
}

.btn-submit {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color: #0056b3;
}

.review-list {
    list-style: none;
    padding: 0;
}

.review-item {
    border-bottom: 1px solid #e0e0e0;
    padding: 10px 0;
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.rating {
    background-color: #ffd700;
    padding: 3px 6px;
    border-radius: 3px;
    color: #fff;
}

.review-content {
    margin: 5px 0;
}

.review-date {
    font-size: 12px;
    color: #999;
}

.no-review {
    color: #666;
    text-align: center;
}

</style>
