<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ItemImage extends Model
{
    protected $fillable = ['item_id', 'src'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (ItemImage $image) {
            $item = $image->item;
            File::delete(public_path("/img/{$item->id}/{$image->src}"));
        });
    }

    /**
     * @return App\Item
     */
    public function item() {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }

}
