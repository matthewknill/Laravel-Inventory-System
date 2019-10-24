<?php

namespace Inventory\Http\Controllers;

use Inventory\Product;
use Inventory\PurchaseOrder;
use Illuminate\Http\Request;
use Inventory\PurchaseOrderProduct;
use Inventory\Supplier;

class PurchaseOrdersController extends Controller
{
    public $suppliers;
    public $products;

    /**
     * PurchaseOrdersController constructor.
     */
    function __construct() {
        $this->suppliers = Supplier::all();
        $this->products = Product::all();
    }

    ##########################################
    # Views
    ##########################################
    /**
     * Show PurchaseOrders List view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function purchaseOrders() {
        return view('purchaseOrders', ['purchaseOrders' => PurchaseOrder::all()]);
    }

    /**
     * Add purchaseOrders view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add() {
        return view('changePurchaseOrder', ['edit' => false, 'suppliers' => $this->suppliers,
            'products' => $this->products]);
    }

    /**
     * Edit purchaseOrders view (similar to add)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        return view('changePurchaseOrder', ['purchaseOrder' => PurchaseOrder::find($id), 'products' => $this->products,
            'orderProducts' => PurchaseOrderProduct::where('order_id', $id)->get(),
            'edit' => true, 'suppliers' => $this->suppliers]);
    }

    ##########################################
    # Database operations
    ##########################################
    /**
     * Create/Update PurchaseOrder
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUpdate(Request $request) {
        $pur = PurchaseOrder::firstOrNew(['id' => $request->get('pur-id')]);
        $pur->issue_date = $request->get('pur-date');
        $pur->sup_name = $request->get('pur-supplier');
        $pur->comments = $request->get('pur-comments');
        $pur->save();
        if ($pur) {
            // TODO handle duplicates
            PurchaseOrderProduct::where('order_id', $request->get('pur-id'))->delete();
            if ($request->get('product_id')) {
                foreach ($request->get('product_id') as $id => $v) {
                    if ($v) {
                        $prod = new PurchaseOrderProduct();
                        $prod->prod_sku = $request->get('product')[$id];
                        $prod->count = $request->get('count')[$id];
                        try {
                            $pur->products()->save($prod);
                        } catch (\Exception $e) {
                            return redirect("purchaseOrder/edit/".$request->get('pur-id'))->with('danger', "Duplicate product: ".$prod->prod_sku);
                        }
                    }
                }
            }
            return redirect("purchaseOrder")->with('success', "PurchaseOrder added/updated successfully");
        } else {
            return redirect("purchaseOrder")->with('danger', "PurchaseOrder could not be added/updated");
        }
    }

    /**
     * Delete Prdocut
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id) {
        if (PurchaseOrderProduct::where('order_id', $id)->delete()) {
            if (PurchaseOrder::where('id', $id)->delete()) {
                return redirect("purchaseOrder")->with('success', "PurchaseOrder deleted successfully");
            }
        } else if (PurchaseOrder::where('id', $id)->delete()) {
            return redirect("purchaseOrder")->with('success', "PurchaseOrder deleted successfully");
        }
        return redirect("purchaseOrder")->with('danger', "PurchaseOrder could not be deleted");
    }
}
