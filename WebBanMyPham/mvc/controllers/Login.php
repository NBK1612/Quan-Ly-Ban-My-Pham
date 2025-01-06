<?php
class Login extends Controller {
    public function getShow() {
        $page = "Login/Login";
        // Tạo đối tượng model để xử lý đăng nhập
        $loginModel = $this->model("LoginModel");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $txt_username = $_POST['txt_username'];
            $txt_password = $_POST['txt_password'];

            try {
                // Kiểm tra thông tin đăng nhập
                $user = $loginModel->checkLogin($txt_username, $txt_password);

                if ($user) {
                    // Nếu đăng nhập thành công, lưu thông tin người dùng vào session
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['user'] = $user['UserName'];  // Lưu tên tài khoản vào session
                    
                    $level = $loginModel->checkLevel($txt_username);
                    // Chuyển hướng đến trang Admin
                    if($level == "quantri"){
                        header("Location: " . BASE_URL . "Admin");
                        exit();
                    }
                    else{
                        header("Location: " . BASE_URL . "Home");
                        exit();
                    }    
                } else {
                    // Nếu tài khoản hoặc mật khẩu sai
                    $data['error'] = "Sai tài khoản hoặc mật khẩu.";
                    $this->view($page, $data);
                }
            } catch (Exception $e) {
                // Xử lý lỗi phát sinh trong quá trình kiểm tra đăng nhập
                $data['error'] = "Có lỗi xảy ra: " . $e->getMessage();
                $this->view("$page", $data);
            }
        } else {
            // Nếu phương thức yêu cầu không phải POST, hiển thị trang đăng nhập
            $this->view("$page");
        }
    }

    public function LogOut() {
        // Gọi phương thức logout từ LoginModel để hủy session
        $logoutModel = $this->model("LoginModel");
        $logoutModel->logout();
    }

    public function ThongTinTaiKhoan($user) {
        // Tạo đối tượng model để lấy dữ liệu người dùng
        $login = $this->model("LoginModel");
        
        // Lấy thông tin tài khoản của người dùng
        $taikhoan = $login->getUser($user);

        // Kiểm tra nếu $taikhoan không phải là mảng (nghĩa là không lấy được dữ liệu)
        if (!is_array($taikhoan)) {
            die("Không tìm thấy thông tin tài khoản.");
        }
    
        $level = $login->checkLevel($user);
        // Chuyển hướng đến trang Admin
        if($level == "quantri"){
           // Truyền dữ liệu $data vào view
            $this->view("AdminView", [
                "page" => "ThongTinTaiKhoan",
                "FullName" => $taikhoan["FullName"],
                "UserName" => $taikhoan["UserName"],
                "Email" => $taikhoan["Email"],
                "DienThoai" => $taikhoan["DienThoai"],
                "GioiTinh" => $taikhoan["GioiTinh"],
                "QuocTich" => $taikhoan["QuocTich"],
                "DiaChi" => $taikhoan["DiaChi"],
                "SoThich" => $taikhoan["SoThich"],
                "Level" => $taikhoan["Level"]
            ]);
        }
        else{
            // Truyền dữ liệu $data vào view
            $this->view("HomeView", [
                "page" => "ThongTinTaiKhoan",
                "FullName" => $taikhoan["FullName"],
                "UserName" => $taikhoan["UserName"],
                "Email" => $taikhoan["Email"],
                "DienThoai" => $taikhoan["DienThoai"],
                "GioiTinh" => $taikhoan["GioiTinh"],
                "QuocTich" => $taikhoan["QuocTich"],
                "DiaChi" => $taikhoan["DiaChi"],
                "SoThich" => $taikhoan["SoThich"],
                "Level" => $taikhoan["Level"]
            ]);
        }           
        
        
        

    }
    
    
    public function update() {
        // Kiểm tra nếu dữ liệu được gửi từ form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $userName = $_POST["UserName"];
            $fullName = $_POST["FullName"];
            $email = $_POST["Email"];
            $dienThoai = $_POST["DienThoai"];
            $gioiTinh = $_POST["GioiTinh"];
            $quocTich = $_POST["QuocTich"];
            $diaChi = $_POST["DiaChi"];
            $soThich = $_POST["SoThich"];
            $level = $_POST["Level"];
            
            // Kiểm tra nếu người dùng có tải lên hình ảnh
            $hinhAnh = null;
            if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] == 0) {
                // Tải lên hình ảnh
                $hinhAnh = $_FILES['HinhAnh']['name'];
                $uploadDir = 'public/images/';
                $uploadFile = $uploadDir . basename($hinhAnh);
                
                if (move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $uploadFile)) {
                    // Hình ảnh đã được tải lên thành công
                } else {
                    // Lỗi khi tải hình ảnh
                    $hinhAnh = null;
                }
            }
    
            // Gọi model để cập nhật thông tin tài khoản
            $login = $this->model("LoginModel");
            $level = $login->checkLevel($_SESSION["user"]);

            $isUpdated = $login->updateUser($userName, $fullName, $email, $dienThoai, $gioiTinh, $quocTich, $diaChi, $soThich, $level, $hinhAnh);
             // Kiểm tra xem việc cập nhật có thành công không
             if ($isUpdated) {
                if($level == "quantri"){
                    echo "<script>alert('Chỉnh sửa thông tin tài khoản thành công.'); window.location.href='" . BASE_URL . "Admin';</script>";
                }
                else{
                    echo "<script>alert('Chỉnh sửa thông tin tài khoản thành công.'); window.location.href='" . BASE_URL . "Home';</script>";
                }  
            }
            else {
                echo "Cập nhật không thành công!";
            }
           
        }
    }
    
    
    public function DoiMatKhau() {
        $login = $this->model("LoginModel");
        $level = $login->checkLevel($_SESSION["user"]);
        // Kiểm tra nếu người dùng đã gửi form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy mật khẩu cũ và mật khẩu mới từ form
            $matKhauCu = $_POST['MatKhauCu'];
            $matKhauMoi = $_POST['MatKhauMoi'];
            $matKhauMoiNhapLai = $_POST['MatKhauMoiNhapLai'];   
            
            // Kiểm tra mật khẩu mới và mật khẩu nhập lại có khớp không
            if ($matKhauMoi !== $matKhauMoiNhapLai) {
                echo "<script>alert('Mật khẩu mới và mật khẩu nhập lại không khớp!'); window.location.href='" . BASE_URL . "Home';</script>";
                return;
            }
    
            // Tạo đối tượng model để kiểm tra mật khẩu cũ và cập nhật mật khẩu mới
            $loginModel = $this->model("LoginModel");
    
            // Kiểm tra mật khẩu cũ có đúng không
            $user = $_SESSION["user"];
            if ($loginModel->kiemTraMatKhauCu($user, $matKhauCu)) {
                // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                if ($loginModel->capNhatMatKhau($user, $matKhauMoi)) {
                    if($level == "quantri"){
                        echo "<script>alert('Đổi mật khẩu thành công.'); window.location.href='" . BASE_URL . "Admin';</script>";
                    }
                    else {
                        echo "<script>alert('Đổi mật khẩu thành công.'); window.location.href='" . BASE_URL . "Home';</script>";
                    }
                } else {
                    echo "<script>alert('Có lỗi xảy ra khi cập nhật mật khẩu.');</script>";
                }
            } else {
                if($level == "quantri"){
                    echo "<script>alert('Mật khẩu cũ không đúng.'); window.location.href='" . BASE_URL . "Admin';</script>";
                }
                else {
                    echo "<script>alert('Mật khẩu cũ không đúng.'); window.location.href='" . BASE_URL . "Home';</script>";
                }
            }
        }
        
        if($level == "quantri"){
            // Hiển thị form đổi mật khẩu
            $this->view("AdminView", [
                "page" => "DoiMatKhau",
            ]);
        }
        else {
            // Hiển thị form đổi mật khẩu
            $this->view("HomeView", [
                "page" => "DoiMatKhau",
            ]);
        }
        
    }
    
    

}