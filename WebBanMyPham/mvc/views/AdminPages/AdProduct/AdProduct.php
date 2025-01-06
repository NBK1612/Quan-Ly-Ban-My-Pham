<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Danh Mục Sản Phẩm</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> Thêm liên kết đến file CSS của bạn -->
</head>
<body>
    <div class="main">
        <div class="admin-header">
            <h2>Quản Lý Danh Mục Sản Phẩm</h2>
        </div>
        <form action="<?php echo BASE_URL . 'AdProduct/add'; ?>"  method="post">
            <table class="admin-form">
                <tr>          
                    <td>
                    <a href="<?php echo BASE_URL . 'AdProduct/add'; ?>" class="details-button">Thêm mới</a> <!-- Thêm một nút để thêm sản phẩm mới -->
                    </td>
                </tr>
            </table>
            <table class="admin-table">
                <tr>
                    <th>STT</th>
                    <th>Mã loại sản phẩm</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá nhập</th>
                    <th>Giá xuất</th>
                    <th>Số lượng</th>
                    <th>Khuyến mãi</th>
                    <th>Mô tả</th>
                    <th>Ngày nhập</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                <?php if (!empty($data["Adproduct"])): ?>
                    <?php $i = 0; ?> <!-- Khởi tạo biến STT ở đây -->
                    <?php foreach ($data["Adproduct"] as $r): ?>
                        <tr>
                            <td><?php echo ++$i; ?></td> <!-- Tăng giá trị của $i trước khi hiển thị -->
                            <td><?php echo $r['Ma_loaisp']; ?></td>
                            <td><?php echo $r['ma_sp']; ?></td>
                            <td><?php echo $r['Ten_loaisp']; ?></td>
                            <td><img src="<?php echo BASE_URL .'public/images';?>/<?php echo $r['hinhanh']; ?>" width="50" height="50"></td>
                            <td><?php echo $r['gianhap']; ?></td>
                            <td><?php echo $r['giaxuat']; ?></td>
                            <td><?php echo $r['soluong']; ?></td>
                            <td><?php echo $r['khuyenmai']; ?>%</td>
                            <td><?php echo $r['Mota_loaisp']; ?></td>
                            <td><?php echo $r['create_date']; ?></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'Adproduct/delete/' . $r['ma_sp']; ?>">Xóa</a></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'Adproduct/edit/' . $r['ma_sp']; ?>">Sửa</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12">Không có sản phẩm nào.</td> <!-- Thông báo nếu không có dữ liệu -->
                    </tr>
                <?php endif; ?>
            </table>
        </form>
    </div>
</body>
</html>

