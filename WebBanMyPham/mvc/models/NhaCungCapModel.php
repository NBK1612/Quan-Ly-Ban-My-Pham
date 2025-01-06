<?php
class NhaCungCapModel extends DB{
    public function layTatCaNhaCungCap() {
        $stmt = $this->con->prepare("SELECT * FROM NhaCungCap");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function themNhaCungCap($duLieuNhaCungCap) {
        $stmt = $this->con->prepare("INSERT INTO NhaCungCap (TenNCC, DiaChi, SoDienThoai, Email, NguoiLienHe) VALUES (:ten, :diachi, :sdt, :email, :nguoiLH)");
        $stmt->bindParam(":ten", $duLieuNhaCungCap['TenNCC']);
        $stmt->bindParam(":diachi", $duLieuNhaCungCap['DiaChi']);
        $stmt->bindParam(":sdt", $duLieuNhaCungCap['SoDienThoai']);
        $stmt->bindParam(":email", $duLieuNhaCungCap['Email']);
        $stmt->bindParam(":nguoiLH", $duLieuNhaCungCap['NguoiLienHe']);
        return $stmt->execute();
    }

    public function layNhaCungCapTheoID($id) {
        $stmt = $this->con->prepare("SELECT * FROM NhaCungCap WHERE MaNCC = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function capNhatNhaCungCap($id, $duLieuNhaCungCap) {
        $stmt = $this->con->prepare("UPDATE NhaCungCap SET TenNCC = :ten, DiaChi = :diachi, SoDienThoai = :sdt, Email = :email, NguoiLienHe = :nguoiLH WHERE MaNCC = :id");
        $stmt->bindParam(":ten", $duLieuNhaCungCap['TenNCC']);
        $stmt->bindParam(":diachi", $duLieuNhaCungCap['DiaChi']);
        $stmt->bindParam(":sdt", $duLieuNhaCungCap['SoDienThoai']);
        $stmt->bindParam(":email", $duLieuNhaCungCap['Email']);
        $stmt->bindParam(":nguoiLH", $duLieuNhaCungCap['NguoiLienHe']);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function xoaNhaCungCap($id) {
        $stmt = $this->con->prepare("DELETE FROM NhaCungCap WHERE MaNCC = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
