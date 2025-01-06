<?php
class NhaCungCap extends Controller {
    
    public function getShow() {
        $page = "NhaCungCap/NhaCungCap";
        $NhaCungCapModel = $this->model("NhaCungCapModel");
        $danhSach = $NhaCungCapModel->layTatCaNhaCungCap();
        $this->view("AdminView", [
            "page" => $page, 
            "nhacungcap" => $danhSach
        ]); // Đã thêm dấu chấm phẩy
    }

    public function themNhaCungCap() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $duLieuNhaCungCap = [
                'TenNCC' => $_POST['ten_ncc'],
                'DiaChi' => $_POST['dia_chi'],
                'SoDienThoai' => $_POST['so_dien_thoai'],
                'Email' => $_POST['email'],
                'NguoiLienHe' => $_POST['nguoi_lien_he']
            ];
            $NhaCungCapModel = $this->model("NhaCungCapModel");
            $NhaCungCapModel->themNhaCungCap($duLieuNhaCungCap);
            $this->getShow();
        } else {
            $this->view("AdminView", ["page" => "NhaCungCap/ThemNhaCungCap"]);
        }
    }

    public function suaNhaCungCap($id) {
        $NhaCungCapModel = $this->model("NhaCungCapModel");
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $duLieuNhaCungCap = [
                'TenNCC' => $_POST['ten_ncc'],
                'DiaChi' => $_POST['dia_chi'],
                'SoDienThoai' => $_POST['so_dien_thoai'],
                'Email' => $_POST['email'],
                'NguoiLienHe' => $_POST['nguoi_lien_he']
            ];
            $NhaCungCapModel->capNhatNhaCungCap($id, $duLieuNhaCungCap);
            $this->getShow(); // Điều hướng về trang danh sách nhà cung cấp
        } else {
            $nhaCungCap = $NhaCungCapModel->layNhaCungCapTheoID($id);
            $this->view("AdminView", [
                "page" => "NhaCungCap/SuaNhaCungCap",
                "nhacungcap" => $nhaCungCap
            ]);
        }
    }
    

    public function xoaNhaCungCap($id) {
        $NhaCungCapModel = $this->model("NhaCungCapModel");
        $NhaCungCapModel->xoaNhaCungCap($id);
        $this->getShow();
    }
}
?>
