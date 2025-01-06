<?php
class QuanLyDoanhThu extends Controller {
    public function getShow() {
        $page = "QuanLyDoanhThu/QuanLyDoanhThu";
        $doanhthu = $this->model("QuanLyDoanhThuModel");
        $data = $doanhthu->getDoanhThu();
        $this->view("AdminView", [
                    "page" => $page,
                    "danhSachDonHang" => $data
        ]);
    }

    public function ChiTiet($id){
        $page = "QuanLyDoanhThu/ChiTietDonHang";
        $doanhthu = $this->model("QuanLyDoanhThuModel");
        $oderdetail = $doanhthu->showOrderdetail($id);
        // Truyền dữ liệu đơn hàng vào view
        $this->view("AdminView", [
            "page" => $page,
            "orderdetail" => $oderdetail
        ]);
    }

    public function getDoanhThuTheoNgay() {
        $page = "QuanLyDoanhThu/QuanLyDoanhThu";
        $date = $_POST['date']; // Ngày nhận từ form
        $doanhthu = $this->model("QuanLyDoanhThuModel");
        $danhSachDonHang = $doanhthu->getDoanhThuTheoNgay($date);
        $this->view("AdminView", [
            "page" => $page,
            "danhSachDonHang" => $danhSachDonHang,
            "date" => $date
        ]);
    }

    public function getDoanhThuTheoNam() {
        $page = "QuanLyDoanhThu/QuanLyDoanhThu";
        $year = $_POST['year'];
        $doanhthu = $this->model("QuanLyDoanhThuModel");
        $data = $doanhthu->getDoanhThuTheoNam($year);
        $this->view("AdminView", [
                "page" => $page,
                "danhSachDonHang" => $data,
                "year" => $year
            ]);
        }

    public function getDoanhThuTheoKhoangThoiGian() {
        $page = "QuanLyDoanhThu/QuanLyDoanhThu";
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $doanhthu = $this->model("QuanLyDoanhThuModel");
        $data = $doanhthu->getDoanhThuTheoKhoangThoiGian($startDate, $endDate);
        $this->view("AdminView", [
            "page" => $page,
            "danhSachDonHang" => $data,
            "startDate" => $startDate,
            "endDate" => $endDate
        ]);
    }
    public function getDoanhThuTheoThang() {
        $page = "QuanLyDoanhThu/QuanLyDoanhThu";
        $month = $_POST['month'];
        $year = $_POST['year'];
        $doanhthu = $this->model("QuanLyDoanhThuModel");
        $data = $doanhthu->getDoanhThuTheoThang($month, $year);
        $this->view("AdminView", [
            "page" => $page,
            "danhSachDonHang" => $data,
            "month" => $month,
            "year" => $year
        ]);
    }
}
?>