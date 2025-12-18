<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::searchable(['name'])->orderBy('id', 'desc')->paginate(getPaginate());
        $locations = Location::orderBy('id', 'desc')->get();
        return view('admin.property.type.index', compact('propertyTypes', 'locations'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => ['required','string',Rule::unique('property_types')->ignore($id)->whereNull('deleted_at')],
        ]);

        if($id){
            $propertyType = PropertyType::find($id);
            $message = 'Property type updated successfully';
        }else{
            $propertyType = new PropertyType();
            $message = 'Property type added successfully';
        }
        $propertyType->name = $request->name;
        $propertyType->status = $request->status ?? 1;
        $propertyType->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $propertyType = PropertyType::findOrFail($id);
        $propertyType->delete();
        $notify[] = ['success', 'Property type deleted successfully'];
        return back()->withNotify($notify);
    }
}
