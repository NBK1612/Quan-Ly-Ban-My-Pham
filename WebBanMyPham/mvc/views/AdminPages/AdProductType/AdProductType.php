<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loại sản phẩm</title>
</head>

<body>
    <div class="main">
        <div class="admin-header">
            <h2>Quản lý loại sản phẩm</h2>
        </div>
        <div class="admin-content">
            <form action="<?php echo BASE_URL . 'AdProductType/add'; ?>" method="post">
                <?php if (isset($data['error'])): ?>
                    <div class="error-message" style="color: red;">
                        <?php echo $data['error']; ?>
                    </div>
                <?php endif; ?>

                <table class="admin-form">
                    <tr>
                        <td>
                            <a href="<?php echo BASE_URL . 'AdProductType/add'; ?>" class="details-button">Thêm mới</a>
                        </td>
                    </tr>
                </table>
                </table>
            </form>
            <!-- <form action="<?php echo BASE_URL . 'AdProductType/search'; ?>" method="get">
                <input type="text" name="search" placeholder="Nhập mã hoặc tên loại sản phẩm">
                <button type="submit" class="details-button">Tìm kiếm</button>
            </form> -->

            <!-- Bảng thông tin sản phẩm -->
            <table class="admin-table">
                <tr>
                    <th>Mã loại sản phẩm</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Mô tả loại sản phẩm</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                <?php if (!empty($data["Adproducttype"])): ?>
                    <?php foreach ($data["Adproducttype"] as $r): ?>
                        <tr>
                            <td><?php echo $r['Ma_loaisp']; ?></td>
                            <td><?php echo $r['Ten_loaisp']; ?></td>
                            <td><?php echo $r['Mota_loaisp']; ?></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'AdProductType/delete/' . $r['Ma_loaisp']; ?>">Xóa</a></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'AdProductType/edit/' . $r['Ma_loaisp']; ?>">Sửa</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Không tìm thấy kết quả nào.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>

</html>