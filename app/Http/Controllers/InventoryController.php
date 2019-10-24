<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Inventory\Location;
use Inventory\Product;
use Inventory\InventoryItem;
use Illuminate\Support\Facades\DB;
use Inventory\PurchaseOrder;


class InventoryController extends Controller
{
    public $products;

    /**
     * InventoryController constructor.
     */
    function __construct() {
        $this->products = Product::all();
    }

    ##########################################
    # Views
    ##########################################
    /**
     * Show Inventory List view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function inventory() {
        return view('inventory', ['items' => DB::select("SELECT latest_inv.*, products.*, locations.descriptor,  locations.account_num, locations.address_line1,
            locations.address_line2, locations.address_line3, locations.address_line4, locations.city, locations.postal_code, 
            locations.state FROM (SELECT * FROM inventory LEFT JOIN 
            (SELECT inv_id, MAX(move_date) AS latest_move FROM Inventory.item_locations
            GROUP BY inv_id) AS moves ON moves.inv_id = inventory.id) AS latest_inv
            LEFT JOIN products ON latest_inv.prod_sku = products.sku
            LEFT JOIN item_locations ON latest_inv.latest_move = item_locations.move_date AND latest_inv.inv_id = item_locations.inv_id
            LEFT JOIN locations ON item_locations.loc_id = locations.id"),
            'locations' => Location::all()
        ]);
    }

    public function add() {
        return view('changeItem', ['products' => $this->products, "purchaseOrder" => PurchaseOrder::all(),
            'edit' => false]);
    }

    /**
     * TODO bulk adding of inventory
     * Add inventory view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bulkAdd() {
        return view('bulkAddItem', ['edit' => false, "purchaseOrder" => PurchaseOrder::all(),
            'products' => $this->products]);
    }

    /**
     * Edit inventory view (similar to add)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        return view('changeItem', ['item' => InventoryItem::find($id), 'locationHistory' =>
                        DB::select("SELECT * FROM item_locations JOIN locations 
                            ON item_locations.loc_id = locations.id WHERE inv_id = '$id'
                            ORDER BY move_date DESC"),
            'products' => $this->products, "purchaseOrder" => PurchaseOrder::all(),
            'edit' => true]);
    }

    ##########################################
    # Database operations
    ##########################################
    /**
     * Create InventoryItems
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function bulkCreate (Request $request) {
        $noError = true;
        if ($request->get('item_id')) {
            foreach ($request->get('item_id') as $id => $v) {
                if ($v) {
                    $item = new InventoryItem();
                    $item->order_id = $request->get('item-order');
                    $item->serial = $request->get('serial')[$id];
                    $item->mac = $request->get('mac')[$id];
                    $item->prod_sku = $request->get('product')[$id];
                    $item->comments = $request->get('item-comments');
                    $item->save();
                    $noError = $noError && $item;
                }
            }
            if ($noError) return redirect("inventory")->with('success', "Items added successfully");
        }
        return redirect("inventory")->with('danger', "Items could not be added");
    }

    /**
     * Create/Update InventoryItem
     * TODO test for duplicates
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUpdate(Request $request) {
        if ($request->get('item-id')) {
            $item = InventoryItem::find($request->get('item-id'));
        } else {
            $item = new InventoryItem();
        }
        $item->order_id = $request->get('item-order');
        $item->serial = $request->get('item-serial');
        $item->mac = $request->get('item-mac');
        $item->prod_sku = $request->get('item-product');
        $item->comments = $request->get('item-comments');
        $item->save();

        if ($item) {
            return redirect("inventory")->with('success', "Item added/updated successfully");
        } else {
            return redirect("inventory")->with('danger', "Item could not be added/updated");
        }
    }

    /**
     * Delete InventoryItem
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id) {
        if (InventoryItem::where('id', $id)->delete()) {
            return redirect("inventory")->with('success', "Item deleted successfully");
        }
        return redirect("inventory")->with('danger', "Item could not be deleted");
    }
}
