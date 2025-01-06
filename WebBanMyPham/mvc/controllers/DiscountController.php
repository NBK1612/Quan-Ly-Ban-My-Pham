<?php
class DiscountController extends Controller {
    public function getShow() {
        // Lấy danh sách các mã giảm giá từ model
        $discountModel = $this->model("DiscountModel");
        $discounts = $discountModel->getAllDiscountCodes();
    
        // Gọi view và truyền dữ liệu
        $this->view("AdminPages/KhuyenMai/DiscountView", [
            "discounts" => $discounts
        ]);
    }
    // Hiển thị danh sách mã giảm giá
    public function show() {
        $discountModel = $this->model("DiscountModel");
        $discounts = $discountModel->getAllDiscountCodes();
        $this->view("AdminView", [
            "page" => "/KhuyenMai/DiscountView",
            "discounts" => $discounts
        ]);
    }

    // Tạo mã giảm giá mới
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $discountModel = $this->model("DiscountModel");
    
            // Random mã giảm giá
            $code = strtoupper(substr(md5(uniqid()), 0, 10));
            $discount_percentage = $_POST['discount_percentage'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
    
            // Lưu mã giảm giá vào CSDL
            $discountModel->createDiscountCode($code, $discount_percentage, $start_date, $end_date);
    
            // Chuyển hướng về trang danh sách mã giảm giá
            header("Location: " . BASE_URL . "DiscountController/show");
            exit();
        }
    }
    // Xóa mã giảm giá
    public function delete($id) {
        $discountModel = $this->model("DiscountModel");
        $discountModel->deleteDiscountCode($id);

        // Chuyển hướng về trang danh sách mã giảm giá
        header("Location: " . BASE_URL . "DiscountController/show");
        exit();
    
    }
}