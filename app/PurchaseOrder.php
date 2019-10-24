<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id'];

    /**
     * Has many outstanding products
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany('Inventory\PurchaseOrderProduct', 'order_id', 'id');
    }

    /**
     * Has many received products
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventoryItems() {
        return $this->hasMany('Inventory\InventoryItem', 'order_id', 'id');
    }
}
