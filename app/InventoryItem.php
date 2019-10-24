<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    public $incrementing = false;
    protected $table = 'inventory';
    protected $primaryKey = 'id';
    protected $fillable = ['id'];

    /**
     * Has an associated order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order() {
        return $this->belongsTo('Inventory\PurchaseOrder', 'id', 'order_id');
    }

    /**
     * Has an associated product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() {
        return $this->belongsTo('Inventory\Product', 'sku', 'prod_sku');
    }
}
