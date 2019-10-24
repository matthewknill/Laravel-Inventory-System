<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'sku';
    protected $fillable = ['sku'];

    /**
     * Has many inventory items
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inventory() {
        return $this->hasOne('Inventory\InventoryItem', 'prod_sku', 'sku');
    }
}
