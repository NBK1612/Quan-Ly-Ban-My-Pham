<?php
class QuanlyKhachHang extends Controller{
    public function getShow() {
        $page = "QuanlyKhachHang/QuanlyKhachHang";
        $QuanLyKhachHangModel = $this->model("QuanlyKhachHangModel");
        $this->view("AdminView", [
            "page" => $page,
            "QuanlyKhachHang" => $QuanLyKhachHangModel->showQuanlyKhachHang()
        ]);
    }

    public function delete($id) {
        $page = "QuanlyKhachHang";
        $adProductTypeModel = $this->model("QuanlyKhachHangModel");
        $adProductTypeModel->deleteKhachHang($id);
        header("Location: " . BASE_URL . $page);
    }

    public function add() {
        $page = "QuanlyKhachHang/Add_QuanlyKhachHang";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $FullName = $_POST['txt_fullname'];
            $UserName = $_POST['txt_username'];
            $PassWord = $_POST['txt_password'];
            $Email = $_POST['txt_email'];
            $DienThoai = $_POST['txt_dienthoai'];
            $GioiTinh = $_POST['txt_gioitinh'];
            $QuocTich = $_POST['txt_quoctich'];
            $DiaChi = $_POST['txt_diachi'];
            $HinhAnh = $_FILES['txt_hinhanh']['name'];
            $SoThich = $_POST['txt_sothich'];
            $Level = $_POST['txt_level']; // Thêm trường Level nếu có
        
            // Khởi tạo biến $data để lưu trữ thông tin
            $data = [
                "FullName" => $FullName,
                "UserName" => $UserName,
                "PassWord" => $PassWord,
                "Email" => $Email,
                "DienThoai" => $DienThoai,
                "GioiTinh" => $GioiTinh,
                "QuocTich" => $QuocTich,
                "DiaChi" => $DiaChi,
                "HinhAnh" => $HinhAnh,
                "SoThich" => $SoThich,
                "Level" => $Level,
                "error" => ""
            ];
        
            // Kiểm tra xem có trường nào bị trống không
            if (empty($FullName) || empty($UserName) || empty($PassWord) || empty($Email) ||
                empty($DienThoai) || empty($GioiTinh) || empty($QuocTich) || empty($DiaChi) || 
                empty($HinhAnh) || empty($SoThich) || empty($Level)) {
                $data["error"] = "Các trường không được để trống.";
                $this->view("AdminView", [
                    "page" => $page,
                    "error" => $data["error"]
                ]);
            } else {
                // Xử lý upload hình ảnh
                $target_dir = "./public/images/";
                $target_file = $target_dir . basename($_FILES["txt_hinhanh"]["name"]);
                $uploadOk = 1;
        
                // Kiểm tra kiểu tệp
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["txt_hinhanh"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $data["error"] = "Tệp không phải hình ảnh.";
                        $uploadOk = 0;
                    }
                }
        
                // Giới hạn kích thước tệp
                if ($_FILES["txt_hinhanh"]["size"] > 5000000) {
                    $data["error"] = "Xin lỗi, kích thước tệp quá lớn.";
                    $uploadOk = 0;
                }
        
                // Chỉ cho phép các định dạng hình ảnh
                if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                    $data["error"] = "Xin lỗi, chỉ cho phép các định dạng JPG, JPEG, PNG & GIF.";
                    $uploadOk = 0;
                }
        
                // Kiểm tra nếu uploadOk là 0 do lỗi
                if ($uploadOk == 0) {
                    $this->view("AdminView", [
                        "page" => $page,
                        "error" => $data["error"]
                    ]);
                } else {
                    if (move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                        // Nếu upload thành công, gọi mô hình để thêm khách hàng
                        $khachHangModel = $this->model("QuanlyKhachHangModel");
        
                        try {
                            $khachHangModel->addKhachHang($FullName, $UserName, $PassWord, $Email, $DienThoai, $GioiTinh, $QuocTich, $DiaChi, $HinhAnh, $SoThich, $Level);
                            header("Location: " . BASE_URL . "QuanlyKhachHang");
                            exit;
                        } catch (Exception $e) {
                            $data["error"] = $e->getMessage();
                            $this->view("AdminView", [
                                "page" => $page,
                                "error" => $data["error"]
                            ]);
                        }
                    } else {
                        $data["error"] = "Xin lỗi, đã có lỗi xảy ra khi upload tệp của bạn.";
                        $this->view("AdminView", [
                            "page" => $page,
                            "error" => $data["error"]
                        ]);                    
                    }
                }
            }
        } else {
            // Nếu không phải là yêu cầu POST, hiển thị form thêm khách hàng
            $this->view("AdminView", [
                "page" => $page,
                "FullName" => "",
                "UserName" => "",
                "PassWord" => "",
                "Email" => "",
                "DienThoai" => "",
                "GioiTinh" => "",
                "QuocTich" => "",
                "DiaChi" => "",
                "HinhAnh" => "",
                "SoThich" => "",
                "Level" => "",
                "error" => ""
            ]);
        }
    }

    public function DangKy(){
        $page = "DangKy";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $FullName = $_POST['txt_fullname'];
            $UserName = $_POST['txt_username'];
            $PassWord = $_POST['txt_password'];
            $Email = $_POST['txt_email'];
            $DienThoai = $_POST['txt_dienthoai'];
            $GioiTinh = $_POST['txt_gioitinh'];
            $QuocTich = $_POST['txt_quoctich'];
            $DiaChi = $_POST['txt_diachi'];
            $HinhAnh = $_FILES['txt_hinhanh']['name'];
            $SoThich = $_POST['txt_sothich'];
            $Level = $_POST['txt_level']; // Thêm trường Level nếu có
        
            // Khởi tạo biến $data để lưu trữ thông tin
            $data = [
                "FullName" => $FullName,
                "UserName" => $UserName,
                "PassWord" => $PassWord,
                "Email" => $Email,
                "DienThoai" => $DienThoai,
                "GioiTinh" => $GioiTinh,
                "QuocTich" => $QuocTich,
                "DiaChi" => $DiaChi,
                "HinhAnh" => $HinhAnh,
                "SoThich" => $SoThich,
                "Level" => $Level,
                "error" => ""
            ];
        
            // Kiểm tra xem có trường nào bị trống không
            if (empty($FullName) || empty($UserName) || empty($PassWord) || empty($Email) ||
                empty($DienThoai) || empty($GioiTinh) || empty($QuocTich) || empty($DiaChi) || 
                empty($HinhAnh) || empty($SoThich) || empty($Level)) {
                $data["error"] = "Các trường không được để trống.";
                $this->view("HomeView", [
                    "page" => $page,
                    "error" => $data["error"]
                ]);
            } else {
                // Xử lý upload hình ảnh
                $target_dir = "./public/images/";
                $target_file = $target_dir . basename($_FILES["txt_hinhanh"]["name"]);
                $uploadOk = 1;
        
                // Kiểm tra kiểu tệp
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["txt_hinhanh"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $data["error"] = "Tệp không phải hình ảnh.";
                        $uploadOk = 0;
                    }
                }
        
                // Giới hạn kích thước tệp
                if ($_FILES["txt_hinhanh"]["size"] > 5000000) {
                    $data["error"] = "Xin lỗi, kích thước tệp quá lớn.";
                    $uploadOk = 0;
                }
        
                // Chỉ cho phép các định dạng hình ảnh
                if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                    $data["error"] = "Xin lỗi, chỉ cho phép các định dạng JPG, JPEG, PNG & GIF.";
                    $uploadOk = 0;
                }
        
                // Kiểm tra nếu uploadOk là 0 do lỗi
                if ($uploadOk == 0) {
                    $this->view("HomeView", [
                        "page" => $page,
                        "error" => $data["error"]
                    ]);
                } else {
                    if (move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                        // Nếu upload thành công, gọi mô hình để thêm khách hàng
                        $khachHangModel = $this->model("QuanlyKhachHangModel");
        
                        try {
                            $khachHangModel->addKhachHang($FullName, $UserName, $PassWord, $Email, $DienThoai, $GioiTinh, $QuocTich, $DiaChi, $HinhAnh, $SoThich, $Level);
                            header("Location: " . BASE_URL . "Home");
                            exit;
                        } catch (Exception $e) {
                            $data["error"] = $e->getMessage();
                            $this->view("HomeView", [
                                "page" => $page,
                                "error" => $data["error"]
                            ]);
                        }
                    } else {
                        $data["error"] = "Xin lỗi, đã có lỗi xảy ra khi upload tệp của bạn.";
                        $this->view("HomeView", [
                            "page" => $page,
                            "error" => $data["error"]
                        ]);                    
                    }
                }
            }
        } else {
            // Nếu không phải là yêu cầu POST, hiển thị form thêm khách hàng
            $this->view("HomeView", [
                "page" => $page,
                "FullName" => "",
                "UserName" => "",
                "PassWord" => "",
                "Email" => "",
                "DienThoai" => "",
                "GioiTinh" => "",
                "QuocTich" => "",
                "DiaChi" => "",
                "HinhAnh" => "",
                "SoThich" => "",
                "Level" => "",
                "error" => ""
            ]);
        }
    }
    
    public function edit($id) {
        $page = "QuanlyKhachHang/Edit_QuanlyKhachHang";

        // Lấy model khách hàng
        $QuanLyKhachHangModel = $this->model("QuanlyKhachHangModel");
    
        // Nếu có yêu cầu POST, xử lý cập nhật khách hàng
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $FullName = $_POST['txt_fullname'];
            $UserName = $_POST['txt_username'];
            $PassWord = $_POST['txt_password'];
            $Email = $_POST['txt_email'];
            $DienThoai = $_POST['txt_dienthoai'];
            $GioiTinh = $_POST['txt_gioitinh'];
            $QuocTich = $_POST['txt_quoctich'];
            $DiaChi = $_POST['txt_diachi'];
            $SoThich = $_POST['txt_sothich'];
            $Level = $_POST['txt_level'];
            $HinhAnhMoi = $_FILES['txt_hinhanh']['name'];
    
            // Khởi tạo biến $data để lưu trữ thông tin
            $data = [
                "FullName" => $FullName,
                "UserName" => $UserName,
                "PassWord" => $PassWord,
                "Email" => $Email,
                "DienThoai" => $DienThoai,
                "GioiTinh" => $GioiTinh,
                "QuocTich" => $QuocTich,
                "DiaChi" => $DiaChi,
                "HinhAnh" => $HinhAnhMoi,
                "SoThich" => $SoThich,
                "Level" => $Level,
                "error" => ""
            ];
    
            // Kiểm tra các trường nhập liệu có trống không
            if (empty($FullName) || empty($UserName) || empty($PassWord) || empty($Email) || empty($DienThoai) ||
                empty($GioiTinh) || empty($QuocTich) || empty($DiaChi) || empty($SoThich) || empty($Level)) {
                $data["error"] = "Các trường không được để trống.";
                $this->view("AdminView", [
                    "page" => $page,
                    "error" => $data["error"]
                ]);
            } else {
                // Xử lý upload hình ảnh
                if (!empty($HinhAnhMoi)) {
                    $target_dir = "./public/images/";
                    $target_file = $target_dir . basename($HinhAnhMoi);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
                    // Kiểm tra tệp hình ảnh
                    $check = getimagesize($_FILES["txt_hinhanh"]["tmp_name"]);
                    if ($check === false) {
                        $data["error"] = "Tệp không phải là hình ảnh.";
                        $uploadOk = 0;
                    }
    
                    // Kiểm tra kích thước file
                    if ($_FILES["txt_hinhanh"]["size"] > 500000) {
                        $data["error"] = "Kích thước tệp quá lớn.";
                        $uploadOk = 0;
                    }
    
                    // Chỉ cho phép một số định dạng tệp hình ảnh
                    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                        $data["error"] = "Chỉ cho phép các định dạng JPG, JPEG, PNG & GIF.";
                        $uploadOk = 0;
                    }
    
                    // Nếu kiểm tra hình ảnh thành công
                    if ($uploadOk == 1) {
                        if (move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                            $HinhAnh = $HinhAnhMoi;
                        } else {
                            $data["error"] = "Đã có lỗi xảy ra khi tải tệp.";
                            $this->view("AdminView", [
                                "page" => $page,
                                "error" => $data["error"]
                            ]);
                            return;
                        }
                    }
                } else {
                    // Nếu không có ảnh mới, giữ nguyên ảnh cũ
                    // Hiển thị dữ liệu khách hàng cần chỉnh sửa
                    $khachHang = $QuanLyKhachHangModel->getKhachHangById($id);
                    $HinhAnh = $khachHang['HinhAnh'];
                }
    
                // Cập nhật thông tin khách hàng
                try {
                    $QuanLyKhachHangModel->updateKhachHang($FullName, $UserName, $PassWord, $Email, $DienThoai, $GioiTinh, $QuocTich, $DiaChi, $HinhAnh, $SoThich, $Level);
                    header("Location: " . BASE_URL . "QuanlyKhachHang");
                    exit;
                } catch (Exception $e) {
                    $data["error"] = $e->getMessage();
                    $this->view("AdminView", [
                        "page" => $page,
                        "error" => $data["error"]
                    ]);
                }
            }
        } else {
            // Hiển thị dữ liệu khách hàng cần chỉnh sửa
            $khachHang = $QuanLyKhachHangModel->getKhachHangById($id);
    
            $this->view("AdminView", [
                "page" => $page,
                "FullName" => $khachHang["FullName"],
                "UserName" => $khachHang["UserName"],
                "PassWord" => $khachHang["PassWord"],
                "Email" => $khachHang["Email"],
                "DienThoai" => $khachHang["DienThoai"],
                "GioiTinh" => $khachHang["GioiTinh"],
                "QuocTich" => $khachHang["QuocTich"],
                "DiaChi" => $khachHang["DiaChi"],
                "HinhAnh" => $khachHang["HinhAnh"],
                "SoThich" => $khachHang["SoThich"],
                "Level" => $khachHang["Level"],
                "error" => ""
            ]);
        }
    }
    
    

}

?>