<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::searchable(['name'])->orderBy('id', 'desc')->get();
        return view('admin.location.index', compact('locations'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        if ($id) {
            $location = Location::find($id);
            $message = 'Location updated successfully';
        } else {
            $location = new Location();
            $message = 'Location added successfully';
        }
        $location->name = $request->name;
        $location->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
}
