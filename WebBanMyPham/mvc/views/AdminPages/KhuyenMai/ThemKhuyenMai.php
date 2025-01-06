<div class="container12">
    <div class="admin-header">
        <h2>Thêm Chương Trình Khuyến Mại</h2>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="tenKM">Tên Khuyến Mại:</label>
            <input type="text" name="tenKM" id="tenKM" required class="form-control">
        </div>
       
        <div class="form-group">
            <label for="moTa">Mô Tả:</label>
            <textarea name="moTa" id="moTa" rows="4" required class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="giamGia">Giảm Giá (%):</label>
            <input type="number" name="giamGia" id="giamGia" required class="form-control" min="0" max="100">
        </div>

        <div class="form-group">
            <label for="ngayBD">Ngày Bắt Đầu:</label>
            <input type="date" name="ngayBD" id="ngayBD" required class="form-control">
        </div>

        <div class="form-group">
            <label for="ngayKT">Ngày Kết Thúc:</label>
            <input type="date" name="ngayKT" id="ngayKT" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Thêm Khuyến Mại</button>
    </form>
</div>

<style>
    /* Đặt màu nền và lề cho container */
.container12 {
    width: 100%;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề form */
.admin-header h2 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Định dạng các trường nhập liệu */
.form-group {
    margin-top: 15px;
}

label {
    font-size: 16px;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
}

/* Định dạng cho textarea */
textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

/* Nút submit */
.btn {
    width: 15%;
    background-color: green;
    color: white;
    padding: 15px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
    display: block;  /* Đặt button dưới dạng block để có thể căn giữa */
    margin: 0 auto;  /* Căn giữa nút */
}



.btn:hover {
    background-color: #0056b3;
}

/* Thêm margin cho form-group cuối cùng */
.form-group:last-child {
    margin-bottom: 30px;
}

/* Cải thiện khoảng cách và căn chỉnh */
body {
    font-family: 'Arial', sans-serif;
    background-color: #e9ecef;
}

button {
    cursor: pointer;
}

</style>