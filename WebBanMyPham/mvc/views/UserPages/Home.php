
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
</head>
<body>

    <!-- Icon Giỏ Hàng -->
    <div class="cart-icon">
        <a href="<?php echo BASE_URL . 'GioHang'; ?>">
            <img src="./public/images/th.jpg" alt="Giỏ hàng">
            <br/>
            <span>Giỏ hàng</span>
        </a>
    </div>

    <!-- Tiêu đề chính -->
    <h1>Danh Sách Sản Phẩm</h1>
    
    <!-- Form tìm kiếm -->
    <form action="<?php echo BASE_URL . 'Home'; ?>" method="post">
        <input type="text" name="txt_search" style="width: 60%;" placeholder="Tìm kiếm theo tên hoặc mã sản phẩm" />
        
        <select name="category">
            <option value="">Tất cả</option>
            <option value="discounted">Sản phẩm giảm giá</option>
            <?php
            // Lấy danh mục sản phẩm từ mảng dữ liệu
            $categories = array_unique(array_column($data['productTypes'], 'Ten_loaisp'));
            foreach ($categories as $category) {
                echo "<option value='" . $category . "'>" . $category . "</option>";
            }
            ?>
        </select>   
        <input type="submit" name="search" value="Tìm kiếm" />
    </form>


    <!-- Danh sách sản phẩm -->
    <div class="product-list">
            <?php if (!empty($data['products'])): ?>
                <?php foreach ($data['products'] as $product): ?>
                    <?php
                    $gia_xuat = $product['giaxuat'];
                    $khuyenmai = $product['khuyenmai'];
                    $gia_ban = $gia_xuat - ($gia_xuat * $khuyenmai / 100);
                    ?>
                    <div class="product">
                        <a href="<?php echo BASE_URL . 'Home/getDetailsProduct/' . $product['ma_sp']; ?>">
                            <img src="./public/images/<?php echo $product['hinhanh']; ?>" alt="<?php echo $product['Ten_loaisp']; ?>">
                        </a>
                        <h2><?php echo $product['Ten_loaisp']; ?></h2>

                        <?php if ($khuyenmai > 0): ?>
                            <p><strong>Giá bán:</strong> <del><?php echo $gia_xuat; ?> VND</del></p>
                            <p><strong>Khuyến mãi:</strong> <?php echo $khuyenmai; ?>%</p>
                            <p><strong>Giảm giá còn:</strong> <?php echo $gia_ban; ?> VND</p>
                        <?php else: ?>
                            <p><strong>Giá bán:</strong> <?php echo $gia_xuat; ?> VND</p>
                        <?php endif; ?>
                        <a class="product-link" href="<?php echo BASE_URL . 'GioHang/add/' . $product['ma_sp']; ?>">+ Thêm vào giỏ hàng</a>
                        </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có sản phẩm nào.</p>
            <?php endif; ?>
    </div>

</body>
</html>
