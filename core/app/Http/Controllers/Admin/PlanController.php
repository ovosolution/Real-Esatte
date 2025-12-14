<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('admin.plan.list');
    }

    public function store(Request $request, $id = null)
    {
        $request->validation([
            'name'          => 'required|string',
            'price'         => 'required|numeric|gt:0',
            'monthly_price' => 'required|numeric|gt:0',
            'yearly_price'  => 'required|numeric|gt:0',
            'features'      => 'required|array|min:1',
            'features.*'    => 'required|string',
        ]);

        if ($id) {
            $plan    = Plan::find($id);
            $message = 'Plan updated successfully';
        } else {
            $plan    = new Plan();
            $message = 'Plan added successfully';
        }
        $plan->name          = $request->name;
        $plan->price         = $request->price;
        $plan->monthly_price = $request->monthly_price;
        $plan->yearly_price  = $request->yearly_price;
        $plan->features      = $request->features;
        $plan->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
}
