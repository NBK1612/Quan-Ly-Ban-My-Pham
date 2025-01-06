<?php
class Home extends Controller {
    public function getShow() {
        // Lấy dữ liệu từ Model
        $homeModel = $this->model("HomeModel");
        $products = $homeModel->getProducts();
        $productTypes = $homeModel->getProductTypes();

        // Kiểm tra tìm kiếm
        if (isset($_POST['search'])) {
            $searchKeyword = $_POST['txt_search'];
            $categoryFilter = isset($_POST['category']) ? $_POST['category'] : '';
    
            // Lọc theo từ khóa nếu có
            if (!empty($searchKeyword)) {
                $products = $homeModel->searchProducts($searchKeyword);
            }
    
            // Lọc theo danh mục hoặc sản phẩm giảm giá
            if (!empty($categoryFilter)) {
                if ($categoryFilter === "discounted") {
                    // Lọc sản phẩm giảm giá
                    $products = array_filter($products, function ($product) {
                        return $product['khuyenmai'] > 0;
                    });
                } else {
                    // Lọc theo danh mục 
                    $id = $homeModel->getMaspbyName($categoryFilter);
                    $products = array_filter($products, function ($product) use ($id) {
                        return $product['Ma_loaisp'] == $id;
                    });
                }
            }
        }
    
        $this->view("HomeView", ["page" => "Home", "products" => $products, "productTypes" => $productTypes]);
    }
    

    public function getDetailsProduct($id) {
        $adProductModel = $this->model("HomeModel");
        
        if (!$id) {
            header("Location: " . BASE_URL . "Home/getShow");
            exit; 
        }
            $productDetail = $adProductModel->getProductById($id);
                if ($productDetail) {
            $data["product"] = $productDetail; 
            $data["page"] = "Details_Product";
            $this->view("HomeView", $data);
        } else {
            $_SESSION['error_message'] = "Sản phẩm không tồn tại.";
            header("Location: " . BASE_URL . "Home/getShow");
            exit;
        }
    }

    public function getDetailsTinTuc($id) {
        $TinTucModel = $this->model("HomeModel");
        
        if (!$id) {
            header("Location: " . BASE_URL . "Home/getShow");
            exit; 
        }
            $TinTucDetail = $TinTucModel->getTinById($id);
                if ($TinTucDetail) {
            $data["TinTuc"] = $TinTucDetail; 
            $data["page"] = "Details_TinTuc";
            $this->view("HomeView", $data);
        } else {
            $_SESSION['error_message'] = "Tin không tồn tại.";
            header("Location: " . BASE_URL . "Home/getShow");
            exit;
        }
    }

    public function adProduct(){
        $adProductModel = $this->model("HomeModel");
        $adproduct = $adProductModel->getProducts();
        $this->view("HomeView", ["page" => "Adproduct", "adproduct" => $adproduct]);
    }

    public function TinTuc(){
        $TinTucModel = $this->model("HomeModel");
        $TinTuc = $TinTucModel->getTinTuc();
        $this->view("HomeView", ["page" => "TinTuc", "TinTuc" => $TinTuc]);
    }

    public function LienHe(){
        $adProductModel = $this->model("HomeModel");
        $this->view("HomeView", ["page" => "LienHe"]);
    }

}
