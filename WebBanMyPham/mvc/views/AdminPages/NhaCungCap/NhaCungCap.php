<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhà Cung Cấp</title>
    <link href="<?php echo BASE_URL . 'public/styles/styleNhaCungCap.css?v=' . time(); ?>" rel="stylesheet"/>
</head>
<body>
    <div class="container1">
        <h2>Danh Sách Nhà Cung Cấp</h2>
        <a href="<?php echo BASE_URL . 'NhaCungCap/themNhaCungCap'; ?>" class="add-link">Thêm Mới</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Mã NCC</th>
                    <th>Tên NCC</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Người Liên Hệ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['nhacungcap'] as $ncc): ?>
                    <tr>
                        <td><?php echo $ncc['MaNCC']; ?></td>
                        <td><?php echo $ncc['TenNCC']; ?></td>
                        <td><?php echo $ncc['DiaChi']; ?></td>
                        <td><?php echo $ncc['SoDienThoai']; ?></td>
                        <td><?php echo $ncc['Email']; ?></td>
                        <td><?php echo $ncc['NguoiLienHe']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL . 'NhaCungCap/suaNhaCungCap/' . $ncc['MaNCC']; ?>" class="edit-link">Sửa</a> 
                            <a href="<?php echo BASE_URL . 'NhaCungCap/xoaNhaCungCap/' . $ncc['MaNCC']; ?>" class="delete-link" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

