<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức</title>
    <link href="<?php echo BASE_URL . 'public/styles/styleHome.css'; ?>" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .news-detail img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .news-date {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .news-content {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!empty($data['tintuc'])): ?>
            <?php $tin = $data['tintuc']; ?>
            <h1><?php echo $tin['tieude']; ?></h1>
            <div class="news-detail">
                <p class="news-date">Ngày tạo: <?php echo date("d-m-Y", strtotime($tin['ngaytao'])); ?></p>
                <img src="<?php echo BASE_URL . 'public/images/' . $tin['hinhanh']; ?>" alt="Hình ảnh tin tức">
                <div class="news-content">
                    <?php echo nl2br($tin['noidung']); ?>
                </div>
            </div>
        <?php else: ?>
            <p>Tin tức không tồn tại hoặc đã bị xóa.</p>
        <?php endif; ?>
        <div class="back-link">
            <a href="<?php echo BASE_URL . 'Home'; ?>">Quay lại Trang Chủ</a>
        </div>
    </div>
</body>
</html>
