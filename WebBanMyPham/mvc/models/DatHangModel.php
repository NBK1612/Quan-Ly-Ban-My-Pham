<?php
class DatHangModel extends DB {
    public function insertOder($mahd, $makh, $tenkh, $phone, $diachilh, $diachigh, $tongtien, $create_date, $trangthai) {
        $sql = "INSERT INTO `order`(mahd, makh, tenkh, phone, diachilh, diachigh, tongtien, create_date, trangthai) 
        VALUES (:mahd, :makh, :tenkh, :phone, :diachilh, :diachigh, :tongtien, :create_date, :trangthai)";
    
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':mahd', $mahd);
        $stm->bindParam(':makh', $makh); 
        $stm->bindParam(':tenkh', $tenkh); 
        $stm->bindParam(':phone', $phone); 
        $stm->bindParam(':diachilh', $diachilh);
        $stm->bindParam(':diachigh', $diachigh); 
        $stm->bindParam(':tongtien', $tongtien); 
        $stm->bindParam(':create_date', $create_date);
        $stm->bindParam(':trangthai', $trangthai);
        $stm->execute();
    }

    public function insertOderdetail($mahd, $masp, $tensp, $soluong, $giaban, $khuyenmai, $hinhanh, $thanhtien){
        $sql = "INSERT INTO oderdetail(mahd, masp, tensp, soluong, giaxuat, khuyenmai, hinhanh, thanhtien)
                VALUES(:mahd, :masp, :tensp, :soluong, :giaban, :khuyenmai, :hinhanh, :thanhtien)";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':mahd', $mahd);
        $stm->bindParam(':masp', $masp);
        $stm->bindParam(':tensp', $tensp);
        $stm->bindParam(':soluong', $soluong);
        $stm->bindParam(':giaban', $giaban);  
        $stm->bindParam(':khuyenmai', $khuyenmai);
        $stm->bindParam(':hinhanh', $hinhanh);
        $stm->bindParam(':thanhtien', $thanhtien);
        $stm->execute();

    }


    public function checkMaKhachHang($makh){
        $sql = "SELECT COUNT(*) FROM `order` WHERE makh = :makh";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':makh', $makh);
        $stm->execute();
        $count = $stm->fetchColumn();
        if($count > 0) return false;
        return true;
    }
    
    public function create_MaKhachHang() {
        // Tạo mã khách hàng ngẫu nhiên
        do {
            $makh = "KH" . random_int(10000, 90000);
        } while (!$this->checkMaKhachHang($makh)); // Lặp lại nếu mã đã tồn tại
    
        return $makh; // Trả về mã khách hàng hợp lệ
    }

    public function create_MaHoaDon() {
        // Tạo mã khách hàng ngẫu nhiên
        do {
            $makh = "HD" . random_int(10000, 90000);
        } while (!$this->checkMaKhachHang($makh)); // Lặp lại nếu mã đã tồn tại
    
        return $makh; // Trả về mã khách hàng hợp lệ
    }

    public function tongTien() {
        // Lấy dữ liệu giỏ hàng từ cookie
        $gioHang = isset($_COOKIE['giohang']) ? json_decode($_COOKIE['giohang'], true) : [];
    
        $tongTien = 0.0; // Khởi tạo tổng tiền
    
        // Kiểm tra xem cookie có dữ liệu hay không
        if (!empty($gioHang)) {
            // Giả sử tên người dùng được lưu trong session
            $username = $_SESSION['user']; 
            // Lấy giỏ hàng của người dùng
            if (isset($gioHang[$username])) {
                foreach ($gioHang[$username] as $item) {
                    // Tính thành tiền cho từng sản phẩm
                    $thanhtien = $item['giaxuat'] * $item['qty'] * (1 - ($item['khuyenmai'] / 100)); // Giá sau khuyến mãi
                    $tongTien += $thanhtien; // Cộng vào tổng tiền
                }
            }
        }
    
        return $tongTien; // Trả về tổng tiền
    }
    
}

?>