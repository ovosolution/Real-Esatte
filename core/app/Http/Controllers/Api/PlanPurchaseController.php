<?php

namespace App\Http\Controllers\Api;

use App\Constants\Status;
use App\Http\Controllers\Api\PaymentController as ApiPaymentController;
use App\Http\Controllers\Controller;
use App\Models\GatewayCurrency;
use App\Models\Plan;
use App\Models\PlanPurchase;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanPurchaseController extends Controller
{
    public function plans()
    {
        $plans           = Plan::get();
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('name')->get();

        return apiResponse('plans', 'success', ['Plan list retrieved successfully'], [
            'plans'            => $plans,
            'gateway_currency' => $gatewayCurrency,
            'image_path' => getFilePath('gateway'),
        ]);
    }

    public function planDetails($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return apiResponse('plan_not_found', 'error', ['Plan not found']);
        }
        return apiResponse('plan', 'success', ['Plan details retrieved successfully'], [
            'plan' => $plan,
        ]);
    }

    public function storePurchaseInfo(Request $request)
    {
        $request->validate([
            'plan_id'  => 'required|integer|exists:plans,id',
            'gateway'  => 'required',
            'currency' => 'required',
        ]);

        $plan = Plan::find($request->plan_id);
        if (!$plan) {
            return apiResponse('plan_not_found', 'error', ['Plan not found']);
        }

        $amount = $plan->price;

        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->where('method_code', $request->gateway)->where('currency', $request->currency)->first();

        if (!$gate) {
            return apiResponse('gateway_not_found', 'error', ['Payment gateway not found']);
        }

        if ($gate->min_amount > $amount || $gate->max_amount < $amount) {
            return apiResponse('invalid_amount', 'error', ['Please follow gateway limit']);
        }

        $data     = (new ApiPaymentController())->insertDepositData($gate, $amount, $plan->id);
        $notify[] = 'Plan purchase initiated';
        return apiResponse('plan_purchased', 'success', $notify, [
            'deposit'      => $data,
            'redirect_url' => route('deposit.app.confirm', encrypt($data->id)),
        ]);
    }

    public function confirmPurchase($user, $planId, $amount)
    {
        $plan = Plan::find($planId);

        if (!$plan) {
            return apiResponse('plan_not_found', 'error', ['Plan not found']);
        }

        $user->balance -= $amount;
        $user->save();

        $baseDate = $user->end_date && $user->end_date > now() ? $user->end_date : now();

        $endDate = Carbon::parse($baseDate)->addDays($plan->duration);

        $planPurchase           = new PlanPurchase();
        $planPurchase->user_id  = $user->id;
        $planPurchase->plan_id  = $plan->id;
        $planPurchase->features = $plan->features;
        $planPurchase->price    = $amount;
        $planPurchase->end_date = $endDate;
        $planPurchase->save();

        $userTransaction               = new Transaction();
        $userTransaction->user_id      = $user->id;
        $userTransaction->amount       = $amount;
        $userTransaction->post_balance = $user->balance;
        $userTransaction->trx_type     = '-';
        $userTransaction->details      = 'Plan purchased: ' . $plan->name;
        $userTransaction->remark       = 'plan_purchased';
        $userTransaction->trx          = getTrx();
        $userTransaction->save();

        $user->plan_id       = $plan->id;
        $user->plan_name     = $plan->name;
        $user->plan_features = $plan->features;
        $user->plan_price    = $plan->price;
        $user->start_date    = now();
        $user->end_date      = $endDate;
        $user->save();

        notify($user, 'PLAN_PURCHASED', [
            'plan_name'    => $plan->name,
            'amount'       => showAmount($amount),
            'end_date'     => showDateTime($endDate, 'Y-m-d'),
            'post_balance' => showAmount($user->balance),
        ]);

        return apiResponse('plan_confirmed', 'success', ['Plan purchased successfully']);
    }

}
