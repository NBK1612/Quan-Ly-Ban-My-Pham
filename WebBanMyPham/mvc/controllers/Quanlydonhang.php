<?php
class Quanlydonhang extends Controller{
    public function getShow(){
        $page = "Quanlydonhang/Quanlydonhang";
        $orderModel = $this->model("DonHangModel");
        
        // Lấy danh sách đơn hàng từ model
        $order = $orderModel->getOrder();

        // Truyền dữ liệu đơn hàng vào view
        $this->view("AdminView", [
            "page" => $page,
            "order" => $order
        ]);
    }
    
    public function ChiTiet($id){
        $page = "Quanlydonhang/ChiTietDonHang";
        $orderdetailModel = $this->model("DonHangModel");
        $oderdetail = $orderdetailModel->showOrderdetail($id);
        // Truyền dữ liệu đơn hàng vào view
        $this->view("AdminView", [
            "page" => $page,
            "orderdetail" => $oderdetail
        ]);
    }
    // sẽ cập nhật trạng thái đơn hàng, 
    public function chinhSua($id) {
        $orderModel = $this->model("DonHangModel");
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $trangThai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
                if (!empty($trangThai)) {
                    if($trangThai == "choxuly"){
                        $trangThai = "Đang chờ xử lý";
                    }
                    else if($trangThai == "danggiaohang"){
                        $trangThai = "Đang giao hàng";
                    }
                    else if($trangThai == "dathanhtoan"){
                        $trangThai = "Đã thanh toán";
                    }
                }
                if ($trangThai == "Đã thanh toán") {
                    $order = $orderModel->getOrderbyId($id);  // Trả về mảng của một bản ghi
                
                    if ($order) {  // Kiểm tra xem có lấy được đơn hàng không
                        $mahd = $order["mahd"];
                        $makh = $order["makh"];
                        $tenkh = $order["tenkh"];
                        $phone = $order["phone"];
                        $diachilh = $order["diachilh"];
                        $diachigh = $order["diachigh"];
                        $tongtien = $order["tongtien"];
                        $create_date = date("Y-m-d");
                
                        // Gọi phương thức insertLichSuMuaHang với từng tham số cụ thể
                        $orderModel->insertLichSuMuaHang($mahd, $makh, $tenkh, $phone, $diachilh, $diachigh, $tongtien, $create_date, $trangThai);
                        $orderModel->deleteOderById($id);
                    }
                }
                
                $orderModel->updateOrderStatus($id, $trangThai);
                    echo "<script>alert('Chỉnh sửa trạng thái đơn hàng thành thành công.'); window.location.href='" . BASE_URL . "Quanlydonhang';</script>";
                    exit();
        }
        else {
            $order = $orderModel->getOrderbyId($id);

            // Truyền dữ liệu đơn hàng vào view
            $this->view("AdminView", [
                        "page" => "Quanlydonhang/ChinhSuaTrangThai",
                        "order" => $order
                ]);
            }
        }     
}

?>