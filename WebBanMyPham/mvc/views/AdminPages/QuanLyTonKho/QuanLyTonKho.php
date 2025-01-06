
<div class="main">
        <div class="admin-header">
            <h2>Quản Lý Tồn Kho</h2>
        </div>
        <form action="" method="post">
            <table class="admin-form">
            </table>
            <table class="admin-table">
                <tr>
                    <th>STT</th>
                    <th>Mã loại sản phẩm</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá nhập</th>
                    <th>Số lượng tồn</th>
                    <th>Order thêm</th>
                </tr>
                <?php if (!empty($data["Adproduct"])): ?>
                    <?php $i = 0; ?> <!-- Khởi tạo biến STT ở đây -->
                    <?php foreach ($data["Adproduct"] as $r): ?>
                        <tr>
                            <td><?php echo ++$i; ?></td> <!-- Tăng giá trị của $i trước khi hiển thị -->
                            <td><?php echo $r['Ma_loaisp']; ?></td>
                            <td><?php echo $r['ma_sp']; ?></td>
                            <td><?php echo $r['Ten_loaisp']; ?></td>
                            <td><img src="./public/images/<?php echo $r['hinhanh']; ?>" width="50" height="50"></td> <!-- Sửa lại cú pháp -->
                            <td><?php echo $r['gianhap']; ?></td>
                            <td><?php echo $r['soluong']; ?></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'QuanLyTonKho/add/' . $r['ma_sp']; ?>">order</a></td>
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


