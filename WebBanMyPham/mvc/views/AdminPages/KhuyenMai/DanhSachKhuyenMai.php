<div class="main">
    <div class="admin-header">
        <h2>Danh Sách Chương Trình Khuyến Mại</h2>
    </div>
    <a href="<?php echo BASE_URL ?>KhuyenMai/add" class="btn">Thêm Khuyến Mại</a>
    <table class="admin-table">
        <tr>
            <th>STT</th>
            <th>Tên Khuyến Mại</th>
            <th>Mô Tả</th>
            <th>Giảm Giá</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Hành Động</th>
        </tr>
        <?php if (!empty($data["khuyenmai"])): ?>
            <?php $i = 0; ?>
            <?php foreach ($data["khuyenmai"] as $km): ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $km['tenKM']; ?></td>
                    <td><?php echo $km['moTa']; ?></td>
                    <td><?php echo $km['giamGia']; ?>%</td>
                    <td><?php echo $km['ngayBD']; ?></td>
                    <td><?php echo $km['ngayKT']; ?></td>
                    <td>
                        <a href="<?php echo BASE_URL . 'KhuyenMai/update/' . $km['id']; ?>" class="details-button">Cập nhật</a>
                        <a href="<?php echo BASE_URL . 'KhuyenMai/delete/' . $km['id']; ?>" class="details-button">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Không có chương trình khuyến mại nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<script>
    document.querySelectorAll('.details-button').forEach(button => {
    button.addEventListener('click', function(event) {
        if (this.textContent.trim() === 'Xóa' && !confirm('Bạn có chắc muốn xóa?')) {
            event.preventDefault();
        }
    });
});

</script>
