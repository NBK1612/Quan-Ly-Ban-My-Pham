<?php
class DiscountModel extends DB {
    // Lấy tất cả mã giảm giá
    public function getAllDiscountCodes() {
        $query = "SELECT * FROM DiscountCodes ORDER BY id DESC";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDiscountByCode($code) {
        $query = "SELECT * FROM DiscountCodes WHERE code = :code AND start_date <= NOW() AND end_date >= NOW()";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tạo mã giảm giá mới
    public function createDiscountCode($code, $discount_percentage, $start_date, $end_date) {
    $sql = "INSERT INTO DiscountCodes (code, discount_percentage, start_date, end_date, created_at) 
            VALUES (:code, :discount_percentage, :start_date, :end_date, NOW())";
    
    $stmt = $this->con->prepare($sql);
    $stmt->execute([
        ':code' => $code,
        ':discount_percentage' => $discount_percentage,
        ':start_date' => $start_date,
        ':end_date' => $end_date
    ]);
}

    // Xóa mã giảm giá theo ID
    public function deleteDiscountCode($id) {
        $query = "DELETE FROM DiscountCodes WHERE id = :id";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Kiểm tra mã giảm giá hợp lệ
    public function validateDiscountCode($code) {
        $query = "SELECT * FROM DiscountCodes 
                WHERE code = :code 
                AND start_date <= NOW() 
                AND end_date >= NOW()";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
