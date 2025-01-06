<?php
class DatHang extends Controller {
    public function getShow(){
        $page = "DatHang";
        $this->view("HomeView", [
            "page" => $page
        ]); 
    }

    public function add() {
        $page = "DatHang";
        $oder = $this->model("DatHangModel");
        $giohangModel = $this->model("GioHangModel");
        $tonKhoModel = $this->model("QuanLyTonKhoModel"); // Model quản lý tồn kho
        $thongbao = "";
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $makh = $oder->create_MaKhachHang();
            $mahd = $oder->create_MaHoaDon();
            $tenkh = $_POST["tenkh"];
            $phone = $_POST["phone"];
            $diachilh = $_POST["diachi_lh"];
            $diachigh = $_POST["diachi_gh"];
            $create_date = date('Y-m-d H:i:s'); // Lấy ngày hiện tại
            $tongtien = 0.0; // Khởi tạo tổng tiền
    
            // Lấy dữ liệu giỏ hàng từ cookie
            $username = $_SESSION['user'];
            if (isset($_COOKIE['giohang'])) {
                $gioHang = json_decode($_COOKIE['giohang'], true); // Giải mã dữ liệu JSON
                
                if (isset($gioHang[$username]) && !empty($gioHang[$username])) { // Kiểm tra giỏ hàng không rỗng
                    foreach ($gioHang[$username] as $r) { // Duyệt qua giỏ hàng
                        $ma_sp = $r["masp"];
                        $ten_sp = $r["tensp"];
                        $hinh_anh = $r["hinhanh"];
                        $gia_ban = $r["giaxuat"];
                        $khuyen_mai = $r["khuyenmai"];
                        $so_luong = $r["qty"];
                        $thanh_tien = ($gia_ban * $so_luong) - (($gia_ban * $khuyen_mai / 100) * $so_luong); // Tính thành tiền
    
                        // Cộng dồn tổng tiền
                        $tongtien += $thanh_tien;
    
                        // Thêm chi tiết đơn hàng
                        $oder->insertOderdetail($mahd, $ma_sp, $ten_sp, $so_luong, $gia_ban, $khuyen_mai, $hinh_anh, $thanh_tien);
    
                        // Lấy thông tin tồn kho hiện tại
                        $product = $tonKhoModel->getSanPhamByMaSP($ma_sp);
                        if ($product) {
                            $soluongTon = $product['soluong'];
                            if ($soluongTon < $so_luong) {
                                echo "<script>alert('Sản phẩm {$ten_sp} không đủ hàng trong kho.'); window.location.href='" . BASE_URL . "GioHang';</script>";
                                exit();
                            }

                            // Cập nhật tồn kho
                            $soluongTonMoi = $soluongTon - $so_luong;
                            $tonKhoModel->updateSoLuong($ma_sp, $soluongTonMoi);
                        }
                    }
    
                    // Thêm đơn hàng
                    $oder->insertOder($mahd, $makh, $tenkh, $phone, $diachilh, $diachigh, $tongtien, $create_date, "Đang chờ xử lý");
                    $thongbao = "Đặt hàng thành công!";
                    echo "<script>alert('Bạn đã đặt hàng thành công.'); window.location.href='" . BASE_URL . "DonHang';</script>";
                    setcookie('giohang', '', 0, "/"); // Xóa cookie giỏ hàng
                } else {
                    $thongbao = "Giỏ hàng trống!";
                }
            } else {
                $thongbao = "Giỏ hàng không tồn tại!";
            }
        }
    
        // Hiển thị thông báo và trang
        $this->view("HomeView", [
            "page" => $page,
            "thongbao" => $thongbao
        ]);
    }
}    
?>