<?php 

namespace Controller;

use Model\ProductModel;
use View\ViewLoader;

class CreateProductController extends BaseController
{

    public function get(): string 
    {
        return ViewLoader::render('create-product');
    }

    public function post(): void 
    {   
        $photoUrl = $this->saveUploadedPhoto(); 

        $product = new ProductModel;
        $product->name = $_POST['name'];
        $product->price = floatval($_POST['price']);
        $product->image_url = $photoUrl;
        $product->create();

        header('Location: '.APP_HOST);
        die;
    }

    private function saveUploadedPhoto(): string 
    {
        $uploadedFileName = $_FILES['photo']['name'];
        $uploadedFileExtension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);

        $savedFileName = bin2hex(random_bytes(5)).'.'.$uploadedFileExtension;
        $saveToPath = dirname(__DIR__, 2).'/uploads/'.$savedFileName;

        move_uploaded_file($_FILES['photo']['tmp_name'], $saveToPath);

        return APP_HOST.'/uploads/'.$savedFileName;
    }
}