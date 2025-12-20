<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties    = Property::with('location', 'propertyType', 'images', 'developer')->searchable(['title'])->orderBy('id', 'desc')->paginate(getPaginate());
        $propertyTypes = PropertyType::orderBy('id', 'desc')->get();
        $locations     = Location::orderBy('id', 'desc')->get();
        $developers    = Developer::orderBy('id', 'desc')->get();
        return view('admin.property.index', compact('properties', 'propertyTypes', 'locations', 'developers'));
    }
    public function active()
    {
        $properties    = Property::active()->with('location', 'propertyType', 'images')->searchable(['title'])->orderBy('id', 'desc')->paginate(getPaginate());
        $propertyTypes = PropertyType::orderBy('id', 'desc')->get();
        $locations     = Location::orderBy('id', 'desc')->get();
        $developers    = Developer::orderBy('id', 'desc')->get();
        return view('admin.property.index', compact('properties', 'propertyTypes', 'locations', 'developers'));
    }
    public function inactive()
    {
        $properties    = Property::inactive()->with('location', 'propertyType', 'images')->searchable(['title'])->orderBy('id', 'desc')->paginate(getPaginate());
        $propertyTypes = PropertyType::orderBy('id', 'desc')->get();
        $locations     = Location::orderBy('id', 'desc')->get();
        $developers    = Developer::orderBy('id', 'desc')->get();
        return view('admin.property.index', compact('properties', 'propertyTypes', 'locations', 'developers'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'title'               => 'required|string',
            'property_type_id'    => 'required|exists:property_types,id',
            'location_id'         => 'required|exists:locations,id',
            'developer_id'        => 'required|exists:developers,id',
            'price'               => 'required|numeric|gt:0',
            'bedrooms'            => 'required|numeric|gt:0',
            'bathrooms'           => 'required|numeric|gt:0',
            'address'             => 'required|string',
            'latitude'            => 'required|string',
            'longitude'           => 'required|string',
            'construction_status' => 'required',
            'listing_type'        => 'required',
            'description'         => 'required|string',
            'images'              => 'nullable|array',
            'images.*'            => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $property = Property::findOrFail($id);
            $message  = 'Property updated successfully';
        } else {
            $property = new Property();
            $message  = 'Property added successfully';
        }

        $property->title               = $request->title;
        $property->property_type_id    = $request->property_type_id;
        $property->location_id         = $request->location_id;
        $property->developer_id        = $request->developer_id;
        $property->price               = $request->price;
        $property->bedrooms            = $request->bedrooms;
        $property->bathrooms           = $request->bathrooms;
        $property->address             = $request->address;
        $property->latitude            = $request->latitude;
        $property->longitude           = $request->longitude;
        $property->construction_status = $request->construction_status;
        $property->listing_type        = $request->listing_type;
        $property->description         = $request->description;
        $property->status              = $request->status ?? Status::ENABLE;
        $property->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                try {
                    $filename = fileUploader($file, getFilePath('property'));

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
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        foreach ($property->images as $image) {
            fileManager()->removeFile(getFilePath('property') . '/' . $image->image);
            $image->delete();
        }
        $property->delete();

        $notify[] = ['success', 'Property deleted successfully'];
        return back()->withNotify($notify);
    }
}
