<?php
class LoginModel extends DB {
    public function checkLogin($UserName, $PassWord) {
        // Sử dụng prepared statement để bảo vệ chống lại SQL Injection
        $sql = "SELECT * FROM danhkithanhvien WHERE UserName = :UserName AND PassWord = :PassWord";

        // Chuẩn bị truy vấn
        $stm = $this->con->prepare($sql);

        // Ràng buộc giá trị cho các tham số
        $stm->bindParam(':UserName', $UserName);
        $stm->bindParam(':PassWord', $PassWord);

        // Thực thi truy vấn
        $stm->execute();

        // Kiểm tra nếu có kết quả trả về
        if ($stm->rowCount() > 0) {
            // Lấy dữ liệu người dùng
            $user = $stm->fetch(PDO::FETCH_ASSOC);
            return $user; // Đăng nhập thành công
        } else {
            return false; // Đăng nhập thất bại
        }
    }

    public function checkLevel($userName) {
        // Câu lệnh SQL với dấu hỏi (?) là placeholder cho tham số đầu vào
        $sql = "SELECT Level FROM danhkithanhvien WHERE UserName = ?";
        $stsm = $this->con->prepare($sql); 
        $stsm->execute([$userName]);
        $level = $stsm->fetchColumn();
        return $level;
    }
    

    public function logout() {
        // Kiểm tra và khởi tạo session nếu chưa bắt đầu
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Lấy tên người dùng từ session
        $userName = $_SESSION['user'] ?? null;
        
        // Kiểm tra quyền của người dùng trước khi đăng xuất
        if ($userName) {
            $level = $this->checkLevel($userName); // Lấy level người dùng
    
            // Hủy session để đăng xuất người dùng
            session_destroy();
    
            // Kiểm tra level để điều hướng
            if ($level == 'quantri') {
                header("Location: " . BASE_URL . "Home");
            } else {
                header("Location: " . BASE_URL . "Home");
            }
            exit();
        }
    }
    
    public function getUser($user) {
        $sql = "SELECT * FROM danhkithanhvien WHERE UserName = :user";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng fetch để trả về toàn bộ mảng
    }
    
    // Hàm cập nhật thông tin tài khoản
    public function updateUser($userName, $fullName, $email, $dienThoai, $gioiTinh, $quocTich, $diaChi, $soThich, $level, $hinhAnh = null) {
        // Nếu có hình ảnh, sử dụng câu lệnh với hình ảnh
        if ($hinhAnh) {
            $sql = "UPDATE danhkithanhvien 
                    SET FullName = :fullName, Email = :email, DienThoai = :dienThoai, GioiTinh = :gioiTinh, 
                        QuocTich = :quocTich, DiaChi = :diaChi, SoThich = :soThich, Level = :level, HinhAnh = :hinhAnh 
                    WHERE UserName = :userName";
        } else {
            // Nếu không có hình ảnh, bỏ qua phần hình ảnh trong câu lệnh
            $sql = "UPDATE danhkithanhvien 
                    SET FullName = :fullName, Email = :email, DienThoai = :dienThoai, GioiTinh = :gioiTinh, 
                        QuocTich = :quocTich, DiaChi = :diaChi, SoThich = :soThich, Level = :level 
                    WHERE UserName = :userName";
        }

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->con->prepare($sql);

        // Gán các giá trị vào tham số
        $params = [
            ':fullName' => $fullName,
            ':email' => $email,
            ':dienThoai' => $dienThoai,
            ':gioiTinh' => $gioiTinh,
            ':quocTich' => $quocTich,
            ':diaChi' => $diaChi,
            ':soThich' => $soThich,
            ':level' => $level,
            ':userName' => $userName,
        ];

        // Nếu có hình ảnh, thêm tham số hình ảnh
        if ($hinhAnh) {
            $params[':hinhAnh'] = $hinhAnh;
        }

        // Thực thi câu lệnh SQL
        return $stmt->execute($params);
    }

    public function kiemTraMatKhauCu($user, $matKhauCu) {
    // Mã hóa mật khẩu cũ nhập vào và kiểm tra với cơ sở dữ liệu
        $sql = "SELECT Password FROM danhkithanhvien WHERE UserName = :user";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Kiểm tra mật khẩu cũ có đúng không
        if ($result['Password'] == $matKhauCu) {
            return true;
        }
        return false;
    }

    public function capNhatMatKhau($user, $matKhauMoi) {
        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $sql = "UPDATE danhkithanhvien SET Password = :newPassword WHERE UserName = :user";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':newPassword', $matKhauMoi);
        $stmt->bindParam(':user', $user);
        
        return $stmt->execute();
    }

    
}


?>