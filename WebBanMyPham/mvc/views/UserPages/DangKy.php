<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script>
        function validatePassword() {
            var password = document.getElementById("txt_password").value;
            var errorMessage = "";

            if (password.length < 8) {
                errorMessage += "Mật khẩu phải có ít nhất 8 ký tự.\n";
            }
            if (!/[A-Z]/.test(password)) {
                errorMessage += "Mật khẩu phải có ít nhất 1 ký tự chữ hoa.\n";
            }
            if (!/[a-z].*[a-z].*[a-z]/.test(password)) {
                errorMessage += "Mật khẩu phải có ít nhất 3 ký tự chữ thường.\n";
            }
            if (!/[0-9]/.test(password)) {
                errorMessage += "Mật khẩu phải có ít nhất 3 ký tự số.\n";
            }
            if (!/[^A-Za-z0-9]/.test(password)) {
                errorMessage += "Mật khẩu phải có ít nhất 1 ký tự đặc biệt.\n";
            }

            if (errorMessage) {
                alert(errorMessage);
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Đăng ký</h2>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (isset($data["error"]) && !empty($data["error"])): ?>
            <div class="error-message">
                <?php echo $data["error"]; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validatePassword()">
            <div class="form-group">
                <label for="txt_fullname">Họ và tên:</label>
                <input type="text" id="txt_fullname" name="txt_fullname" value="<?php echo isset($data['FullName']) ? htmlspecialchars($data['FullName']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_username">Tên đăng nhập:</label>
                <input type="text" id="txt_username" name="txt_username" value="<?php echo isset($data['UserName']) ? htmlspecialchars($data['UserName']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_password">Mật khẩu:</label>
                <input type="password" id="txt_password" name="txt_password" required>
            </div>

            <div class="form-group">
                <label for="txt_email">Email:</label>
                <input type="email" id="txt_email" name="txt_email" value="<?php echo isset($data['Email']) ? htmlspecialchars($data['Email']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_dienthoai">Điện thoại:</label>
                <input type="text" id="txt_dienthoai" name="txt_dienthoai" value="<?php echo isset($data['DienThoai']) ? htmlspecialchars($data['DienThoai']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_gioitinh">Giới tính:</label>
                <select id="txt_gioitinh" name="txt_gioitinh" required>
                    <option value="Nam" <?php echo isset($data['GioiTinh']) && $data['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo isset($data['GioiTinh']) && $data['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_quoctich">Quốc tịch:</label>
                <input type="text" id="txt_quoctich" name="txt_quoctich" value="<?php echo isset($data['QuocTich']) ? htmlspecialchars($data['QuocTich']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="txt_diachi">Địa chỉ:</label>
                <input type="text" id="txt_diachi" name="txt_diachi" value="<?php echo isset($data['DiaChi']) ? htmlspecialchars($data['DiaChi']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="txt_hinhanh">Hình ảnh:</label>
                <input type="file" id="txt_hinhanh" name="txt_hinhanh">
            </div>

            <div class="form-group">
                <label for="txt_sothich">Sở thích:</label>
                <input type="text" id="txt_sothich" name="txt_sothich" value="<?php echo isset($data['SoThich']) ? htmlspecialchars($data['SoThich']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="txt_level">Level:</label>
                <select id="txt_level" name="txt_level" required>
                    <option value="nguoidung" <?php echo isset($data['Level']) && $data['Level'] == 'nguoidung' ? 'selected' : ''; ?>>Người dùng</option>
                    <option value="quantri" <?php echo isset($data['Level']) && $data['Level'] == 'quantri' ? 'selected' : ''; ?>>Quản trị</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Đăng ký</button>
            </div>
        </form>
    </div>
</body>
</html>


<style>

    /* Đặt nền cho toàn trang */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Cấu hình cho container */
.container {
    max-width: 100%;
    width: 100%;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Tiêu đề */
h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Thông báo lỗi */
.error-message {
    color: #d9534f;
    background-color: #f2dede;
    border: 1px solid #ebccd1;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

/* Cấu trúc form */
.form-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 15px;
}

/* Nhãn của các trường */
.form-group label {
    font-size: 16px;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
}

/* Các trường nhập liệu */
.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"],
.form-group input[type="file"],
.form-group select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="password"]:focus,
.form-group input[type="file"]:focus,
.form-group select:focus {
    border-color: #007bff;
    outline: none;
}

/* Nút submit */
button[type="submit"] {
    background-color: #28a745;
    color: #fff;
    font-size: 18px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #218838;
}

/* Liên kết quay lại */
.details-button {
    display: inline-block;
    margin-top: 20px;
    font-size: 16px;
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s;
}

.details-button:hover {
    color: #0056b3;
}

/* Ảnh */
.form-group img {
    max-width: 200px;
    margin: 10px 0;
    border-radius: 5px;
}

/* Media query cho di động */
@media (max-width: 600px) {
    .container {
        padding: 20px;
    }

    h2 {
        font-size: 20px;
    }

    button[type="submit"] {
        font-size: 16px;
        padding: 8px 15px;
    }
}

</style>