<?php
    class TinTucModel extends DB {
        public function showTinTuc() : array {
            $sql = "SELECT * FROM tintuc";
            $stm = $this->con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }   

        public function deleteTinTuc($id) {
            $sql = "DELETE FROM tintuc WHERE matintuc  = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindParam(':id', $id);
            return $stm->execute();
        }

        public function addTinTuc($matintuc, $tieude, $hinhanh, $noidung, $create_date) {
            // Kiểm tra xem các trường có bị trống hay không
            if (empty($matintuc) || empty($tieude) || empty($hinhanh) || empty($noidung) || empty($create_date)) {
                throw new Exception("Các trường không được để trống.");
            }
        
            // Kiểm tra xem mã sản phẩm đã tồn tại chưa
            $sql_check = "SELECT COUNT(*) FROM tintuc WHERE matintuc = :matintuc";
            $stm_check = $this->con->prepare($sql_check);
            $stm_check->bindParam(':matintuc', $matintuc);
            $stm_check->execute();
            
            $count = $stm_check->fetchColumn();
        
            if ($count > 0) {
                // Nếu mã sản phẩm đã tồn tại, trả về lỗi hoặc thông báo
                throw new Exception("Mã sản phẩm đã tồn tại.");
            } else {
                // Nếu mã sản phẩm chưa tồn tại, thực hiện chèn dữ liệu
                $sql = "INSERT INTO tintuc (matintuc, tieude, hinhanh, noidung, create_date) 
                        VALUES (:matintuc, :tieude, :hinhanh, :noidung, :create_date)";
                $stm = $this->con->prepare($sql);
                
                // Ràng buộc các tham số
                $stm->bindParam(':matintuc', $matintuc); 
                $stm->bindParam(':tieude', $tieude);
                $stm->bindParam(':hinhanh', $hinhanh);
                $stm->bindParam(':noidung', $noidung);
                $stm->bindParam(':create_date', $create_date);
        
                // Thực thi câu lệnh
                if (!$stm->execute()) {
                    // Nếu có lỗi trong quá trình chèn dữ liệu, ném ra ngoại lệ
                    throw new Exception("Có lỗi xảy ra trong quá trình thêm.");
                }
        
                return true; // Trả về true nếu thêm thành công
            }
        }
        
        public function getAllmatintuc() {
            try {
                $sql = "SELECT matintuc FROM tintuc"; // Chỉ chọn matintuc
                $query = $this->con->prepare($sql);
                $query->execute();
        
                // Lấy tất cả các dòng kết quả
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                throw new Exception("Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage());
            }
        }
        
        public function getAlltieude() {
            try {
                $sql = "SELECT tieude FROM tintuc"; // Chỉ chọn Ma_loaisp
                $query = $this->con->prepare($sql);
                $query->execute();
        
                // Lấy tất cả các dòng kết quả
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                throw new Exception("Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage());
            }
        }

        public function getTinTucById($id) {
            $sql = "SELECT * FROM tintuc WHERE matintuc = :id"; // Đảm bảo bạn đang sử dụng đúng bảng và khóa chính
            $stm = $this->con->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        
    
        public function updateTinTuc($id, $matintuc, $tieude, $noidung, $create_date, $hinhanh) {
            // Kiểm tra xem các trường có bị rỗng hay không
            if (empty($matintuc) || empty($tieude) || empty($noidung) || empty($create_date) || empty($hinhanh)) {
                throw new Exception("Các trường không được để trống.");
            }
        
            // Câu lệnh SQL để cập nhật sản phẩm bao gồm cả hình ảnh
            $sql = "UPDATE tintuc SET 
                    matintuc = :matintuc, 
                    tieude = :tieude, 
                    noidung = :noidung, 
                    create_date = :create_date,
                    hinhanh = :hinhanh
                    WHERE matintuc = :id";
        
            $stm = $this->con->prepare($sql);
        
            // Ràng buộc các tham số
            $stm->bindParam(':matintuc', $matintuc);
            $stm->bindParam(':tieude', $tieude);
            $stm->bindParam(':noidung', $noidung);
            $stm->bindParam(':create_date', $create_date);
            $stm->bindParam(':hinhanh', $hinhanh); // Cập nhật hình ảnh
            $stm->bindParam(':id', $id);
        
            // Thực thi câu lệnh
            if (!$stm->execute()) {
                throw new Exception("Có lỗi xảy ra trong quá trình cập nhật sản phẩm.");
            }
        
            return true; // Trả về true nếu cập nhật thành công
        }
        
        
        public function getTinById($id) {
            $sql = "SELECT * FROM tintuc WHERE matintuc = :id"; // Giả sử "ma_sp" là khóa chính
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một mảng sản phẩm hoặc null
        }
        
        public function isMaTTExist($matintuc) {
            $sql = "SELECT * FROM tintuc WHERE matintuc = :matintuc";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':matintuc', $matintuc);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        
    }
?>