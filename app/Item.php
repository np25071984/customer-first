<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\NoImage;

class Item extends Model
{
    protected $with = ['slug'];

    protected $fillable = ['name', 'description', 'container_id', 'price', 'article'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Item $item) {
            foreach($item->images as $image) {
                $image->delete();
            }

            File::deleteDirectory(storage_path("item_image_orig/{$item->id}"));
        });
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images() {
        return $this->hasMany('App\ItemImage', 'item_id', 'id');
    }

    public function getTopImageSrc($height, $width) {
        $image = $this->images->first();
        if (!$image) {
            $image = new NoImage();
        }

        return $image->getSrc($height, $width);
    }

}
