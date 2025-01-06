<?php
class DonHangModel extends DB {
    public function getOrder() {
        $sql = "SELECT * FROM `order`";
        $stm = $this->con->prepare($sql);
        
        // Kiểm tra nếu câu lệnh SQL thực thi thành công
        if ($stm->execute()) {
            // Lấy tất cả kết quả từ câu truy vấn
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Trả về false nếu có lỗi
            return false;
        }
    }

    public function getLichSuMuaHang() {
        $sql = "SELECT * FROM `lichsumuahang`";
        $stm = $this->con->prepare($sql);
        
        // Kiểm tra nếu câu lệnh SQL thực thi thành công
        if ($stm->execute()) {
            // Lấy tất cả kết quả từ câu truy vấn
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Trả về false nếu có lỗi
            return false;
        }
    }


    public function insertLichSuMuaHang($mahd, $makh, $tenkh, $phone, $diachilh, $diachigh, $tongtien, $create_date, $trangthai) {
        $sql = "INSERT INTO lichsumuahang (mahd, makh, tenkh, phone, diachilh, diachigh, tongtien, create_date, trangthai) 
                VALUES (:mahd, :makh, :tenkh, :phone, :diachilh, :diachigh, :tongtien, :create_date, :trangthai)";
        $stmt = $this->con->prepare($sql);
    
        $stmt->bindParam(':mahd', $mahd);
        $stmt->bindParam(':makh', $makh);
        $stmt->bindParam(':tenkh', $tenkh);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':diachilh', $diachilh);
        $stmt->bindParam(':diachigh', $diachigh);
        $stmt->bindParam(':tongtien', $tongtien);
        $stmt->bindParam(':create_date', $create_date);
        $stmt->bindParam(':trangthai', $trangthai);
    
        // Thực hiện câu lệnh
        if ($stmt->execute()) {
            return true; // Trả về true nếu thành công
        } else {
            return false; // Trả về false nếu thất bại
        }
    }
    

    public function getOrderbyId($id) {
        $sql = "SELECT * FROM `order` where mahd =:id";
        $stm = $this->con->prepare($sql);   
        $stm->bindParam(':id', $id);
        // Kiểm tra nếu câu lệnh SQL thực thi thành công
        if ($stm->execute()) {
            // Lấy tất cả kết quả từ câu truy vấn
            return $stm->fetch(PDO::FETCH_ASSOC);
        } else {
            // Trả về false nếu có lỗi
            return false;
        }
    }

    public function deleteOderById($id){
        $sql = "DELETE FROM `order` where mahd =:id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        if($stm->execute()){
            return true;
        }
        return false;
    }
    
    public function showOrderdetail($id){
        $sql = "SELECT * FROM oderdetail where mahd =:id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOrderStatus($id, $status) {
        // SQL để cập nhật trạng thái đơn hàng
        $sql = "UPDATE `order` SET trangthai = :trangthai WHERE mahd = :mahd";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([
            ':trangthai' => $status,
            ':mahd' => $id
        ]);
    }


    public function insertDanhGia($mahd, $makh, $ten_khach_hang, $danh_gia, $sao) {
        $sql = "INSERT INTO danhgiasanpham (mahd, makh, tenkhachhang, danh_gia, sao) 
                VALUES (:mahd, :makh, :ten_khach_hang, :danh_gia, :sao)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':mahd', $mahd);
        $stmt->bindParam(':makh', $makh);
        $stmt->bindParam(':ten_khach_hang', $ten_khach_hang);
        $stmt->bindParam(':danh_gia', $danh_gia);
        $stmt->bindParam(':sao', $sao);
        return $stmt->execute();
    }

    public function getDanhGiaByMaHD($mahd) {
        $sql = "SELECT * FROM danhgiasanpham WHERE mahd = :mahd ORDER BY ngay_danh_gia DESC";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':mahd', $mahd);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
