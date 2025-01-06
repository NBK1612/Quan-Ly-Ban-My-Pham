<?php
class QuanLyTonKho extends Controller {
    public function getShow() {
        $page = "QuanLyTonKho/QuanLyTonKho";
        $sanpham = $this->model("QuanLyTonKhoModel");
        $this->view("AdminView", [
            "page" => $page,
            "Adproduct" => $sanpham->getSanPham()
        ]);
    }

    public function add($ma_sp) {
        $sanpham = $this->model("QuanLyTonKhoModel");
        $product = $sanpham->getSanPhamByMaSP($ma_sp);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quantity = $_POST['order_quantity'];

            $sanpham->updateSoLuong($ma_sp, $product['soluong'] + $quantity);
            echo "<script>alert('Order sản phẩm thành thành công.'); window.location.href='" . BASE_URL . "QuanLyTonKho';</script>";
            exit();
        }

        $this->view("AdminView", [
            "page" => "QuanLyTonKho/OrderSanPham",
            "product" => $product
        ]);
    }
}


?>