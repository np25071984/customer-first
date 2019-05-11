<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $with = ['slug'];

    /**
     * Gets actual slug
     *
     * @return App\ItemSlug
     */
    public function slug() {
        return $this->hasOne('App\ItemSlug', 'item_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function container()
    {
        return $this->belongsTo('App\ItemContainer', 'container_id');
    }

}
