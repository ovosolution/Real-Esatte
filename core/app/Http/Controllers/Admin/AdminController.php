<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\Withdrawal;
use App\Traits\AdminOperation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AdminOperation;
    public function dashboard()
    {

        $userQuery     = User::query();
        $depositQuery  = Deposit::query();
        $withdrawQuery = Withdrawal::query();
        $trxQuery      = Transaction::query();

        $widget['total_users']             = (clone $userQuery)->count();
        $widget['active_users']            = (clone $userQuery)->active()->count();
        $widget['email_unverified_users']  = (clone $userQuery)->emailUnverified()->count();
        $widget['mobile_unverified_users'] = (clone $userQuery)->mobileUnverified()->count();

        $widget['total_deposit_amount']         = (clone $depositQuery)->successful()->sum('amount');
        $widget['total_deposit_pending']        = (clone $depositQuery)->pending()->sum('amount');
        $widget['total_deposit_pending_count']  = (clone $depositQuery)->pending()->count();
        $widget['total_deposit_rejected']       = (clone $depositQuery)->rejected()->sum('amount');
        $widget['total_deposit_rejected_count'] = (clone $depositQuery)->rejected()->count();
        $widget['total_deposit_charge']         = (clone $depositQuery)->successful()->sum('charge');

        $widget['total_withdraw_amount']         = (clone $withdrawQuery)->approved()->sum('amount');
        $widget['total_withdraw_pending']        = (clone $withdrawQuery)->pending()->sum('amount');
        $widget['total_withdraw_pending_count']  = (clone $withdrawQuery)->pending()->count();
        $widget['total_withdraw_rejected']       = (clone $withdrawQuery)->rejected()->sum('amount');
        $widget['total_withdraw_rejected_count'] = (clone $withdrawQuery)->rejected()->count();
        $widget['total_withdraw_charge']         = (clone $withdrawQuery)->approved()->sum('charge');

        $widget['total_trx']       = (clone $trxQuery)->count();
        $widget['total_trx_plus']  = (clone $trxQuery)->where('trx_type', "+")->count();
        $widget['total_trx_minus'] = (clone $trxQuery)->where('trx_type', "-")->count();
        $widget['total_trx_count'] = (clone $trxQuery)->count();

        $pageTitle = 'Dashboard';
        $admin     = auth('admin')->user();

        $activeUsers         = User::active()->count();
        $pendingUsers        = User::pending()->count();
        $activeListings      = Property::active()->count();
        $activeSubscriptions = User::subscribed()->count();

        $days = collect(range(6, 0))->map(function ($day) {
            return Carbon::now()->subDays($day)->format('Y-m-d');
        });

        $weeklyProperties = Property::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->pluck('total', 'date');

        $weeklyUsers = User::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->pluck('total', 'date');

        $propertyData = $days->map(fn($day) => $weeklyProperties[$day] ?? 0);
        $userData     = $days->map(fn($day) => $weeklyUsers[$day] ?? 0);

        $weekLabels = $days->map(fn($day) => Carbon::parse($day)->format('D'));

        $locationStats = Property::selectRaw('locations.name as name, COUNT(properties.id) as total')
            ->join('locations', 'locations.id', '=', 'properties.location_id')
            ->groupBy('locations.name')
            ->orderBy('total', 'desc')
            ->get();

        $locationLabels = $locationStats->pluck('name');
        $locationCounts = $locationStats->pluck('total');

        $userLogin = UserLogin::selectRaw('browser, COUNT(*) as total')
            ->groupBy('browser')
            ->orderBy('total', 'desc')
            ->get();

        $pendingUsersReview = User::pending()->orderBy('created_at', 'desc')->take(5)->get();

        $locationDistribution = Property::selectRaw('locations.name as name, COUNT(properties.id) as total')
            ->join('locations', 'locations.id', '=', 'properties.location_id')
            ->groupBy('locations.name')
            ->orderBy('total', 'desc')
            ->get();

        $maxLocationCount = $locationDistribution->max('total');

        $locationDistribution = $locationDistribution->map(function ($item) use ($maxLocationCount) {
            $item->percentage = $maxLocationCount > 0
            ? round(($item->total / $maxLocationCount) * 100)
            : 0;
            return $item;
        });

        return view('admin.dashboard', compact('pageTitle', 'admin', 'widget', 'userLogin', 'activeUsers', 'pendingUsers', 'activeListings', 'locationDistribution', 'activeSubscriptions', 'weekLabels', 'propertyData', 'userData', 'locationLabels', 'locationCounts', 'pendingUsersReview'));
    }

    public function profile()
    {
        $pageTitle = 'My Profile';
        $admin     = auth('admin')->user();
        return view('admin.profile', compact('pageTitle', 'admin'));
    }

    public function password()
    {
        $pageTitle = 'Change Password';
        $admin     = auth('admin')->user();
        return view('admin.password', compact('pageTitle', 'admin'));
    }

    public function depositAndWithdrawReport(Request $request)
    {
        $today             = Carbon::today();
        $timePeriodDetails = $this->timePeriodDetails($today);
        $timePeriod        = (object) $timePeriodDetails[$request->time_period ?? 'daily'];
        $carbonMethod      = $timePeriod->carbon_method;
        $starDate          = $today->copy()->$carbonMethod($timePeriod->take);
        $endDate           = $today->copy();

        $deposits = Deposit::successful()
            ->whereDate('created_at', '>=', $starDate)
            ->whereDate('created_at', '<=', $endDate)
            ->selectRaw('DATE_FORMAT(created_at, "' . $timePeriod->sql_date_format . '") as date,SUM(amount) as amount')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        $withdrawals = Withdrawal::approved()
            ->whereDate('created_at', '>=', $starDate)
            ->whereDate('created_at', '<=', $endDate)
            ->selectRaw('DATE_FORMAT(created_at, "' . $timePeriod->sql_date_format . '") as date,SUM(amount) as amount')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        $data = [];

        for ($i = 0; $i < $timePeriod->take; $i++) {
            $date       = $today->copy()->$carbonMethod($i)->format($timePeriod->php_date_format);
            $deposit    = $deposits->where('date', $date)->first();
            $withdrawal = $withdrawals->where('date', $date)->first();

            $depositAmount    = $deposit ? $deposit->amount : 0;
            $withdrawalAmount = $withdrawal ? $withdrawal->amount : 0;

            $data[$date] = [
                'deposited_amount' => $depositAmount,
                'withdrawn_amount' => $withdrawalAmount,
            ];
        }
        return response()->json($data);
    }

    public function transactionReport(Request $request)
    {

        $today             = Carbon::today();
        $timePeriodDetails = $this->timePeriodDetails($today);

        $timePeriod   = (object) $timePeriodDetails[$request->time_period ?? 'daily'];
        $carbonMethod = $timePeriod->carbon_method;
        $starDate     = $today->copy()->$carbonMethod($timePeriod->take);
        $endDate      = $today->copy();

        $plusTransactions = Transaction::where('trx_type', '+')
            ->whereDate('created_at', '>=', $starDate)
            ->whereDate('created_at', '<=', $endDate)
            ->selectRaw('DATE_FORMAT(created_at, "' . $timePeriod->sql_date_format . '") as date,SUM(amount) as amount')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        $minusTransactions = Transaction::where('trx_type', '-')
            ->whereDate('created_at', '>=', $starDate)
            ->whereDate('created_at', '<=', $endDate)
            ->selectRaw('DATE_FORMAT(created_at, "' . $timePeriod->sql_date_format . '") as date,SUM(amount) as amount')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        $data = [];

        for ($i = 0; $i < $timePeriod->take; $i++) {
            $date             = $today->copy()->$carbonMethod($i)->format($timePeriod->php_date_format);
            $plusTransaction  = $plusTransactions->where('date', $date)->first();
            $minusTransaction = $minusTransactions->where('date', $date)->first();

            $plusAmount  = $plusTransaction ? $plusTransaction->amount : 0;
            $minusAmount = $minusTransaction ? $minusTransaction->amount : 0;

            $data[$date] = [
                'plus_amount'  => $plusAmount,
                'minus_amount' => $minusAmount,
            ];
        }

        return response()->json($data);
    }

    public function notifications()
    {
        $notifications   = AdminNotification::orderBy('id', 'desc')->selectRaw('*,DATE(created_at) as date')->with('user')->paginate(getPaginate());
        $hasUnread       = AdminNotification::where('is_read', Status::NO)->exists();
        $hasNotification = AdminNotification::exists();
        $pageTitle       = 'All Notifications';
        return view('admin.notifications', compact('pageTitle', 'notifications', 'hasUnread', 'hasNotification'));
    }

    public function notificationRead($id)
    {

        $notification          = AdminNotification::findOrFail($id);
        $notification->is_read = Status::YES;
        $notification->save();
        $url = $notification->click_url;
        if ($url == '#') {
            $url = url()->previous();
        }
        return redirect($url);
    }

    public function readAllNotification()
    {
        AdminNotification::where('is_read', Status::NO)->update([
            'is_read' => Status::YES,
        ]);
        $notify[] = ['success', 'Notifications read successfully'];
        return back()->withNotify($notify);
    }

    public function deleteAllNotification()
    {
        AdminNotification::truncate();
        $notify[] = ['success', 'Notifications deleted successfully'];
        return back()->withNotify($notify);
    }

    public function deleteSingleNotification($id)
    {
        AdminNotification::where('id', $id)->delete();
        $notify[] = ['success', 'Notification deleted successfully'];
        return back()->withNotify($notify);
    }

    private function timePeriodDetails($today): array
    {
        if (request()->date) {
            $date                 = explode('to', request()->date);
            $startDateForCustom   = Carbon::parse(trim($date[0]))->format('Y-m-d');
            $endDateDateForCustom = @$date[1] ? Carbon::parse(trim(@$date[1]))->format('Y-m-d') : $startDateForCustom;
        } else {
            $startDateForCustom   = $today->copy()->subDays(15);
            $endDateDateForCustom = $today->copy();
        }

        return [
            'daily'      => [
                'sql_date_format' => "%d %b,%Y",
                'php_date_format' => "d M,Y",
                'take'            => 15,
                'carbon_method'   => 'subDays',
                'start_date'      => $today->copy()->subDays(15),
                'end_date'        => $today->copy(),
            ],
            'monthly'    => [
                'sql_date_format' => "%b,%Y",
                'php_date_format' => "M,Y",
                'take'            => 12,
                'carbon_method'   => 'subMonths',
                'start_date'      => $today->copy()->subMonths(12),
                'end_date'        => $today->copy(),
            ],
            'yearly'     => [
                'sql_date_format' => '%Y',
                'php_date_format' => 'Y',
                'take'            => 12,
                'carbon_method'   => 'subYears',
                'start_date'      => $today->copy()->subYears(12),
                'end_date'        => $today->copy(),
            ],
            'date_range' => [
                'sql_date_format' => "%d %b,%Y",
                'php_date_format' => "d M,Y",
                'take'            => (int) Carbon::parse($startDateForCustom)->diffInDays(Carbon::parse($endDateDateForCustom)),
                'carbon_method'   => 'subDays',
                'start_date'      => $startDateForCustom,
                'end_date'        => $endDateDateForCustom,
            ],
        ];
    }

    public function downloadAttachment($fileHash)
    {
        $filePath  = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $title     = slug(gs('site_name')) . '- attachments.' . $extension;
        try {
            $mimetype = mime_content_type($filePath);
        } catch (\Exception $e) {
            $notify[] = ['error', 'File does not exists'];
            return back()->withNotify($notify);
        }
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function analytics()
    {
        $pageTitle    = 'Analytics';
        $totalRevenue = Deposit::successful()->sum('amount');
        $todayRevenue = Deposit::successful()
            ->whereDate('created_at', today())
            ->sum('amount');

        $yesterdayRevenue = Deposit::successful()
            ->whereDate('created_at', today()->subDay())
            ->sum('amount');

        if ($yesterdayRevenue > 0) {
            $percentageChange = (($todayRevenue - $yesterdayRevenue) / $yesterdayRevenue) * 100;
        } else {
            $percentageChange = 0;
        }

        $totalUsers = User::active()->count();

        $todayUsers = User::active()
            ->whereDate('created_at', today())
            ->count();

        $yesterdayUsers = User::active()
            ->whereDate('created_at', today()->subDay())
            ->count();

        if ($yesterdayUsers > 0) {
            $percentageChangeUser = (($todayUsers - $yesterdayUsers) / $yesterdayUsers) * 100;
        } else {
            $percentageChangeUser = 0;
        }

        $totalListings = Property::active()->count();

        $todayListings = Property::active()
            ->whereDate('created_at', today())
            ->count();

        $yesterdayListings = Property::active()
            ->whereDate('created_at', today()->subDay())
            ->count();

        if ($yesterdayListings > 0) {
            $percentageChangeListing = (($todayListings - $yesterdayListings) / $yesterdayListings) * 100;
        } else {
            $percentageChangeListing = 0;
        }

        $totalSubscriptions = User::subscribed()->count();

        $todaySubscriptions = User::subscribed()
            ->whereDate('start_date', today())
            ->count();

        $yesterdaySubscriptions = User::subscribed()
            ->whereDate('start_date', today()->subDay())
            ->count();

        if ($yesterdaySubscriptions > 0) {
            $percentageChangeSubscription = (($todaySubscriptions - $yesterdaySubscriptions) / $yesterdaySubscriptions) * 100;
        } else {
            $percentageChangeSubscription = 0;
        }

        $months = collect(range(6, 0))->map(function ($i) {
            return now()->subMonths($i)->format('Y-m');
        });

        $monthLabels = $months->map(fn($m) =>
            Carbon::createFromFormat('Y-m', $m)->format('M')
        );

        $listingStats = Property::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('month')
            ->pluck('total', 'month');

        $userStats = User::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('month')
            ->pluck('total', 'month');

        $subscriptionStats = User::subscribed()
            ->selectRaw("DATE_FORMAT(start_date, '%Y-%m') as month, COUNT(*) as total")
            ->where('start_date', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('month')
            ->pluck('total', 'month');

        $listingData      = $months->map(fn($m) => $listingStats[$m] ?? 0);
        $userData         = $months->map(fn($m) => $userStats[$m] ?? 0);
        $subscriptionData = $months->map(fn($m) => $subscriptionStats[$m] ?? 0);

        return view('admin.analytics', compact('pageTitle', 'totalRevenue', 'todayRevenue', 'percentageChange', 'totalUsers', 'totalListings', 'percentageChangeUser', 'percentageChangeListing', 'totalSubscriptions', 'percentageChangeSubscription', 'monthLabels', 'listingData', 'userData', 'subscriptionData'));
    }

    public function activities()
    {
        $pageTitle  = 'Admin Activities';
        $activities = AdminActivity::with('admin')->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.activity_logs', compact('pageTitle', 'activities'));
    }

}
