<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model implements Buyable
{


    public function products()
    {
        return $this->belongsToMany('App\Product')
        ->withPivot([
            'quantity',
        ]);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_bouquet');
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
}
