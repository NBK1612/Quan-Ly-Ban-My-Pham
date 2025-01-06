<div class="main">
    <title>Chỉnh sửa trạng thái đơn hàng</title>
    <h1>Chỉnh sửa trạng thái đơn hàng</h1>
    
    <?php if(!empty($data["order"])): ?>
    <table class="admin-table">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái đơn hàng</th>
            <th>Chỉnh sửa trạng thái</th>
        </tr>
        <tr>
            <td><?php echo $data["order"]["mahd"]; ?></td>
            <td><?php echo $data["order"]["tenkh"]; ?></td>
            <td><?php echo $data["order"]["tongtien"]; ?></td>
            <td><?php echo $data["order"]["create_date"]; ?></td>
            <td><?php echo $data["order"]["trangthai"]; ?></td>
            <td>
                <form action="<?php echo BASE_URL . 'Quanlydonhang/chinhSua/' . $data['order']['mahd']; ?>" method="POST">
                    <select name="trangthai">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="choxuly">Đang chờ xử lý</option>
                        <option value="danggiaohang">Đang giao hàng</option>
                        <option value="dathanhtoan">Đã thanh toán</option>
                    </select>
                    <button type="submit">Gửi</button>
                </form>
            </td>
        </tr>
    </table>
    <?php else: ?>
    <div>
        <p>Không có đơn hàng nào</p>
    </div>
    <?php endif; ?>
    
    <a href="<?php echo BASE_URL ?>./Quanlydonhang" class="details-button">Quay lại</a>
</div>

<style>
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .admin-table th, .admin-table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    .admin-table th {
        background-color: #f2f2f2;
        color: #333;
    }
    .btn {
        display: inline-block;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }
    .btn:hover {
        background-color: #0056b3;
    }
</style>
