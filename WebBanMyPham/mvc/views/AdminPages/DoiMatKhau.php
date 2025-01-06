<form action="" method="POST" class="change-password-form">
    <h2>Đổi Mật Khẩu</h2>

    <table>
        <tr>
            <td><label for="MatKhauCu">Mật khẩu cũ:</label></td>
            <td><input type="password" name="MatKhauCu" id="MatKhauCu" required></td>
        </tr>
        <tr>
            <td><label for="MatKhauMoi">Mật khẩu mới:</label></td>
            <td><input type="password" name="MatKhauMoi" id="MatKhauMoi" required></td>
        </tr>
        <tr>
            <td><label for="MatKhauMoiNhapLai">Nhập lại mật khẩu mới:</label></td>
            <td><input type="password" name="MatKhauMoiNhapLai" id="MatKhauMoiNhapLai" required></td>
        </tr>
    </table>

    <button type="submit" class="submit-btn">Đổi mật khẩu</button>
</form>



<style>
   /* Đặt nền cho toàn bộ form */
.change-password-form {
    max-width: 500px;
    margin: 50px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
    color: #333;
}

/* Tiêu đề form */
.change-password-form h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Tạo bảng với đường viền và căn chỉnh */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

td {
    padding: 10px;
    vertical-align: middle;
}

/* Định dạng label */
td label {
    font-weight: bold;
    color: #555;
    display: inline-block;
}

/* Định dạng các trường nhập liệu */
td input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s;
}

/* Đổi màu viền khi focus vào input */
td input:focus {
    border-color: #007bff;
    outline: none;
}

/* Button Đổi mật khẩu */
.submit-btn {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
}

.submit-btn:hover {
    background-color: #0056b3;
}

.submit-btn:active {
    background-color: #004085;
}

/* Hiệu ứng hover cho input */
td input:hover {
    border-color: #007bff;
}

/* Tạo độ mượt cho transition */
button, input {
    transition: all 0.3s ease;
}

</style>