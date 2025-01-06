<?php
class QuanLyTonKhoModel extends DB {
    public function getSanPham(){
        $sql = "SELECT * FROM adproduct";
        $stm = $this->con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSanPhamByMaSP($ma_sp) {
        $sql = "SELECT * FROM adproduct WHERE ma_sp = :ma_sp";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':ma_sp', $ma_sp);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSoLuong($ma_sp, $new_quantity) {
        $sql = "UPDATE adproduct SET soluong = :soluong WHERE ma_sp = :ma_sp";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':soluong', $new_quantity);
        $stmt->bindParam(':ma_sp', $ma_sp);
        $stmt->execute();
    }

    public function updateKhuyenMai($ma_sp, $khuyenmai) {
        $sql = "UPDATE adproduct SET khuyenmai = :khuyenmai WHERE ma_sp = :ma_sp";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':khuyenmai', $khuyenmai);
        $stmt->bindParam(':ma_sp', $ma_sp);
        $stmt->execute();
    }
    
}

?>