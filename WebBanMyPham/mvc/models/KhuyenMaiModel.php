<?php
class KhuyenMaiModel extends DB {
    public function getAllKhuyenMai() {
        $sql = "SELECT * FROM khuyenmai";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addKhuyenMai($tenKM, $moTa, $giamGia, $ngayBD, $ngayKT) {
        $sql = "INSERT INTO khuyenmai (tenKM, moTa, giamGia, ngayBD, ngayKT) VALUES (:tenKM, :moTa, :giamGia, :ngayBD, :ngayKT)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':tenKM', $tenKM);
        $stmt->bindParam(':moTa', $moTa);
        $stmt->bindParam(':giamGia', $giamGia);
        $stmt->bindParam(':ngayBD', $ngayBD);
        $stmt->bindParam(':ngayKT', $ngayKT);
        return $stmt->execute();
    }

    public function deleteKhuyenMai($id) {
        $sql = "DELETE FROM khuyenmai WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateKhuyenMai($id, $tenKM, $moTa, $giamGia, $ngayBD, $ngayKT) {
        $sql = "UPDATE khuyenmai 
                SET tenKM = :tenKM, moTa = :moTa, giamGia = :giamGia, ngayBD = :ngayBD, ngayKT = :ngayKT 
                WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':tenKM', $tenKM);
        $stmt->bindParam(':moTa', $moTa);
        $stmt->bindParam(':giamGia', $giamGia);
        $stmt->bindParam(':ngayBD', $ngayBD);
        $stmt->bindParam(':ngayKT', $ngayKT);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            return true; // Thành công
        } else {
            return false; // Thất bại
        }
    }
    

    public function getKhuyenMaiById($id) {
        $stmt = $this->con->prepare("SELECT * FROM khuyenmai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
