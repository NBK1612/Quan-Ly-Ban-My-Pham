<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    // protected function view($view, $data = []) {
    //     // Tách tên view thành thư mục và tệp
    //     $viewPath = explode('/', $view);
    //     $folder = $viewPath[0]; // thư mục
    //     $file = end($viewPath); // tệp PHP
        
    //     // Lấy tên tệp PHP (không có đuôi mở rộng)
    //     $fileName = "{$file}.php";

    //     // Yêu cầu tệp
    //     require_once "./mvc/views/{$folder}/{$fileName}";
    // }
    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }
}
?>