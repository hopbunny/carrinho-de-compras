<?php 

namespace Controller;

use Cart\Cart;
use Model\ProductModel;
use View\ViewLoader;

class HomeController extends BaseController
{

    public function get() {
        return ViewLoader::render(
            'home', 
            ['products' => ProductModel::all(), 'totalOnCart' => count(Cart::all())]
        );
    }
    
}