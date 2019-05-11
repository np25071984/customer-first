<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemContainer extends Model
{
    protected $with = ['items'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items() {
        return $this->hasMany('App\Item', 'container_id', 'id');
    }

}
