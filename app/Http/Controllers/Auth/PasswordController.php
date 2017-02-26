<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function resetPassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('password.reset')
                ->withErrors($validator);
        } 

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            return view('auth.passwords.reset', [
                'email' => $request->input('email'),
                'token' => $request->input('_token')
            ]);
        } else {
            flash('User email cannot found');
            return view('auth.passwords.email');
        }
    }

    public function index($email, $token) {
        \Log::info($token);
        return view('auth.passwords.reset', [
            'email' => $email,
            'token' => $token
        ]);
    }

    public function update_password(Request $request){
        \Log::info($request);
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('password.index', [
                        'email' => $request->input('email'),
                        'token' => $request->input('_token')
                    ])
                    ->withErrors($validator);
            }

            $data = User::where('email', $request->email)->first();
            $data->password = bcrypt($request->password);
            $data->update();

            flash('update success');
            return redirect()->route('login');
        } catch (\Exception $e) {
            flash($e->getMessage(), 'warning');

            return redirect()->route('login');
        }
    }
}
