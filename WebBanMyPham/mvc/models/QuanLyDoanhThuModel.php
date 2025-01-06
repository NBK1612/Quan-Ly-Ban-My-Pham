<?php
class QuanLyDoanhThuModel extends DB {
    public function getDoanhThu() {
        $sql = "SELECT * FROM lichsumuahang";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showOrderdetail($id){
        $sql = "SELECT * FROM oderdetail where mahd =:id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDoanhThuTheoNgay($date) {
        $sql = "SELECT mahd, makh, tenkh, phone, diachilh, diachigh, tongtien, create_date, trangthai FROM lichsumuahang WHERE create_date = :date";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDoanhThuTheoNam($year) {
        $sql = "SELECT mahd, makh, tenkh, phone, diachilh, diachigh, tongtien, create_date, trangthai 
                FROM lichsumuahang 
                WHERE YEAR(create_date) = :year";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getDoanhThuTheoKhoangThoiGian($startDate, $endDate) {
        $sql = "SELECT mahd, makh, tenkh, phone, diachilh, diachigh, tongtien, create_date, trangthai FROM lichsumuahang WHERE create_date BETWEEN :start_date AND :end_date";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDoanhThuTheoThang($month, $year) {
        $sql = "SELECT mahd, makh, tenkh, phone, diachilh, diachigh, tongtien, create_date, trangthai 
                FROM lichsumuahang 
                WHERE MONTH(create_date) = :month AND YEAR(create_date) = :year";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':month', $month);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>