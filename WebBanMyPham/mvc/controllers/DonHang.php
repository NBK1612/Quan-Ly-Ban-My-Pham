<?php
class DonHang extends Controller {
    public function getShow(){
        $page = "DonHang";
        $orderModel = $this->model("DonHangModel");
        
        // Lấy danh sách đơn hàng từ model
        $order = $orderModel->getOrder();

        // Truyền dữ liệu đơn hàng vào view
        $this->view("HomeView", [
            "page" => $page,
            "order" => $order
        ]);
    }

    public function orderdetail($id){
        $page = "ChiTietDonHang";
        $orderdetailModel = $this->model("DonHangModel");
        $oderdetail = $orderdetailModel->showOrderdetail($id);
        // Truyền dữ liệu đơn hàng vào view
        $this->view("HomeView", [
            "page" => $page,
            "orderdetail" => $oderdetail
        ]);
    }
    
    public function lichsumuahang(){
        $page = "LichSuMuaHang";
        $orderModel = $this->model("DonHangModel");
        
        // Lấy danh sách đơn hàng từ model
        $order = $orderModel->getLichSuMuaHang();

        // Truyền dữ liệu đơn hàng vào view
        $this->view("HomeView", [
            "page" => $page,
            "order" => $order
        ]);
    }

    public function danhgia($id){
        $page = "DanhGiaSanPham";
        $orderModel = $this->model("DonHangModel");
        $danhGia = $orderModel->getDanhGiaByMaHD($id); // Lấy danh sách đánh giá dựa vào mã đơn hàng
        $mahd = $id; // Mã đơn hàng
    
        // Truyền dữ liệu vào view
        $this->view("HomeView", [
            "page" => $page,
            "danhGia" => $danhGia,
            "mahd" => $mahd // Truyền mã đơn hàng
        ]);
    }

    public function themDanhGia() {
        // Kiểm tra xem yêu cầu là POST hay không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Tạo instance của model
            $orderModel = $this->model("DonHangModel");
            
            // Lấy dữ liệu từ form
            $mahd = $_POST['mahd'];
            $makh = $_POST['makh']; // Bạn cần thay thế mã khách hàng thực tế nếu cần
            $tenkhachhang = $_POST['ten_khach_hang'];
            $danh_gia = $_POST['danh_gia'];
            $sao = $_POST['sao'];
            $ngay_danh_gia = date('Y-m-d H:i:s'); // Ngày giờ hiện tại
    
            // Gọi phương thức insertDanhGia trong model để lưu vào CSDL
            if ($orderModel->insertDanhGia($mahd, $makh, $tenkhachhang, $danh_gia, $sao)) {
                // Nếu thành công, hiển thị thông báo và chuyển hướng về trang danh gia
                echo "<script>alert('Đánh giá của bạn đã được gửi thành công!'); window.location.href='" . BASE_URL . "DonHang/danhgia/" . $mahd . "';</script>";
            } else {
                // Nếu có lỗi, hiển thị thông báo lỗi
                echo "<script>alert('Đã có lỗi xảy ra, vui lòng thử lại sau.'); window.location.href='" . BASE_URL . "DonHang/danhgia/" . $mahd . "';</script>";
            }
        } else {
            // Nếu không phải POST, chuyển hướng về trang danh sách
            header("Location: " . BASE_URL . "DanhGia");
            exit;
        }
    }
    
    
    
}
?>
