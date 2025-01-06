<?php
    class Admin extends Controller{
        public function getShow(){
            $AdProductType = $this->model("AdProductTypeModel");
            
            $this->view("AdminView", ["page"=>"AdProductType/AdProductType", "Adproducttype" => $AdProductType->showAdProductType()]);
        }
    }

?>