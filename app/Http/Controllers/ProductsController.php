<?php

namespace Inventory\Http\Controllers;

use Inventory\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    ##########################################
    # Views
    ##########################################
    /**
     * Show Products List view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products() {
        return view('products', ['products' => Product::all()]);
    }

    /**
     * Add products view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add() {
        return view('changeProduct', ['edit' => false]);
    }

    /**
     * Edit products view (similar to add)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        return view('changeProduct', ['product' => Product::find($id), 'edit' => true]);
    }

    ##########################################
    # Database operations
    ##########################################
    /**
     * Create/Update Product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUpdate(Request $request) {
        $prod = Product::firstOrNew(['sku' => $request->get('prod-sku')]);
        $prod->name = $request->get('prod-name');
        $prod->info = $request->get('prod-info');
        $prod->save();
        if ($prod) {
            return redirect("product")->with('success', "Product added/updated successfully");
        } else {
            return redirect("product")->with('danger', "Product could not be added/updated");
        }
    }

    /**
     * Delete Product
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id) {
        if (Product::where('sku', $id)->delete()) {
            return redirect("product")->with('success', "Product deleted successfully");
        } else {
            return redirect("product")->with('danger', "Product could not be deleted");
        }
    }
}
