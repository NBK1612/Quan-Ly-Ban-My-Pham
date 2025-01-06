<?php
class GopYModel extends DB {
    
    // Thêm một góp ý mới vào bảng gopy
    public function themGopY($tenkh, $email, $phone, $ngaygopy, $noi_dung) {
        $sql = "INSERT INTO gopy (tenkh, email, phone, ngaygopy, noi_dung) 
                VALUES (:tenkh, :email, :phone, :ngaygopy, :noi_dung)";
        
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':tenkh', $tenkh);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':ngaygopy', $ngaygopy);
        $stmt->bindParam(':noi_dung', $noi_dung);
        
        return $stmt->execute();
    }

    // Lấy tất cả các góp ý từ bảng gopy
    public function layTatCaGopY() {
        $sql = "SELECT * FROM gopy ORDER BY ngaygopy DESC";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Lấy một góp ý theo ID
    public function layGopYTheoID($id) {
        $sql = "SELECT * FROM gopy WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function xoaGopY($id){
        $sql = "DELETE FROM gopy where id =:id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        if($stm->execute()){
            return true;
        }
        return false;
    }
}
?>
