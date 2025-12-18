<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('price', 'asc')->get();
        return view('admin.plan.list', compact('plans'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric|gte:0',
            'description' => 'required|string',
            'duration'    => 'required|numeric|gt:0',
            'features'    => 'required|array|min:1',
            'features.*'  => 'required|string',
            'is_popular'  => 'nullable',
        ]);

        if ($id) {
            $plan    = Plan::find($id);
            $message = 'Plan updated successfully';
        } else {
            $plan    = new Plan();
            $message = 'Plan added successfully';
        }
        $plan->name        = $request->name;
        $plan->description = $request->description;
        $plan->price       = $request->price;
        $plan->duration    = $request->duration;
        $plan->features    = $request->features;
        $plan->is_popular  = $request->is_popular ?? 0;
        $plan->save();

        if ($request->has('is_popular')) {
            Plan::where('id', '!=', $plan->id)->update(['is_popular' => 0]);
        }

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
}
