<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanPurchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans                 = Plan::orderBy('price', 'asc')->get();
        $planPurchasedUsers    = User::where('plan_id', '!=', 0)->paginate(getPaginate());
        $freeUserPercentage    = User::where('plan_id', '=', 0)->count() * 100 / User::count();
        $weeklyUserPercentage  = User::where('plan_id', '!=', 0)->where('plan_name', 'weekly')->count() * 100 / User::where('plan_id', '!=', 0)->count();
        $monthlyUserPercentage = User::where('plan_id', '!=', 0)->where('plan_name', 'monthly')->count() * 100 / User::where('plan_id', '!=', 0)->count();
        $yearlyUserPercentage  = User::where('plan_id', '!=', 0)->where('plan_name', 'yearly')->count() * 100 / User::where('plan_id', '!=', 0)->count();
        $freeUsers             = User::where('plan_id', 0)->count();
        $weeklyUsers           = User::where('plan_name', 'weekly')->count();
        $monthlyUsers          = User::where('plan_name', 'monthly')->count();
        $yearlyUsers           = User::where('plan_name', 'yearly')->count();
        return view('admin.plan.list', compact('plans', 'planPurchasedUsers', 'freeUserPercentage', 'weeklyUserPercentage', 'monthlyUserPercentage', 'yearlyUserPercentage', 'freeUsers', 'weeklyUsers', 'monthlyUsers', 'yearlyUsers'));
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

    public function userPlanUpdate(Request $request, $id)
    {
        $request->validate([
            'plan_id' => 'required|integer|exists:plans,id',
        ]);

        $user = User::find($id);

        if (!$user) {
            $notify[] = ['error', 'User not found'];
            return back()->withNotify($notify);
        }

        $plan = Plan::find($request->plan_id);

        if (!$plan) {
            $notify[] = ['error', 'Plan not found'];
            return back()->withNotify($notify);
        }

        $baseDate = $user->end_date && $user->end_date > now() ? $user->end_date : now();

        $endDate = Carbon::parse($baseDate)->addDays($plan->duration);

        $planPurchase           = new PlanPurchase();
        $planPurchase->user_id  = $user->id;
        $planPurchase->plan_id  = $plan->id;
        $planPurchase->features = $plan->features;
        $planPurchase->price    = $plan->price;
        $planPurchase->end_date = $endDate;
        $planPurchase->save();

        $user->plan_id       = $plan->id;
        $user->plan_name     = $plan->name;
        $user->plan_features = $plan->features;
        $user->plan_price    = $plan->price;
        $user->start_date    = now();
        $user->end_date      = $endDate;
        $user->save();

        notify($user, 'PLAN_PURCHASED', [
            'plan_name'    => $plan->name,
            'amount'       => showAmount($plan->price),
            'end_date'     => showDateTime($endDate, 'Y-m-d'),
            'post_balance' => showAmount($user->balance),
        ]);

        $notify[] = ['success', 'User plan updated successfully'];
        return back()->withNotify($notify);
    }
}
