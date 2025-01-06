<?php
class Adproduct extends Controller {

    public function getShow() {
        $page = "Adproduct/Adproduct";
        $adProductTypeModel = $this->model("AdproductModel");
        $this->view("AdminView", ["Adproduct" => $adProductTypeModel->showAdProductType(), 
        "page" => $page]);    
    }

    public function add() {
        $page = "Adproduct/Add_Product";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Ma_loaisp = $_POST['txt_maloaisp']; // Lấy mã loại sản phẩm từ dropdown
            $ma_sp = $_POST['txt_masp'];
            $Ten_loaisp = $_POST['txt_tenloaisp'];
            $hinhanh = $_FILES['txt_hinhanh']['name'];
            $gianhap = $_POST['txt_gianhap'];
            $giaxuat = $_POST['txt_giaxuat'];
            $soluong = $_POST['txt_soluong'];
            $khuyenmai = $_POST['txt_khuyenmai'];
            $Mota_loaisp = $_POST['txt_motaloaisp'];
            $create_date = $_POST['txt_create_date'];
    
            // Khởi tạo biến $data để lưu trữ thông tin
            $data = [
                "Ma_loaisp" => $Ma_loaisp,
                "ma_sp" => $ma_sp,
                "Ten_loaisp" => $Ten_loaisp,
                "hinhanh" => $hinhanh,
                "gianhap" => $gianhap,
                "giaxuat" => $giaxuat,
                "soluong" => $soluong,
                "khuyenmai" => $khuyenmai,
                "Mota_loaisp" => $Mota_loaisp,
                "create_date" => $create_date,
                "error" => ""
            ];
            
            // Khởi tạo model
            $adProductModel = $this->model("AdProductModel");

            // Kiểm tra nếu mã sản phẩm đã tồn tại
            if ($adProductModel->isMaSPExist($ma_sp)) {
                $data["error"] = "Mã sản phẩm đã tồn tại. Vui lòng nhập mã khác.";
                $this->view("AdminView", ["page" => $page, $data]);
                return;
            }
            // Kiểm tra xem có trường nào bị trống không
            if (empty($Ma_loaisp) || empty($ma_sp) || empty($Ten_loaisp) || empty($hinhanh) || 
                empty($gianhap) || empty($giaxuat) || empty($soluong) || empty($khuyenmai) || 
                empty($Mota_loaisp) || empty($create_date)) {
                $data["error"] = "Các trường không được để trống.";
                $this->view("AdminView",  ["page" => $page,
                            "error" => "Các trường không được để trống."
                        ]);
            } else {
                // Xử lý upload hình ảnh
                $target_dir = "./public/images/";
                $target_file = $target_dir . basename($_FILES["txt_hinhanh"]["name"]);
                $uploadOk = 1;
    
                // Kiểm tra kiểu tệp
                
    
                // Giới hạn kích thước tệp
                
    
                // Chỉ cho phép các định dạng hình ảnh
                
    
                // Kiểm tra nếu uploadOk là 0 do lỗi
                if ($uploadOk == 0) {
                    $this->view("AdminView",  ["page" => $page, $data]);
                } else {
                    if (move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                        // Nếu upload thành công, gọi mô hình để thêm sản phẩm
                        $adProductModel = $this->model("AdProductModel");
    
                        try {
                            $adProductModel->addAdProduct($Ma_loaisp, $ma_sp, $Ten_loaisp, $hinhanh, $gianhap, $giaxuat, $soluong, $khuyenmai, $Mota_loaisp, $create_date);
                            echo "<script>alert('Thêm sản phẩm thành công.'); window.location.href='" . BASE_URL . "AdProduct';</script>";
                            exit;
                        } catch (Exception $e) {
                            $data["error"] = $e->getMessage();
                            $this->view("AdminView",  ["page" => $page, $data]);
                        }
                    } else {
                        $data["error"] = "Xin lỗi, đã có lỗi xảy ra khi upload tệp của bạn.";
                        $this->view("AdminView",  ["page" => $page, $data]);
                    }
                }
            }
        } else {
            $adProductTypeModel = $this->model("AdproductModel");
            $data["allMaLoaiSanPham"] = $adProductTypeModel->getAllMaLoaiSanPham();
            $data["allTenLoaiSanPham"] = $adProductTypeModel->getAllTenLoaiSanPham();

            // Nếu không phải là yêu cầu POST, hiển thị form thêm sản phẩm
            $this->view("AdminView", [
                "page" => $page,
                "Ma_loaisp" => "",
                "ma_sp" => "",
                "Ten_loaisp" => "",
                "hinhanh" => "",
                "gianhap" => "",
                "giaxuat" => "",
                "soluong" => "",
                "khuyenmai" => "",
                "Mota_loaisp" => "",
                "create_date" => "",
                "error" => "",
                "allMaLoaiSanPham" => $data["allMaLoaiSanPham"], // Truyền dữ liệu vào view
                "allTenLoaiSanPham" => $data["allTenLoaiSanPham"]
            ]);
        }
    }
    

    public function delete($id) {
        $adProductTypeModel = $this->model("AdproductModel");
        $adProductTypeModel->deleteAdProduct($id);
        echo "<script>alert('Xóa sản phẩm thành công.'); window.location.href='" . BASE_URL . "AdProduct';</script>";
    }

    public function edit($id) {
        $page = "AdProduct/Edit_AdProduct";
        $adProductModel = $this->model("AdproductModel");
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $ma_loaisp = trim($_POST['txt_maloaisp']);
            $tensp = trim($_POST['txt_tenloaisp']);
            $gianhap = trim($_POST['txt_gianhap']);
            $giaxuat = trim($_POST['txt_giaxuat']);
            $soluong = trim($_POST['txt_soluong']);
            $khuyenmai = trim($_POST['txt_khuyenmai']);
            $mota_sp = trim($_POST['txt_motaloaisp']);
            $create_date = trim($_POST['txt_create_date']);
    
            // Xử lý hình ảnh
            if (!empty($_FILES['txt_hinhanh']['name'])) {
                // Người dùng đã tải lên hình ảnh mới
                $hinhanh = $_FILES['txt_hinhanh']['name'];
                $target_dir = "./public/images/"; // Đường dẫn thư mục lưu trữ hình ảnh
                $target_file = $target_dir . basename($_FILES["txt_hinhanh"]["name"]);
                $uploadOk = 1;
    
                // Kiểm tra kiểu tệp
                
    
                // Giới hạn kích thước tệp
                
    
                // Chỉ cho phép các định dạng hình ảnh
                
    
                // Kiểm tra nếu uploadOk là 0 do lỗi
                if ($uploadOk == 0) {
                    $data["error"] = "Có lỗi xảy ra khi tải lên hình ảnh.";
                    $this->view("AdminView", [
                        "page" => $page, // Tên trang cần load
                        "error" => $data["error"]
                    ]);  
                    return;
                } else {
                    // Di chuyển tệp hình ảnh vào thư mục đích
                    if (!move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                        $data["error"] = "Có lỗi xảy ra khi di chuyển tệp hình ảnh.";
                        $this->view("AdminView", [
                            "page" => $page, // Tên trang cần load
                            "error" => $data["error"]
                        ]); 
                        return;
                    }
                }
            } else {
                // Nếu không có hình ảnh mới được tải lên, giữ lại hình ảnh cũ
                $adProduct = $adProductModel->getAdProductById($id);
                $hinhanh = $adProduct['hinhanh']; // Giữ lại hình ảnh cũ
            }
    
            try {
                // Cập nhật sản phẩm
                $adProductModel->updateAdProduct($id, $ma_loaisp, $tensp, $gianhap, $giaxuat, $soluong, $khuyenmai, $mota_sp, $create_date, $hinhanh);
                // Chuyển hướng đến danh sách sản phẩm
                echo "<script>alert('Cập nhật sản phẩm thành công.'); window.location.href='" . BASE_URL . "AdProduct';</script>";
                exit(); // Dừng thực hiện script
            } catch (Exception $e) {
                    // Xử lý lỗi
                    $data["error"] = $e->getMessage();
                    $data["Adproduct"] = $adProductModel->getAdProductById($id);
                    $this->view("AdminView", [
                        "page" => $page, // Tên trang cần load
                        "Adproduct" => $data["Adproduct"], // Dữ liệu sản phẩm
                        "error" => $data["error"]
                    ]);              
                }
        } else {
            // Nếu không phải là yêu cầu POST, lấy dữ liệu sản phẩm
            $data["Adproduct"] = $adProductModel->getAdProductById($id);
            // $this->view("AdminPages/Edit_AdProduct", $data);
            $this->view("AdminView", [
                "page" => $page, // Tên trang cần load
                "Adproduct" => $data["Adproduct"] // Dữ liệu sản phẩm
            ]);        }
    }  
    
}
