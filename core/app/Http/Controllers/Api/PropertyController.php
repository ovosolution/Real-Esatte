<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\SavedProperty;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::active()->searchable(['title'])->orderBy('id', 'desc')->get();
        return apiResponse("properties", "success", ['active properties'], $properties);
    }

    public function details($id)
    {
        $property = Property::with('images')->find($id);

        return apiResponse("property", "success", ['property details'], [
            'property'  => $property,
            'imagePath' => getFilePath('property'),
        ]);
    }

    public function saveProperty($id)
    {
        $property = Property::with('images')->find($id);
        $user     = auth()->user();
        if (!$property) {
            return apiResponse("property", "error", ['property not found']);
        }

        $saved = SavedProperty::where('property_id', $id)->where('user_id', $user->id)->first();

        if ($saved) {
            $saved->delete();

            return apiResponse("property", "success", ['property removed from saved property']);
        }

        $property              = new SavedProperty();
        $property->user_id     = $user->id;
        $property->property_id = $id;
        $property->save();

        return apiResponse("property", "success", ['Property added to saved list'], [
            'property'  => $property,
            'imagePath' => getFilePath('property'),
        ]);
    }

    public function savedProperties()
    {
        $properties = SavedProperty::with('property')->where('user_id', auth()->user()->id)->paginate();
        return apiResponse("properties", "success", ['saved properties'], [
            'properties' => $properties,
            'imagePath'  => getFilePath('property'),
        ]);
    }
}
