<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::searchable(['title'])->orderBy('id', 'desc')->get();
        return view('admin.property.index', compact('properties'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'title'       => 'required|string',
            'price'       => 'required|numeric|gt:0',
            'bedrooms'    => 'required|numeric|gt:0',
            'bathrooms'   => 'required|numeric|gt:0',
            'agency'      => 'required|string',
            'address'     => 'required|string',
            'latitude'    => 'required|string',
            'longitude'   => 'required|string',
            'description' => 'required|string',
            'images.*'    => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $property = Property::findOrFail($id);
            $message  = 'Property updated successfully';
        } else {
            $property = new Property();
            $message  = 'Property added successfully';
        }

        $property->title       = $request->title;
        $property->price       = $request->price;
        $property->bedrooms    = $request->bedrooms;
        $property->bathrooms   = $request->bathrooms;
        $property->agency      = $request->agency;
        $property->address     = $request->address;
        $property->latitude    = $request->latitude;
        $property->longitude   = $request->longitude;
        $property->description = $request->description;
        $property->save();

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                try {
                    $filename = fileUploader($file, getFilePath('property'), old: $filename);

                } catch (\Exception $exp) {
                    $notify[] = ['errors', 'Image could not be uploaded'];
                    return back()->withNotify($notify);
                }

                $propertyImage              = new PropertyImage();
                $propertyImage->property_id = $property->id;
                $propertyImage->image       = $filename;
                $propertyImage->save();
            }
        }

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
}
