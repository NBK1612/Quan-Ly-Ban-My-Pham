<?php
class GioHangModel extends DB{
    public function getShow() : array {
        // Lấy dữ liệu giỏ hàng từ cookie
        return isset($_COOKIE['gioHang']) ? json_decode($_COOKIE['gioHang'], true) : [];
    }

    public function getProductById($id) {
        // Giả sử bạn đang sử dụng PDO hoặc MySQLi để truy vấn cơ sở dữ liệu
        $stmt = $this->con->prepare("SELECT * FROM adproduct WHERE ma_sp = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function add($id) {
        // Lấy tên người dùng từ session
        $username = $_SESSION['user']; 
        
        // Giải mã cookie giohang thành mảng cho người dùng hiện tại
        $gioHangToSave = isset($_COOKIE['giohang']) ? json_decode($_COOKIE['giohang'], true) : [];
    
        // Nếu không có giỏ hàng cho người dùng, khởi tạo giỏ hàng mới
        if (!isset($gioHangToSave[$username])) {
            $gioHangToSave[$username] = [];
        }
    
        // Lấy sản phẩm từ mô hình
        $product = $this->getProductById($id);
    
        if ($product) {
            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
            if (isset($gioHangToSave[$username][$id])) {
                // Tăng số lượng sản phẩm
                $gioHangToSave[$username][$id]['qty'] += 1;
            } else {
                // Thêm sản phẩm mới vào giỏ hàng
                $gioHangToSave[$username][$id] = [
                    'qty' => 1,
                    'masp' => $product['ma_sp'],
                    'tensp' => $product['Ten_loaisp'],
                    'hinhanh' => $product['hinhanh'],
                    'giaxuat' => $product['giaxuat'],
                    'khuyenmai' => $product['khuyenmai']
                ];
            }
        }
    
        // Lưu lại giỏ hàng vào cookie (giải mã lại thành JSON)
        setcookie('giohang', json_encode($gioHangToSave), time() + (86400 * 30), "/"); // Cookie có hiệu lực 30 ngày
    }
    
    public function delete($id) {
        $username = $_SESSION['user']; 
        // Lấy giỏ hàng từ cookie
        $gioHang = isset($_COOKIE['giohang']) ? json_decode($_COOKIE['giohang'], true) : []; // Chú ý tên cookie là 'giohang'
    
        // Xóa sản phẩm khỏi giỏ hàng
        if (isset($gioHang[$username][$id])) {
            unset($gioHang[$username][$id]);
        }
    
        // Kiểm tra xem giỏ hàng của người dùng có còn sản phẩm hay không
        if (empty($gioHang[$username])) {
            unset($gioHang[$username]); // Nếu không còn sản phẩm, xóa giỏ hàng của người dùng
        }
    
        // Cập nhật lại cookie
        setcookie("giohang", json_encode($gioHang), time() + (86400 * 30), "/"); // Thời gian sống là 30 ngày
    }
    

    public function update($soluong_array) {
        $username = $_SESSION['user']; 
        // Giải mã cookie giohang thành mảng
        $gioHang = isset($_COOKIE['giohang']) ? json_decode($_COOKIE['giohang'], true) : [];
        
        // Cập nhật số lượng cho từng sản phẩm
        foreach ($soluong_array as $ma_sp => $soluong) {
            if (isset($gioHang[$username][$ma_sp])) {
                $gioHang[$username][$ma_sp]['qty'] = $soluong; // Cập nhật số lượng
                $gioHang[$username][$ma_sp]['thanhtien'] = $gioHang[$username][$ma_sp]['giaxuat'] * (1 - $gioHang[$username][$ma_sp]['khuyenmai'] / 100) * $soluong; // Tính lại thành tiền
            }
        }
    
        // Lưu lại giỏ hàng vào cookie (giải mã lại thành JSON)
        setcookie('giohang', json_encode($gioHang), time() + (86400 * 30), "/");
    }
    public function getTotal() {
        $total = 0;
        // Giả sử bạn có danh sách sản phẩm trong giỏ hàng
        $cartItems = $this->getShow(); // Lấy danh sách sản phẩm trong giỏ hàng
        
        foreach ($cartItems as $username => $items) {
            foreach ($items as $item) {
                $total += $item['giaxuat'] * (1 - $item['khuyenmai'] / 100) * $item['qty']; // Tính tổng tiền
        }
    
        // Kiểm tra xem có mã giảm giá trong session không
        if (isset($_SESSION['discount'])) {
            $discount = $_SESSION['discount'];
            $total -= ($total * $discount['discount_percentage'] / 100); // Giảm giá theo tỷ lệ phần trăm
        }
    
        return $total;
    }
    
}
}
?>