<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeveloperController extends Controller
{
    public function index()
    {
        $pageTitle  = 'All Developers';
        $developers = Developer::with('properties')->orderBy('id', 'desc')->paginate(getPaginate());
        $developersCount = Developer::count();
        return view('admin.users.developers', compact('pageTitle', 'developers', 'developersCount'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name'           => 'required|string',
            'contact_person' => 'required|string',
            'email'          => ['required', 'email', Rule::unique('developers', 'email')->ignore($id)],
            'phone'          => ['required', 'numeric', Rule::unique('developers', 'phone')->ignore($id)],
            'location'       => 'required|string',
        ]);

        if ($id) {
            $developer = Developer::find($id);
            $message   = 'Developer updated successfully';
        } else {
            $developer = new Developer();
            $message   = 'Developer added successfully';
        }
        $developer->name           = $request->name;
        $developer->contact_person = $request->contact_person;
        $developer->email          = $request->email;
        $developer->phone          = $request->phone;
        $developer->location       = $request->location;
        $developer->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $developer = Developer::findOrFail($id);
        $developer->delete();
        $notify[] = ['success', 'Developer deleted successfully'];
        return back()->withNotify($notify);
    }
}
