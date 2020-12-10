<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_product', 'bouquet_id', 'product_id')
        ->withPivot([
            'quantity',
        ]);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product');
    }

    public function scopeByCategoryName($query, $name) {
        return $query->whereHas('categories', function ($query) use ($name) {
            $query->where('categories.name', $name);
        });
    }

    /**
     * @inheritDoc
     */
    public function getBuyableIdentifier($options = null)
    {
        // TODO: Implement getBuyableIdentifier() method.
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getBuyableDescription($options = null)
    {
        // TODO: Implement getBuyableDescription() method.
        return $this->title;
    }

    /**
     * @inheritDoc
     */
    public function getBuyablePrice($options = null)
    {
        // TODO: Implement getBuyablePrice() method.
        return $this->price;
    }

    /**
     * @inheritDoc
     */
    public function getBuyableWeight($options = null)
    {
        // TODO: Implement getBuyableWeight() method.
    }


    /**
     * Проверка на тип товара и вывод цены
     * @return mixed
     */
    public function getPrice()
    {
        return ( $this->type != 2 ) ? $this->price : $this->calculatePrice();
    }


    /**
     * Калькулятор цены коллекции
     * @return mixed
     */
    public function calculatePrice()
    {
        $this->products()->sum(function ($product) {
            return $product['quantity'] * $product['price'];
        });
    }
}
