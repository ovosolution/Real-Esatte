<?php

namespace App\Http\Controllers\Api;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Lib\GoogleAuthenticator;
use App\Models\DeviceToken;
use App\Models\Form;
use App\Models\NotificationLog;
use App\Models\Property;
use App\Models\Transaction;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function dashboard()
    {
        $properties = Property::with('developer','location', 'propertyType', 'images')->active()->searchable(['title'])->orderBy('id', 'desc')->paginate();

        $savedProperties = auth()->user()->savedProperties()->get();

        $notify[] = 'User Dashboard';
        return apiResponse("dashboard", "success", $notify, [
            'user'       => auth()->user(),
            'properties' => $properties,
            'saved_properties' => $savedProperties,
            'image_path'  => getFilePath('property'),
            'developer_image_path' => getFilePath('adminProfile'),
        ]);
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();

        // if ($user->profile_complete == Status::YES) {
        //     $notify[] = 'You\'ve already completed your profile';
        //     return apiResponse("already_completed", "error", $notify);
        // }

        $countryData  = (array) json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countryCodes = implode(',', array_keys($countryData));
        $mobileCodes  = implode(',', array_column($countryData, 'dial_code'));
        $countries    = implode(',', array_column($countryData, 'country'));

        $validator = Validator::make($request->all(), [
            'country_code' => 'required|in:' . $countryCodes,
            'mobile_code'  => 'required|in:' . $mobileCodes,
            'fullname'     => 'required',
            'image'        => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'mobile'       => ['required', 'regex:/^([0-9]*)$/', Rule::unique('users')->where('dial_code', $request->mobile_code)],
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        if (preg_match("/[^a-z0-9_]/", trim($request->username))) {
            $notify[] = 'No special character, space or capital letters in username';
            return apiResponse("validation_error", "error", $notify);
        }

        $filename = null;

        if ($request->hasFile('image')) {
            try {
                $filename = fileUploader($request->image, getFilePath('userProfile'));
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded'];
                return back()->withNotify($notify);
            }
        }

        $fullname = trim($request->fullname);

        $parts = preg_split('/\s+/', $fullname);

        $user->firstname = $parts[0];
        $user->lastname  = count($parts) > 1
        ? implode(' ', array_slice($parts, 1))
        : null;

        $user->country_code     = $request->country_code;
        $user->mobile           = $request->mobile;
        $user->image            = $filename;
        $user->address          = $request->address;
        $user->city             = $request->city;
        $user->state            = $request->state;
        $user->zip              = $request->zip;
        $user->country_name     = @$request->country;
        $user->dial_code        = $request->mobile_code;
        $user->profile_complete = Status::YES;
        $user->save();

        $notify[] = 'Profile completed successfully';

        return apiResponse("user_profile_completed", "success", $notify, [
            'user'      => $user,
            'imagePath' => getFilePath('userProfile'),
        ]);
    }

    public function companyDataSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'role'    => 'required',
            'address' => 'required',
            'website' => 'required',
            'image'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,gif',
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        $user = auth()->user();

        if ($user->company_complete == Status::YES) {
            $notify[] = 'You\'ve already completed company profile';
            return apiResponse("already_completed", "error", $notify);
        }

        $filename = null;
        if ($request->hasFile('image')) {
            try {
                $filename = fileUploader($request->image, getFilePath('company'));
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded'];
                return back()->withNotify($notify);
            }
        }

        $user->company_name     = $request->name;
        $user->company_role     = $request->role;
        $user->company_address  = $request->address;
        $user->company_website  = $request->website;
        $user->company_image    = $filename;
        $user->company_complete = Status::YES;
        $user->save();

        $notify[] = 'Company Profile completed successfully';

        return apiResponse("company_profile_completed", "success", $notify, [
            'user'      => $user,
            'imagePath' => getFilePath('company'),
        ]);

    }

    public function idVerificationDataSubmit(Request $request)
    {
        $user = auth()->user();

        if ($user->id_verification_complete == Status::YES) {
            $notify[] = 'You\'ve already completed ID verification';
            return apiResponse("already_completed", "error", $notify);
        }

        $validator = Validator::make($request->all(), [
            'verification_type' => 'required|in: 1,2,3',
            'image'             => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,gif',
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        if ($request->hasFile('image')) {
            try {
                $filename = fileUploader($request->image, getFilePath('idVerification'));
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded'];
                return back()->withNotify($notify);
            }
        }

        $user->id_verification_type     = $request->verification_type;
        $user->id_verification_image    = $filename;
        $user->id_verification_complete = Status::YES;
        $user->save();

        $notify[] = 'ID verification completed successfully';

        return apiResponse("profile_completed", "success", $notify, [
            'user'      => $user,
            'imagePath' => getFilePath('idVerification'),
        ]);

    }

    public function kycForm()
    {
        if (auth()->user()->kv == Status::KYC_PENDING) {
            $notify[] = 'Your KYC is under review';
            return apiResponse("under_review", "error", $notify);
        }
        if (auth()->user()->kv == Status::KYC_VERIFIED) {
            $notify[] = 'You are already KYC verified';
            return apiResponse("already_verified", "error", $notify);
        }

        $form     = Form::where('act', 'kyc')->first();
        $notify[] = 'KYC field is below';
        return apiResponse("kyc_form", "success", $notify, [
            'form' => $form->form_data,
        ]);
    }

    public function kycSubmit(Request $request)
    {
        $form = Form::where('act', 'kyc')->first();
        if (!$form) {
            $notify[] = 'Invalid KYC request';
            return apiResponse("invalid_request", "error", $notify);
        }

        $formData       = $form->form_data;
        $formProcessor  = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);

        $validator = Validator::make($request->all(), $validationRule);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }
        $user = auth()->user();
        foreach (@$user->kyc_data ?? [] as $kycData) {
            if ($kycData->type == 'file') {
                fileManager()->removeFile(getFilePath('verify') . '/' . $kycData->value);
            }
        }
        $userData = $formProcessor->processFormData($request, $formData);

        $user->kyc_data             = $userData;
        $user->kyc_rejection_reason = null;
        $user->kv                   = Status::KYC_PENDING;
        $user->save();

        $notify[] = 'KYC data submitted successfully';
        return apiResponse("kyc_submitted", "success", $notify);
    }

    public function depositHistory(Request $request)
    {
        $deposits = auth()->user()->deposits();
        if ($request->search) {
            $deposits = $deposits->where('trx', $request->search);
        }
        $deposits = $deposits->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        $notify[] = 'Deposit data';

        return apiResponse("deposits", "success", $notify, [
            'deposits' => $deposits,
        ]);
    }

    public function transactions(Request $request)
    {
        $remarks      = Transaction::distinct('remark')->get('remark');
        $transactions = Transaction::where('user_id', auth()->id());

        if ($request->search) {
            $transactions = $transactions->where('trx', $request->search);
        }

        if ($request->type) {
            $type         = $request->type == 'plus' ? '+' : '-';
            $transactions = $transactions->where('trx_type', $type);
        }

        if ($request->remark) {
            $transactions = $transactions->where('remark', $request->remark);
        }

        $transactions = $transactions->orderBy('id', 'desc')->paginate(getPaginate());
        $notify[]     = 'Transactions data';

        return apiResponse("transactions", "success", $notify, [
            'transactions' => $transactions,
            'remarks'      => $remarks,
        ]);
    }

    public function submitProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname'  => 'required',
        ], [
            'firstname.required' => 'The first name field is required',
            'lastname.required'  => 'The last name field is required',
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        $user            = auth()->user();
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->address   = $request->address;
        $user->city      = $request->city;
        $user->state     = $request->state;
        $user->zip       = $request->zip;
        $user->save();
        $notify[] = 'Profile updated successfully';

        return apiResponse("profile_updated", "success", $notify);
    }

    public function submitPassword(Request $request)
    {
        $passwordValidation = Password::min(6);
        if (gs('secure_password')) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password'         => ['required', 'confirmed', $passwordValidation],
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $password       = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = 'Password changed successfully';
            return apiResponse("password_changed", "success", $notify);
        } else {
            $notify[] = 'The password doesn\'t match!';
            return apiResponse("not_match", "validation_error", $notify);
        }
    }

    public function addDeviceToken(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        $deviceToken = DeviceToken::where('token', $request->token)->first();

        if ($deviceToken) {
            $notify[] = 'Token already exists';
            return apiResponse("token_exists", "error", $notify);
        }

        $deviceToken          = new DeviceToken();
        $deviceToken->user_id = auth()->user()->id;
        $deviceToken->token   = $request->token;
        $deviceToken->is_app  = Status::YES;
        $deviceToken->save();

        $notify[] = 'Token saved successfully';
        return apiResponse("token_saved", "success", $notify);
    }

    public function show2faForm()
    {
        $ga        = new GoogleAuthenticator();
        $user      = auth()->user();
        $secret    = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . gs('site_name'), $secret);
        $notify[]  = '2FA Qr';

        return apiResponse("2fa_qr", "success", $notify, [
            'secret'      => $secret,
            'qr_code_url' => $qrCodeUrl,
        ]);
    }

    public function create2fa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'secret' => 'required',
            'code'   => 'required',
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        $user     = auth()->user();
        $response = verifyG2fa($user, $request->code, $request->secret);
        if ($response) {
            $user->tsc = $request->secret;
            $user->ts  = Status::ENABLE;
            $user->save();

            $notify[] = 'Google authenticator activated successfully';
            return apiResponse("2fa_qr", "success", $notify);
        } else {
            $notify[] = 'Wrong verification code';
            return apiResponse("wrong_verification", "error", $notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return apiResponse("validation_error", "error", $validator->errors()->all());
        }

        $user     = auth()->user();
        $response = verifyG2fa($user, $request->code);
        if ($response) {
            $user->tsc = null;
            $user->ts  = Status::DISABLE;
            $user->save();
            $notify[] = 'Two factor authenticator deactivated successfully';

            return apiResponse("2fa_qr", "success", $notify);
        } else {
            $notify[] = 'Wrong verification code';
            return apiResponse("wrong_verification", "error", $notify);
        }
    }

    public function pushNotifications()
    {
        $notifications = NotificationLog::where('user_id', auth()->id())->where('sender', 'firebase')->orderBy('id', 'desc')->paginate(getPaginate());
        $notify[]      = 'Push notifications';
        return apiResponse("notifications", "success", $notify, [
            'notifications' => $notifications,
        ]);
    }

    public function pushNotificationsRead($id)
    {
        $notification = NotificationLog::where('user_id', auth()->id())->where('sender', 'firebase')->find($id);
        if (!$notification) {
            $notify[] = 'Notification not found';
            return apiResponse("notification_not_found", "error", $notify);
        }
        $notify[]                = 'Notification marked as read successfully';
        $notification->user_read = 1;
        $notification->save();

        return apiResponse("notification_read", "success", $notify);
    }

    public function userInfo()
    {
        $notify[] = 'User information';
        return apiResponse("user_info", "success", $notify, [
            'user' => auth()->user(),
        ]);
    }

    public function deleteAccount()
    {
        $user              = auth()->user();
        $user->username    = 'deleted_' . $user->username;
        $user->email       = 'deleted_' . $user->email;
        $user->provider_id = 'deleted_' . $user->provider_id;
        $user->save();

        $user->tokens()->delete();

        $notify[] = 'Account deleted successfully';
        return apiResponse("account_deleted", "success", $notify);
    }
}
