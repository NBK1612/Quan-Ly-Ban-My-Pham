<?php
class GioHang extends Controller {
    public function getShow() {
        $page = "GioHang";
        $gioHangModel = $this->model("GioHangModel");
        $this->view("HomeView", [
            "page" => $page,
            "gioHang" => $gioHangModel->getShow()
        ]);
    }

    public function delete($id) {
        $gioHangModel = $this->model("GioHangModel");;
        $gioHangModel->delete($id);
        header("Location: " . BASE_URL . "GioHang");
    }

    public function deleteAllFromCart() {
        // Đặt cookie "gioHang" với thời gian hết hạn trong quá khứ để xóa nó
        setcookie("giohang", "", time() - 3600, "/"); // Cookie sẽ hết hạn ngay lập tức
    
        // Quay lại trang giỏ hàng
        header("Location: " . BASE_URL . "GioHang");
        exit(); // Kết thúc script sau khi chuyển hướng
    }
    

    public function add($id) {
        $productModel = $this->model('GioHangModel');
        $productModel->add($id);
        header("Location: " . BASE_URL . "GioHang");
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['soluong'])) {
            $soluong_array = $_POST['soluong'];
            
            $gioHangModel = $this->model("GioHangModel");
            $gioHangModel->update($soluong_array); // Gọi hàm update với mảng số lượng
    
            // Sau khi cập nhật, chuyển hướng về trang giỏ hàng
            header("Location: " . BASE_URL . "GioHang");
            exit(); // Kết thúc script sau khi chuyển hướng
        } else {
            header("Location: " . BASE_URL . "GioHang");
            exit(); // Kết thúc script
        }
    }
    public function applyDiscount() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $discountCode = $_POST['discount_code'];
            $discountModel = $this->model("DiscountModel");
            $discount = $discountModel->getDiscountByCode($discountCode);
    
            if ($discount && strtotime($discount['start_date']) <= time() && strtotime($discount['end_date']) >= time()) {
                $_SESSION['discount'] = $discount; // Lưu thông tin mã giảm giá vào session
                echo "<script>alert('Áp dụng mã giảm giá thành công!');</script>";
            } else {
                echo "<script>alert('Mã giảm giá không hợp lệ hoặc đã hết hạn!');</script>";
            }
    
            // Quay lại trang giỏ hàng sau khi áp dụng mã giảm giá
            header("Location: " . BASE_URL . "GioHang");
            exit(); // Dừng mã tiếp theo
        }
    }

}
?>
