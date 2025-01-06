<?php
class HomeModel extends DB {
    // Lấy tất cả sản phẩm
    public function getProducts() : array {
        $sql = "SELECT * FROM adproduct";
        $stm = $this->con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

     // Lấy tất cả sản phẩm
    public function getProductTypes() : array {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy mã loại sản phẩm theo tên (trả về 1 mã sản phẩm duy nhất)
    public function getMaspbyName(string $name) {
        $sql = "SELECT Ma_loaisp FROM adproducttype WHERE Ten_loaisp = :name LIMIT 1"; // Chỉ lấy 1 kết quả
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':name', $name);
        $stm->execute();

        // Trả về một mã loại sản phẩm duy nhất, nếu có
        return $stm->fetch(PDO::FETCH_COLUMN);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM adproduct WHERE ma_sp = :id"; 
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductByName($name) {
        $sql = "SELECT * FROM adproduct WHERE Ten_loaisp = :name";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    // tìm kiếm theo danh mục
    public function getProductsByCategory($category) {
        $sql = "SELECT * FROM adproduct WHERE Ten_loaisp = :category";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':category', $category);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // tìm kiếm theo mã or tên loại sp
    public function searchProducts($txt_search) {
        // Đảm bảo giá trị tìm kiếm được bảo vệ
        $txt_search = "%" . $txt_search . "%"; // Thêm ký tự % để tìm kiếm như LIKE
    
        // Bắt đầu với câu lệnh SQL với tham số
        $sql = "SELECT * FROM adproduct WHERE (Ten_loaisp LIKE :search OR ma_sp LIKE :search)"; // Sử dụng LIKE cho cả hai trường
    
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':search', $txt_search); // Ràng buộc tham số an toàn
        $stm->execute();
        
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //lấy tin tức
    public function getTinTuc() : array {
        $sql = "SELECT * FROM tintuc";
        $stm = $this->con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
