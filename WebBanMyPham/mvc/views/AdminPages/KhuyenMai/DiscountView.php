
<div class="container">
    <title>Quản lý mã giảm giá</title>
    <h1>Quản lý mã giảm giá</h1>

    <!-- Form tạo mã giảm giá -->
    <form action="<?php echo BASE_URL . 'DiscountController/create'; ?>" method="POST">
        <div class="form-group">
            <label for="discount_percentage">Phần trăm giảm giá (%):</label>
            <input type="number" name="discount_percentage" id="discount_percentage" placeholder="Nhập % giảm giá" required min="1" max="100">
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>
        <div class="form-group">
            <button type="submit" class="details-button">Tạo mã giảm giá</button>
        </div>
    </form>

    <!-- Hiển thị danh sách mã giảm giá đã tạo -->
    <h2>Danh sách mã giảm giá</h2>
    <table class="admin-table">
        <tr>
            <th>STT</th>
            <th>Mã giảm giá</th>
            <th>Phần trăm giảm</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Xóa</th>
        </tr>
        <?php if (!empty($data['discounts'])): ?>
            <?php $i = 0; ?>
            <?php foreach ($data['discounts'] as $discount): ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $discount['code']; ?></td>
                    <td><?php echo $discount['discount_percentage']; ?>%</td>
                    <td><?php echo $discount['start_date']; ?></td>
                    <td><?php echo $discount['end_date']; ?></td>
                    <td><a class="details-button" href="<?php echo BASE_URL . 'DiscountController/delete/' . $discount['id']; ?>">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Chưa có mã giảm giá nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
