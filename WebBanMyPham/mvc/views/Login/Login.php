<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #007bff;
            margin-top: 0;
        }

        .login-container {
            background-color: #fff;
            border: 1px solid #dddfe2;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #dddfe2;
            border-radius: 4px;
        }

        .login-button {
            background-color: #1877f2;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .login-button:hover {
            background-color: #1467c3;
        }

        .signup-link {
            color: #1877f2;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .user-greeting {
            float: right;
            padding: 14px 16px;
            color: black;
        }
    </style>
</head>
<body>
<div class="login-container">
        <h1>Đăng Nhập</h1>

        <?php if (isset($data['error'])): ?>
            <div class="error-message"><?php echo $data['error']; ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <input name="txt_username" type="text" placeholder="Tài khoản là Email hoặc số điện thoại" required>
            <input name="txt_password" type="password" placeholder="Mật khẩu" required>
            <input name="login" type="submit" value="Đăng nhập" class="login-button">
        </form>
        <p><a href="<?php echo BASE_URL . 'QuanlyKhachHang/DangKy'; ?>" class="signup-link">Tạo tài khoản mới</a></p>
    </div>
</body>
</html>
