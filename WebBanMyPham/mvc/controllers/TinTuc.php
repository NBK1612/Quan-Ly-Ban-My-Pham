<?php
class TinTuc extends Controller {

    public function getShow() {
        $page = "TinTuc/TinTuc";
        $TinTucModel = $this->model("TinTucModel");
        $this->view("AdminView", ["TinTuc" => $TinTucModel->showTinTuc(), 
        "page" => $page]);    
    }

    public function add() {
        $page = "TinTuc/Add_TinTuc";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matintuc = $_POST['txt_matintuc'];
            $tieude = $_POST['txt_tieude'];
            $hinhanh = $_FILES['txt_hinhanh']['name'];
            $noidung = $_POST['txt_noidung'];
            $create_date = $_POST['txt_create_date'];
    
            // Khởi tạo biến $data để lưu trữ thông tin
            $data = [
                "matintuc" => $matintuc,
                "tieude" => $tieude,
                "hinhanh" => $hinhanh,
                "noidung" => $noidung,
                "create_date" => $create_date,
                "error" => ""
            ];
            
            // Khởi tạo model
            $TinTucModel = $this->model("TinTucModel");

            // Kiểm tra nếu mã sản phẩm đã tồn tại
            if ($TinTucModel->isMaTTExist($matintuc)) {
                $data["error"] = "Mã đã tồn tại. Vui lòng nhập mã khác.";
                $this->view("AdminView", ["page" => $page, $data]);
                return;
            }
            // Kiểm tra xem có trường nào bị trống không
            if (empty($matintuc) || empty($tieude) || empty($hinhanh) || empty($noidung) || empty($create_date)) {
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
                        $TinTucModel = $this->model("TinTucModel");
    
                        try {
                            $TinTucModel->addTinTuc($matintuc, $tieude, $hinhanh, $noidung, $create_date);
                            echo "<script>alert('Thêm thành công.'); window.location.href='" . BASE_URL . "TinTuc';</script>";
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
            $TinTucModel = $this->model("TinTucModel");
            $data["allmatintuc"] = $TinTucModel->getallmatintuc();
            $data["alltieude"] = $TinTucModel->getalltieude();

            // Nếu không phải là yêu cầu POST, hiển thị form thêm sản phẩm
            $this->view("AdminView", [
                "page" => $page,
                "matintuc" => "",
                "tieude" => "",
                "hinhanh" => "",
                "noidung" => "",
                "create_date" => "",
                "error" => "",
                "allmatintuc" => $data["allmatintuc"], // Truyền dữ liệu vào view
                "alltieude" => $data["alltieude"]
            ]);
        }
    }
    

    public function delete($id) {
        $TinTucModel = $this->model("TinTucModel");
        $TinTucModel->deleteTinTuc($id);
        echo "<script>alert('Xóa thành công.'); window.location.href='" . BASE_URL . "TinTuc';</script>";
    }

    public function edit($id) {
        $page = "TinTuc/Edit_TinTuc";
        $TinTucModel = $this->model("TinTucModel");
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $matintuc = trim($_POST['txt_matintuc']);
            $tieude = trim($_POST['txt_tieude']);
            $noidung = trim($_POST['txt_noidung']);
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
                $TinTuc = $TinTucModel->getTinTucById($id);
                $hinhanh = $TinTuc['hinhanh']; // Giữ lại hình ảnh cũ
            }
    
            try {
                // Cập nhật sản phẩm
                $TinTucModel->updateTinTuc($id, $matintuc, $tieude, $noidung, $create_date, $hinhanh);
                // Chuyển hướng đến danh sách sản phẩm
                echo "<script>alert('Cập nhật sản phẩm thành công.'); window.location.href='" . BASE_URL . "TinTuc';</script>";
                exit(); // Dừng thực hiện script
            } catch (Exception $e) {
                    // Xử lý lỗi
                    $data["error"] = $e->getMessage();
                    $data["TinTuc"] = $TinTucModel->getTinTucById($id);
                    $this->view("AdminView", [
                        "page" => $page, // Tên trang cần load
                        "TinTuc" => $data["TinTuc"], // Dữ liệu sản phẩm
                        "error" => $data["error"]
                    ]);              
                }
        } else {
            // Nếu không phải là yêu cầu POST, lấy dữ liệu sản phẩm
            $data["TinTuc"] = $TinTucModel->getTinTucById($id);
            // $this->view("AdminPages/Edit_TinTuc", $data);
            $this->view("AdminView", [
                "page" => $page, // Tên trang cần load
                "TinTuc" => $data["TinTuc"] // Dữ liệu sản phẩm
            ]);        }
    }  
    
}
