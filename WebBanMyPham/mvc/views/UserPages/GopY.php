<div class="main">
        <h1>Danh Sách Góp Ý Của Khách Hàng</h1>
        <table class="admin-table">
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Nội dung góp ý</th>
                <th>Ngày góp ý</th>
                <th>Xóa</th>
            </tr>
            <tr>
                <?php if (!empty($data['danhSachGopY'])): ?>
                    <?php foreach ($data['danhSachGopY'] as $gopy): ?>
                        <div class="feedback-item">
                            <tr>
                                <td><?php echo $gopy["id"] ?></td>
                                <td><?php echo $gopy["tenkh"] ?></td>
                                <td><?php echo $gopy["email"] ?></td>
                                <td><?php echo $gopy["phone"] ?></td>
                                <td><?php echo $gopy["noi_dung"] ?></td>
                                <td><?php echo $gopy["ngaygopy"] ?></td>
                                <td><a class="details-button" href="<?php echo BASE_URL . 'GopY/delete/' . (isset($r['masp']) ? $r['masp'] : ''); ?>">Xóa</a></td>
                            </tr>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Chưa có góp ý nào từ khách hàng.</p>
                <?php endif; ?>
            </tr>  
        </table>
    </div>

