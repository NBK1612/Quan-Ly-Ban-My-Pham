<!-- views/ThemGopYView.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Góp Ý Khách Hàng</title>
    <style>
        .feedback-form-section {
            max-width: 80%;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .submit-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<?php
// Kiểm tra nếu chưa đăng nhập
if (!isset($_SESSION['user'])) {
    // Chuyển hướng đến trang đăng nhập
    header("Location: " . BASE_URL . "Login");
    exit();
}
?>

<body>
    <div class="feedback-form-section">
        <h1 class="form-header">Thêm Góp Ý Của Bạn</h1>
        
        <form action="<?php echo BASE_URL; ?>GopY/themGopY" method="POST">
            <div class="form-group">
                <label for="tenkh">Tên Khách Hàng:</label>
                <input type="text" id="tenkh" name="tenkh" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            
            <div class="form-group">
                <label for="noi_dung">Nội Dung Góp Ý:</label>
                <textarea id="noi_dung" name="noi_dung" required></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Gửi Góp Ý</button>
        </form>
    </div>
</body>
</html>
