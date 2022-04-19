<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function reset()
    {
        return view('auth.passwords.resetpassword');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('fail', 'Da say ra loi');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'password successfully updated');
    }
}
