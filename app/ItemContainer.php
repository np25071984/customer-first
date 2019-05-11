<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemContainer extends Model
{
    protected $with = ['items', 'brand'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items() {
        return $this->hasMany('App\Item', 'container_id', 'id');
    }

    /**
     * @return App\Brand
     */
    public function brand() {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }
}
