<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandSlug extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands_slug';

    public $timestamps = false;

    public function getRouteKeyName() {
        return 'value';
    }

    /**
     * @return App\Category
     */
    public function brand() {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }
}
