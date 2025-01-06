<?php
    class AdproductModel extends DB {
        public function showAdProductType() : array {
            $sql = "SELECT * FROM adproduct";
            $stm = $this->con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }   

        public function deleteAdProduct($id) {
            $sql = "DELETE FROM adproduct WHERE ma_sp  = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindParam(':id', $id);
            return $stm->execute();
        }

        public function addAdProduct($Ma_loaisp, $ma_sp, $Ten_loaisp, $hinhanh, $gianhap, $giaxuat, $soluong, $khuyenmai, $Mota_loaisp, $create_date) {
            // Kiểm tra xem các trường có bị trống hay không
            if (empty($Ma_loaisp) || empty($ma_sp) || empty($Ten_loaisp) || empty($hinhanh) 
                || empty($gianhap) || empty($giaxuat) || empty($soluong) || empty($khuyenmai) 
                || empty($Mota_loaisp) || empty($create_date)) {
                throw new Exception("Các trường không được để trống.");
            }
        
            // Kiểm tra xem mã sản phẩm đã tồn tại chưa
            $sql_check = "SELECT COUNT(*) FROM adproduct WHERE ma_sp = :masp";
            $stm_check = $this->con->prepare($sql_check);
            $stm_check->bindParam(':masp', $ma_sp);
            $stm_check->execute();
            
            $count = $stm_check->fetchColumn();
        
            if ($count > 0) {
                // Nếu mã sản phẩm đã tồn tại, trả về lỗi hoặc thông báo
                throw new Exception("Mã sản phẩm đã tồn tại.");
            } else {
                // Nếu mã sản phẩm chưa tồn tại, thực hiện chèn dữ liệu
                $sql = "INSERT INTO adproduct (Ma_loaisp, ma_sp, Ten_loaisp, hinhanh, gianhap, giaxuat, soluong, khuyenmai, Mota_loaisp, create_date) 
                        VALUES (:maloaisp, :masp, :tenloaisp, :hinhanh, :gianhap, :giaxuat, :soluong, :khuyenmai, :motaloaisp, :create_date)";
                $stm = $this->con->prepare($sql);
                
                // Ràng buộc các tham số
                $stm->bindParam(':maloaisp', $Ma_loaisp); 
                $stm->bindParam(':masp', $ma_sp);
                $stm->bindParam(':tenloaisp', $Ten_loaisp);
                $stm->bindParam(':hinhanh', $hinhanh);
                $stm->bindParam(':gianhap', $gianhap);
                $stm->bindParam(':giaxuat', $giaxuat);
                $stm->bindParam(':soluong', $soluong);
                $stm->bindParam(':khuyenmai', $khuyenmai);
                $stm->bindParam(':motaloaisp', $Mota_loaisp);
                $stm->bindParam(':create_date', $create_date);
        
                // Thực thi câu lệnh
                if (!$stm->execute()) {
                    // Nếu có lỗi trong quá trình chèn dữ liệu, ném ra ngoại lệ
                    throw new Exception("Có lỗi xảy ra trong quá trình thêm sản phẩm.");
                }
        
                return true; // Trả về true nếu thêm thành công
            }
        }
        
        public function getAllMaLoaiSanPham() {
            try {
                $sql = "SELECT Ma_loaisp FROM adproducttype"; // Chỉ chọn Ma_loaisp
                $query = $this->con->prepare($sql);
                $query->execute();
        
                // Lấy tất cả các dòng kết quả
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                throw new Exception("Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage());
            }
        }
        
        public function getAllTenLoaiSanPham() {
            try {
                $sql = "SELECT Ten_loaisp FROM adproducttype"; // Chỉ chọn Ma_loaisp
                $query = $this->con->prepare($sql);
                $query->execute();
        
                // Lấy tất cả các dòng kết quả
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                throw new Exception("Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage());
            }
        }

        public function getAdProductById($id) {
            $sql = "SELECT * FROM adproduct WHERE ma_sp = :id"; // Đảm bảo bạn đang sử dụng đúng bảng và khóa chính
            $stm = $this->con->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        
    
        public function updateAdProduct($id, $ma_loaisp, $tensp, $gianhap, $giaxuat, $soluong, $khuyenmai, $mota_sp, $create_date, $hinhanh) {
            // Kiểm tra xem các trường có bị rỗng hay không
            if (empty($ma_loaisp) || empty($tensp) || empty($gianhap) || empty($giaxuat) || 
                empty($soluong) || empty($khuyenmai) || empty($mota_sp) || empty($create_date)) {
                throw new Exception("Các trường không được để trống.");
            }
        
            // Câu lệnh SQL để cập nhật sản phẩm bao gồm cả hình ảnh
            $sql = "UPDATE adproduct SET 
                    Ma_loaisp = :maloaisp, 
                    Ten_loaisp = :tensp, 
                    gianhap = :gianhap, 
                    giaxuat = :giaxuat, 
                    soluong = :soluong, 
                    khuyenmai = :khuyenmai, 
                    Mota_loaisp = :mota_sp, 
                    create_date = :create_date,
                    hinhanh = :hinhanh
                    WHERE ma_sp = :id";
        
            $stm = $this->con->prepare($sql);
        
            // Ràng buộc các tham số
            $stm->bindParam(':maloaisp', $ma_loaisp);
            $stm->bindParam(':tensp', $tensp);
            $stm->bindParam(':gianhap', $gianhap);
            $stm->bindParam(':giaxuat', $giaxuat);
            $stm->bindParam(':soluong', $soluong);
            $stm->bindParam(':khuyenmai', $khuyenmai);
            $stm->bindParam(':mota_sp', $mota_sp);
            $stm->bindParam(':create_date', $create_date);
            $stm->bindParam(':hinhanh', $hinhanh); // Cập nhật hình ảnh
            $stm->bindParam(':id', $id);
        
            // Thực thi câu lệnh
            if (!$stm->execute()) {
                throw new Exception("Có lỗi xảy ra trong quá trình cập nhật sản phẩm.");
            }
        
            return true; // Trả về true nếu cập nhật thành công
        }
        
        
        public function getProductById($id) {
            $sql = "SELECT * FROM adproduct WHERE ma_sp = :id"; // Giả sử "ma_sp" là khóa chính
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một mảng sản phẩm hoặc null
        }
        
        public function isMaSPExist($ma_sp) {
            $sql = "SELECT * FROM adproduct WHERE ma_sp = :ma_sp";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':ma_sp', $ma_sp);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        
    }
?>