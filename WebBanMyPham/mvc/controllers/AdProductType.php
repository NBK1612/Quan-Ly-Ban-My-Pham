<?php
class AdProductType extends Controller {

    public function getShow() {
        $page = "AdProductType/AdProductType";
        $adProductTypeModel = $this->model("AdProductTypeModel");
        $data["Adproducttype"] = $adProductTypeModel->showAdProductType();
        $this->view("AdminView", ["page" => $page, 
                                "Adproducttype" => $data["Adproducttype"]]
        );  
    }


    public function add() {
        $page = "AdProductType/Add_AdproductType"; // Xác định view cần load
        $data = []; // Khởi tạo mảng $data để lưu trữ thông tin
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maloaisp = trim($_POST['txt_maloaisp']);
            $name = trim($_POST['txt_tenloaisp']);
            $description = trim($_POST['txt_motaloaisp']);
            
            // Kiểm tra các trường không được để trống
            if (empty($maloaisp) || empty($name) || empty($description)) {
                $data['error'] = "Tất cả các trường không được để trống.";
            } 
            // Kiểm tra độ dài của các trường
            elseif (strlen($maloaisp) > 10) {
                $data['error'] = "Mã loại sản phẩm không được vượt quá 10 ký tự.";
            } 
            elseif (strlen($name) > 50) {
                $data['error'] = "Tên loại sản phẩm không được vượt quá 50 ký tự.";
            } 
            elseif (strlen($description) > 255) {
                $data['error'] = "Mô tả loại sản phẩm không được vượt quá 255 ký tự.";
            } 
            else {
                $adProductTypeModel = $this->model("AdProductTypeModel");
                
                // Kiểm tra mã loại sản phẩm đã tồn tại hay chưa
                if ($adProductTypeModel->checkIfProductTypeExists($maloaisp)) {
                    $data['error'] = "Mã loại sản phẩm đã tồn tại.";
                } else {
                    try {
                        // Thêm loại sản phẩm vào cơ sở dữ liệu
                        $adProductTypeModel->addAdProductType($maloaisp, $name, $description);
                        echo "<script>alert('Thêm loại sản phẩm thành công.'); window.location.href='" . BASE_URL . "Adproducttype';</script>";
                    } catch (Exception $e) {
                        // Lưu thông báo lỗi vào biến để hiển thị trên giao diện
                        $data['error'] = $e->getMessage();
                    }
                }
            }
        }
        
        // Hiển thị form thêm sản phẩm với thông báo lỗi (nếu có)
        $this->view("AdminView", [
            "page" => $page,
            "Ma_loaisp" => $maloaisp ?? "",
            "ma_sp" => "",
            "Ten_loaisp" => $name ?? "",
            "error" => $data['error'] ?? ""
        ]);
    }
    
    public function edit($id) {
        $page = "AdProductType/Edit_AdProductType"; // Xác định view cần load
        $adProductTypeModel = $this->model("AdProductTypeModel");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['txt_tenloaisp'];
            $description = $_POST['txt_motaloaisp'];
            $adProductTypeModel->updateAdProductType($id, $name, $description);
            echo "<script>alert('Sửa lại sản phẩm thành công.'); window.location.href='" . BASE_URL . "AdProductType';</script>";
        } else {
            $data["Adproducttype"] = $adProductTypeModel->getAdProductTypeById($id);
            $this->view("AdminView", [
                "page" => $page,
                "Adproducttype" => $data["Adproducttype"]
            ]);
        }
    }

    public function delete($id) {
        $adProductTypeModel = $this->model("AdProductTypeModel");
        $adProductTypeModel->deleteAdProductType($id);
        echo "<script>alert('Xóa lại sản phẩm thành công.'); window.location.href='" . BASE_URL . "AdProductType';</script>";
    }

    public function search() {
        $page = "AdProductType/AdProductType";
        $search = isset($_GET['search']) ? $_GET['search'] : '';  // Lấy từ khóa tìm kiếm
        
        $adProductTypeModel = $this->model("AdProductTypeModel");
        
        // Kiểm tra nếu từ khóa tìm kiếm không rỗng
        if ($search) {
            $data["Adproducttype"] = $adProductTypeModel->searchProductTypes($search);  // Gọi hàm tìm kiếm trong model
        } else {
            $data["Adproducttype"] = $adProductTypeModel->showAdProductType();  // Nếu không có từ khóa tìm kiếm, hiển thị tất cả loại sản phẩm
        }
    
        $this->view("AdminView", [
            "page" => $page, 
            "Adproducttype" => $data["Adproducttype"]
        ]);
    }    
    
}
