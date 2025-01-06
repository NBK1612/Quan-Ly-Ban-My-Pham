<?php
class QuanlyKhachHangModel extends DB{
    public function showQuanlyKhachHang() : array {
        $sql = "SELECT * FROM danhkithanhvien";
        $stm = $this->con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteKhachHang($id) {
        $sql = "DELETE FROM danhkithanhvien WHERE UserName  = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }

    public function addKhachHang($FullName, $UserName, $PassWord, $Email, $DienThoai, $GioiTinh, $QuocTich, $DiaChi, $HinhAnh, $SoThich, $Level) {
        // Kiểm tra xem các trường có bị trống hay không
        if (empty($FullName) || empty($UserName) || empty($PassWord) || empty($Email) 
            || empty($DienThoai) || empty($GioiTinh) || empty($QuocTich) || empty($DiaChi) 
            || empty($HinhAnh) || empty($SoThich) || empty($Level)) {
            throw new Exception("Các trường không được để trống.");
        }
    
        // Kiểm tra xem tên khách hàng đã tồn tại chưa
        $sql_check = "SELECT COUNT(*) FROM danhkithanhvien WHERE UserName = :UserName";
        $stm_check = $this->con->prepare($sql_check);
        $stm_check->bindParam(':UserName', $UserName);
        $stm_check->execute();
        
        $count = $stm_check->fetchColumn();
    
        if ($count > 0) {
            // Nếu tên khách hàng đã tồn tại, trả về lỗi hoặc thông báo
            throw new Exception("Tên khách hàng đã tồn tại.");
        } else {
            // Nếu mã sản phẩm chưa tồn tại, thực hiện chèn dữ liệu
            $sql = "INSERT INTO danhkithanhvien (FullName, UserName, PassWord, Email, DienThoai, GioiTinh, QuocTich, DiaChi, HinhAnh, SoThich, Level) 
                    VALUES (:FullName, :UserName, :PassWord, :Email, :DienThoai, :GioiTinh, :QuocTich, :DiaChi, :HinhAnh, :SoThich, :Level)";
            $stm = $this->con->prepare($sql);
            
            // Ràng buộc các tham số
            $stm->bindParam(':FullName', $FullName); 
            $stm->bindParam(':UserName', $UserName);
            $stm->bindParam(':PassWord', $PassWord);
            $stm->bindParam(':Email', $Email);
            $stm->bindParam(':DienThoai', $DienThoai);
            $stm->bindParam(':GioiTinh', $GioiTinh);
            $stm->bindParam(':QuocTich', $QuocTich);
            $stm->bindParam(':DiaChi', $DiaChi);
            $stm->bindParam(':HinhAnh', $HinhAnh);
            $stm->bindParam(':SoThich', $SoThich);
            $stm->bindParam(':Level', $Level);
    
            // Thực thi câu lệnh
            if (!$stm->execute()) {
                // Nếu có lỗi trong quá trình chèn dữ liệu, ném ra ngoại lệ
                throw new Exception("Có lỗi xảy ra trong quá trình thêm khách hàng.");
            }
    
            return true; // Trả về true nếu thêm thành công
        }
    }

    public function getKhachHangById($id) {
        // Câu lệnh SQL để lấy thông tin khách hàng theo UserName hoặc id
        $sql = "SELECT * FROM danhkithanhvien WHERE UserName = :UserName";
        
        // Chuẩn bị câu lệnh
        $stm = $this->con->prepare($sql);
        
        // Ràng buộc tham số UserName (hoặc id)
        $stm->bindParam(':UserName', $id); // Ở đây sử dụng UserName làm định danh khách hàng
        
        // Thực thi câu lệnh
        $stm->execute();
        
        // Lấy dữ liệu khách hàng
        $khachHang = $stm->fetch(PDO::FETCH_ASSOC);
    
        // Trả về dữ liệu khách hàng
        return $khachHang;
    }
    

    public function updateKhachHang($FullName, $UserName, $PassWord, $Email, $DienThoai, $GioiTinh, $QuocTich, $DiaChi, $HinhAnh, $SoThich, $Level) {
        // Kiểm tra xem các trường có bị trống hay không
        if (empty($FullName) || empty($UserName) || empty($PassWord) || empty($Email) 
            || empty($DienThoai) || empty($GioiTinh) || empty($QuocTich) || empty($DiaChi) 
            || empty($HinhAnh) || empty($SoThich) || empty($Level)) {
            throw new Exception("Các trường không được để trống.");
        }
    
        // Câu lệnh SQL để cập nhật khách hàng
        $sql = "UPDATE danhkithanhvien 
                SET 
                    FullName = :FullName,
                    UserName = :UserName,
                    PassWord = :PassWord,
                    Email = :Email,
                    DienThoai = :DienThoai,
                    GioiTinh = :GioiTinh,
                    QuocTich = :QuocTich,
                    DiaChi = :DiaChi,
                    HinhAnh = :HinhAnh,
                    SoThich = :SoThich,
                    Level = :Level
                WHERE UserName = :UserName";
    
        $stm = $this->con->prepare($sql);
    
        // Ràng buộc các tham số
        $stm->bindParam(':FullName', $FullName);
        $stm->bindParam(':UserName', $UserName);
        $stm->bindParam(':PassWord', $PassWord);
        $stm->bindParam(':Email', $Email);
        $stm->bindParam(':DienThoai', $DienThoai);
        $stm->bindParam(':GioiTinh', $GioiTinh);
        $stm->bindParam(':QuocTich', $QuocTich);
        $stm->bindParam(':DiaChi', $DiaChi);
        $stm->bindParam(':HinhAnh', $HinhAnh);
        $stm->bindParam(':SoThich', $SoThich);
        $stm->bindParam(':Level', $Level);

        // Thực thi câu lệnh
        if (!$stm->execute()) {
            throw new Exception("Có lỗi xảy ra trong quá trình cập nhật khách hàng.");
        }
    
        return true; // Trả về true nếu cập nhật thành công
    }
    

}
?>
