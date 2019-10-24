<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Inventory{
/**
 * Inventory\PurchaseOrderProduct
 *
 * @property string $order_id
 * @property string $prod_sku
 * @property int $count
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Inventory\PurchaseOrder $purchaseOrder
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct whereProdSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrderProduct whereUpdatedAt($value)
 */
	class PurchaseOrderProduct extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\InventoryItem
 *
 * @property int $id
 * @property string $order_id
 * @property string|null $serial
 * @property string|null $mac
 * @property string $prod_sku
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Inventory\PurchaseOrder $order
 * @property-read \Inventory\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereMac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereProdSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\InventoryItem whereUpdatedAt($value)
 */
	class InventoryItem extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\CommittedProduct
 *
 * @property int $loc_id
 * @property string $prod_sku
 * @property string $install_date
 * @property int $count
 * @property string $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereInstallDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereLocId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereProdSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\CommittedProduct whereUpdatedAt($value)
 */
	class CommittedProduct extends \Eloquent {}
}

namespace Inventory{
/**
 * InventoryItem\Post
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Post query()
 * @mixin \Eloquent
 */
	class Post extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\Product
 *
 * @property string $sku
 * @property string $name
 * @property string|null $info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Inventory\InventoryItem $inventory
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\ItemLocation
 *
 * @property int $loc_id
 * @property int $inv_id
 * @property string $move_date
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation whereInvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation whereLocId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation whereMoveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\ItemLocation whereUpdatedAt($value)
 */
	class ItemLocation extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\Supplier
 *
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Supplier whereUpdatedAt($value)
 */
	class Supplier extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\Location
 *
 * @property int $id
 * @property string $descriptor
 * @property string $account_num
 * @property string|null $address_line1
 * @property string|null $address_line2
 * @property string|null $address_line3
 * @property string|null $address_line4
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $state
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereAccountNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereAddressLine3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereAddressLine4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereDescriptor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\Location whereUpdatedAt($value)
 */
	class Location extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\PurchaseOrder
 *
 * @property string $id
 * @property string $issue_date
 * @property string $sup_name
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inventory\InventoryItem[] $inventoryItems
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inventory\PurchaseOrderProduct[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder whereSupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\PurchaseOrder whereUpdatedAt($value)
 */
	class PurchaseOrder extends \Eloquent {}
}

namespace Inventory{
/**
 * Inventory\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inventory\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

