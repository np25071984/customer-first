<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSlug extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items_slug';

    public $timestamps = false;

    public function getRouteKeyName() {
        return 'value';
    }

    /**
     * @return App\Category
     */
    public function item() {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }
}
