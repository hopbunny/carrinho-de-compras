<?php 

declare(strict_types=1);

namespace Model;

class ProductModel 
{

    use ModelTrait;

    public static function getTableName(): string 
    {
        return 'product';
    }

}