<?php

namespace App;

use App\ItemContainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    protected $with = ['slug'];

    public function scopeRoots($query) {
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
     * @return array
     */
    public function getAllChildrenIds()
    {
        $sql = "
            SELECT id FROM categories where parent_id = @pv
            UNION
            SELECT id
            FROM (
                SELECT * 
                FROM categories
                ORDER BY parent_id, id) s,
            (SELECT @pv := ?) initialisation
            WHERE find_in_set(parent_id, @pv) > 0
            AND @pv2 := CONCAT(@pv,',', id)
        ";

        return collect(\DB::select($sql, [$this->id]))->pluck('id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    /**
     * Gets actual slug
     *
     * @return App\CategorySlug
     */
    public function slug() {
        return $this->hasOne('App\CategorySlug', 'category_id', 'id')->latest();
    }

    /**
     * Returns ItemContainer collection for given Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers() {
        return $this->hasMany('App\ItemContainer', 'category_id', 'id')->
            union(ItemContainer::whereIn('category_id', $this->getAllChildrenIds()));
    }

}
