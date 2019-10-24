<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Inventory\Location;

class LocationsController extends Controller
{
    ##########################################
    # Views
    ##########################################
    /**
     * TODO use eloquent
     * Show location List view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function locations() {
        return view('locations', ['locations' => Location::all()]);
    }

    /**
     * Add location view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add() {
        return view('changeLocation', ['edit' => false]);
    }

    /**
     * Edit location view (similar to add)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        return view('changeLocation', ['location' => Location::find($id), 'edit' => true]);
    }

    ##########################################
    # Database operations
    ##########################################
    /**
     * Create/Update Location
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createUpdate(Request $request) {
        if ($request->get('item-id')) {
            $location = Location::find($request->get('item-id'));
        } else {
            $location = new Location();
        }
        $location->account_num = $request->get('loc-acc');
        $location->address_line1 = $request->get('loc-adr1');
        $location->city = $request->get('loc-city');
        $location->postal_code = $request->get('loc-post');
        $location->state = $request->get('loc-state');
        $location->comments = $request->get('loc-comments');
        $location->save();

        if ($location) {
            return redirect("location")->with('success', "Item added/updated successfully");
        } else {
            return redirect("location")->with('danger', "Item could not be added/updated");
        }
    }

    /**
     * Delete Location
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id) {
        if (Location::where('id', $id)->delete()) {
            return redirect("location")->with('success', "Item deleted successfully");
        }
        return redirect("location")->with('danger', "Item could not be deleted");
    }
}
