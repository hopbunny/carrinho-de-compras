<?php 

namespace Cart;

use Model\ProductModel;

class Cart 
{

    private const CART_SESSION_FIELD = 'cart';

    public static function put(int $productId): void
    {
        $_SESSION[self::CART_SESSION_FIELD][] = $productId;
    }

    public static function has(int $productId): bool 
    {
        return array_search($productId, $_SESSION[self::CART_SESSION_FIELD] ?? []) !== false;
    }

    public static function remove(int $productId): void 
    {
        $key = array_search($productId, $_SESSION[self::CART_SESSION_FIELD] ?? []);
        if($key !== false) {
            unset($_SESSION[self::CART_SESSION_FIELD][$key]);
        }
    }

    public static function all(): array 
    {
        $products = [];
        foreach($_SESSION[self::CART_SESSION_FIELD] ?? [] as $productId) {
            $product = ProductModel::where('id', $productId);
            if($product) {
                $products[] = $product;
            }
        }

        return $products;
    }

    public static function clear(): void 
    {
        $_SESSION[self::CART_SESSION_FIELD] = [];
    }
}   