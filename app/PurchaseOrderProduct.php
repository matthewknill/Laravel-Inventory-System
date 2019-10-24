<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderProduct extends Model
{
    public $incrementing = false;
    protected $primaryKey = ['prod_sku', 'order_id'];
    protected $fillable = ['prod_sku', 'order_id'];


    /**
     * Belongs to a purchase order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseOrder() {
        return $this->belongsTo('Inventory\PurchaseOrder', 'id', 'order_id');
    }
}
