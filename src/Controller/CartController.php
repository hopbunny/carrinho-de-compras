<?php 

namespace Controller;

use Cart\Cart;
use View\ViewLoader;

class CartController extends BaseController
{

    public function get(): string 
    {
        return ViewLoader::render('cart', ['products' => Cart::all()]);
    }

    public function post(): void 
    {
        $productId = intval($_POST['product-id'] ?? 0);
        if(!empty($productId) && !Cart::has($productId)) {
            Cart::put($productId);
            http_response_code(201);
            die;
        }
        http_response_code(400);
    }

    public function put(): void 
    {
        Cart::clear();
        http_response_code(200);
    }

    public function delete(): void 
    {
        $productId = intval($_POST['product-id'] ?? 0);
        if(!empty($productId) && Cart::has($productId)) {
            Cart::remove($productId);
            http_response_code(201);
            die;
        }
        http_response_code(400);
    }
}