<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function scopeBelongs($query)
    {
        return $query->where('parent_id', '=', 18);
    }

    public function scopeEvent($query)
    {
        return $query->where('parent_id', '=', 29);
    }

    public function scopeStyle($query)
    {
        return $query->where('parent_id', '=', 38);
    }


    public function scopeGeneral($query)
    {
        return $query->where('parent_id', NULL)
            ->whereNotIn('name', ['Повод', 'Кому', 'Стиль']);
    }
}
