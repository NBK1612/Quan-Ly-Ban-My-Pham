<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="<?php echo BASE_URL . 'public/styles/styleHome.css'; ?>" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f5f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 100%;
            margin: auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        h1 {
            margin-top: 0;
            text-align: center;
            color: #007bff;
            font-size: 2.5rem;
            margin-bottom: 40px;
        }

        .product-detail {
            display: flex; /* Sử dụng flexbox để sắp xếp hình ảnh và mô tả */
            align-items: center; /* Căn giữa hình ảnh và mô tả */
            margin-top: 20px;
        }

        .product-image {
            max-width: 350px; /* Giảm kích thước hình ảnh */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-right: 30px; /* Khoảng cách giữa hình ảnh và mô tả */
        }

        .product-image:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 1.8rem;
            color: #343a40;
            margin-bottom: 10px;
        }

        .product-detail p {
            margin: 10px 0;
            font-size: 1.1rem;
            color: #555;
        }

        .price {
            font-size: 1.4rem;
            font-weight: bold;
            color: #28a745;
        }

        .discount-price {
            font-size: 1.2rem;
            color: #dc3545;
            text-decoration: line-through;
        }

        .back-link {
            text-align: center;
            margin-top: 40px;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 12px 30px;
            margin: 10px;
            border: 2px solid #007bff;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        .back-link a:hover {
            background-color: #007bff;
            color: white;
        }

        .back-link a:first-of-type {
            color: #28a745;
            border-color: #28a745;
        }

        .back-link a:first-of-type:hover {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chi Tiết Sản Phẩm</h1>
        <form action="Home/getShow" method="get">
            <div class="product-detail">
                <?php if (!empty($data['product'])): ?>
                    <?php
                    $product = $data['product'];
                    $gia_xuat = $product['giaxuat'];
                    $khuyenmai = $product['khuyenmai'];
                    $gia_ban = $gia_xuat - ($gia_xuat * $khuyenmai / 100);
                    $mo_ta = $product['Mota_loaisp'];
                    ?>
                    <div>
                        <img class="product-image" src="<?php echo BASE_URL . 'public/images/' . $data['product']['hinhanh']; ?>" alt="Hình ảnh sản phẩm">
                    </div>
                    
                    <div>
                        <h2><?php echo $product['Ten_loaisp']; ?></h2>

                        <?php if ($khuyenmai > 0): ?>
                            <p class="discount-price">Giá bán: <del><?php echo $gia_xuat; ?> VND</del></p>
                            <p class="price">Giảm giá còn: <?php echo $gia_ban; ?> VND</p>
                            <p><strong>Khuyến mãi:</strong> <?php echo $khuyenmai; ?>%</p>
                            <p><strong>Mô tả:</strong> <?php echo $mo_ta; ?></p>
                        <?php else: ?>
                            <p class="price">Giá bán: <?php echo $gia_xuat; ?> VND</p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p>Sản phẩm không tồn tại.</p>
                <?php endif; ?>
            </div>
        </form>

        <div class="back-link">
            <a href="<?php echo BASE_URL . 'GioHang/add/' . $product['ma_sp']; ?>">+ Thêm vào giỏ hàng</a>
            <a href="<?php echo BASE_URL . 'Home'; ?>">Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>
