<?php
class GopY extends Controller {
    
    // Phương thức để hiển thị danh sách góp ý
    public function getShow() {
        $page = "GopY";
        // Lấy model GopYModel
        $gopyModel = $this->model("GopYModel");

        // Lấy tất cả các góp ý từ model
        $danhSachGopY = $gopyModel->layTatCaGopY();

        // Truyền dữ liệu sang view để hiển thị
        $this->view("AdminView", [
            "page" => $page,
            "danhSachGopY" => $danhSachGopY
        ]);
    }

    // Phương thức để xử lý thêm góp ý mới
    public function themGopY() {
        $user = $_SESSION["user"];
        $page = "ThemGopY";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $tenkh = $_POST['tenkh'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $ngaygopy = date('Y-m-d'); // Lấy ngày hiện tại
            $noi_dung = $_POST['noi_dung'];

            // Gọi model và thêm góp ý
            $gopyModel = $this->model("GopYModel");
            $gopyModel->themGopY($tenkh, $email, $phone, $ngaygopy, $noi_dung);

            echo "<script>alert('Thêm góp ý thành công.'); window.location.href='" . BASE_URL . "Home';</script>";
        } else {
            // Hiển thị trang thêm góp ý
            $this->view("HomeView", [
                "page" => $page
            ]);        }
    }

    public function delete($id){
        $page = "ThemGopY";
        $gopyModel = $this->model("GopYModel");
        $check = $gopyModel->xoaGopY($id);
        if($check){
            echo "<script>alert('Xóa góp ý thành công.'); window.location.href='" . BASE_URL . "GopY';</script>";
        }
        else {
            echo "<script>alert('Xóa góp ý không thành công.'); window.location.href='" . BASE_URL . "GopY';</script>";
        }
    }
}
?>
