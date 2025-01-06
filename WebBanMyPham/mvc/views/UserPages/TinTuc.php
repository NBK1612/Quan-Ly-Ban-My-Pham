<!-- views/TinTucView.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tin Tức</title>
    <style>
        .news-section {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .news-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .news-item {
            border-bottom: 1px solid #e0e0e0;
            padding: 15px 0;
        }
        .news-title {
            font-size: 22px;
            color: #007bff;
            margin: 0;
        }
        .news-title a {
            text-decoration: none;
            color: #007bff;
        }
        .news-title a:hover {
            text-decoration: underline;
        }
        .news-date {
            font-size: 14px;
            color: #999;
        }
        .news-summary {
            font-size: 16px;
            margin-top: 10px;
            word-wrap: break-word; /* Thêm thuộc tính này */
            word-break: break-word; /* Thêm thuộc tính này */
        }
    </style>
</head>
<body>
<div class="news-section">
        <h1 class="news-header">Tin Tức Về Mỹ Phẩm</h1>

        <?php foreach ($data["TinTuc"] as $tin): ?>
            <div class="news-item">
                <h2 class="news-title">
                    <a href="<?php echo BASE_URL . 'Home/TinTuc/getDetailsTinTuc/'. $tin['matintuc']; ?>">
                        <?php echo $tin['tieude']; ?>
                    </a>
                </h2>
                <p class="news-date">Ngày đăng: <?php echo date("d-m-Y", strtotime($tin['create_date'])); ?></p>
                <img src="<?php echo BASE_URL . 'public/images/' . $tin['hinhanh']; ?>" alt="<?php echo $tin['tieude']; ?>" class="news-image" style="width: 200px; height: 200px;">
                <p class="news-summary"><?php echo $tin['noidung']; ?></p>
            </div>
        <?php endforeach; ?>
        
    </div>
</body>
</html>
