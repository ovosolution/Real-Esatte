<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::searchable(['name'])->orderBy('id', 'desc')->get();
        return view('admin.property_type.index', compact('propertyTypes'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        if($id){
            $propertyType = PropertyType::find($id);
            $message = 'Property type updated successfully';
        }else{
            $propertyType = new PropertyType();
            $message = 'Property type added successfully';
        }
        $propertyType->name = $request->name;
        $propertyType->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
}
