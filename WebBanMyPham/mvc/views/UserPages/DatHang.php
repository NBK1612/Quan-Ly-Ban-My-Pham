<style>
    .container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    h1 {
        text-align: center;
        color: #007bff;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admin-table td {
        padding: 10px;
        vertical-align: top;
    }

    .admin-table label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .admin-table input[type="text"],
    .admin-table input[type="email"],
    .admin-table input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        color: black;
    }

    button[type="submit"] {
        background-color: #a8d3ff;
        color: black;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
        display: block;
        width: 100%;
    }
    
    button[type="submit"]:hover {
        background-color: #007bff;
    }

    @media (max-width: 600px) {
        .container {
            width: 90%;
        }

        .admin-table td {
            display: block;
            width: 100%;
        }
    }
</style>

<div class="container">
    <title>Đặt hàng</title>
    <h1>Thông tin đặt hàng</h1>
    <form action="<?php echo BASE_URL . 'DatHang/add'; ?>" method="POST">
        <table class="admin-table">
            <tr>
                <td>
                    <label for="tenkh">Tên khách hàng:</label>
                    <input type="text" name="tenkh" id="tenkh" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" name="phone" id="phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="diachi_lh">Địa chỉ liên hệ:</label>
                    <input type="text" name="diachi_lh" id="diachi_lh" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="diachi_gh">Địa chỉ giao hàng:</label>
                    <input type="text" name="diachi_gh" id="diachi_gh" required>
                </td>
            </tr>
        </table>
        <?php if (isset($data["thongbao"]) && $data["thongbao"] != ""): ?>
        <?php echo $data["thongbao"]; ?>
        <?php endif; ?>
        <button type="submit">Đặt hàng</button>
    </form>
    <a href="<?php echo BASE_URL . 'GioHang'; ?>" class="details-button">Quay lại</a>
</div>
