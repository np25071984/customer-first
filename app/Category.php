<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $with = ['slug' ];

    public function scopeRoot($query) {
        return $query->whereNull('parent_id');
    }

    /**
     * Returns all subcategories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children() {
        return $this->hasMany('App\Category', 'parent_id', 'id')->
            with('children')->
            oldest('order');
    }

    /**
     * Gets actual slug
     *
     * @return App\CategorySlug
     */
    public function slug() {
        return $this->hasOne('App\CategorySlug', 'category_id', 'id')->latest();
    }
}
