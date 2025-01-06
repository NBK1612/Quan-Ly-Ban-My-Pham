<?php
class KhuyenMai extends Controller {
    public function getShow() {
        $khuyenMaiModel = $this->model("KhuyenMaiModel");

        $this->view("AdminView", [
            "page" => "KhuyenMai/DanhSachKhuyenMai",
            "khuyenmai" => $khuyenMaiModel->getAllKhuyenMai()
        ]);
    }

    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenKM = $_POST["tenKM"];
            $moTa = $_POST["moTa"];
            $giamGia = $_POST["giamGia"];
            $ngayBD = $_POST["ngayBD"];
            $ngayKT = $_POST["ngayKT"];

            $khuyenMaiModel = $this->model("KhuyenMaiModel");
            if ($khuyenMaiModel->addKhuyenMai($tenKM, $moTa, $giamGia, $ngayBD, $ngayKT)) {
                echo "<script>alert('Thêm chương trình khuyến mại thành công.'); window.location.href='" . BASE_URL . "KhuyenMai';</script>";
            } else {
                echo "Thêm thất bại!";
            }
        } else {
            $this->view("AdminView", [
                "page" => "KhuyenMai/ThemKhuyenMai"
            ]);
        }
    }

    public function delete($id) {
        $khuyenMaiModel = $this->model("KhuyenMaiModel");
        if ($khuyenMaiModel->deleteKhuyenMai($id)) {
            $this->getShow();
        } else {
            echo "Xóa thất bại!";
        }
    }

    public function update($id) {
        $khuyenMaiModel = $this->model("KhuyenMaiModel");
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $tenKM = $_POST['tenKM'];
            $moTa = $_POST['moTa'];
            $giamGia = $_POST['giamGia'];
            $ngayBD = $_POST['ngayBD'];
            $ngayKT = $_POST['ngayKT'];
    
            if ($khuyenMaiModel->updateKhuyenMai($id, $tenKM, $moTa, $giamGia, $ngayBD, $ngayKT)) {
                echo "<script>alert('Cập nhật chương trình khuyến mại thành công.'); window.location.href='" . BASE_URL . "KhuyenMai';</script>";
            } else {
                echo "Cập nhật thất bại!";
            }
        } else {
            // Lấy thông tin chương trình khuyến mại cần sửa
            $khuyenMai = $khuyenMaiModel->getKhuyenMaiById($id);
    
            if ($khuyenMai) {
                $this->view("AdminView", [
                    "page" => "KhuyenMai/SuaKhuyenMai",
                    "khuyenmai" => $khuyenMai
                ]);
            } else {
                echo "<script>alert('Không tìm thấy chương trình khuyến mại.'); window.location.href='" . BASE_URL . "KhuyenMai';</script>";
            }
        }
    }
    
}
?>
