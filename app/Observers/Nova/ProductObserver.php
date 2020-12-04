<?php

namespace App\Observers\Nova;

use App\Models\Product;
use App\Models\ProductPrice;

class ProductObserver
{
    protected static $prices;
    protected static $uses;

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Language  $language
     * @return void
     */
    public function saved(Product $product)
    {
        if(!empty(self::$prices)) {
            ProductPrice::where('product_id', $product->id)->delete();
            foreach (self::$prices as $price) {
                $price['product_id'] = $product->id;
                $price['active'] = $price['active'] ? 1 : 0;

                ProductPrice::create($price);
            }
        }

//        if(!empty(self::$uses)) {
//            foreach (self::$uses as $use) {
//                dd($use);
//            }
//        }

    }

    public function saving(Product $product)
    {
        self::$prices = $product->prices;
        self::$uses =  $product->uses;
        unset($product->prices, $product->uses);
    }
}
