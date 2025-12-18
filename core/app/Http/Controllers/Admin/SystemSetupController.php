<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class SystemSetupController extends Controller
{
    public function index(){
        $propertyTypes = PropertyType::orderBy('id', 'desc')->get();
        $locations = Location::orderBy('id', 'desc')->get();
        return view('admin.system_setup.index', compact('propertyTypes', 'locations'));
    }
}
