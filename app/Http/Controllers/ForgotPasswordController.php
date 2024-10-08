<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;
use Str;

class ForgotPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view('user.forget_password');
    }

    // public function sendResetLinkEmail(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email',
    //     ]);
    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );
    //     return $status === Password::RESET_LINK_SENT
    //         ? back()->with(['status' => __($status)])
    //         : back()->withErrors(['email' => __($status)]);
    // }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = app('auth.password.broker')->createToken(
            $user = User::where('email', $request->input('email'))->first()
        );

        $url = url(route('password.reset', [
            'token' => $token, 
            'email' => $request->input('email')
        ], false));

        Mail::send('user.email', ['user' => $user, 'url' => $url], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Reset Password Notification');
        });

        return back()->with(['status' => 'Password reset link sent!']);
    }



    public function showResetForm(Request $request, $token = null)
    {
        return view('user.password_reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                $user->setRememberToken(Str::random(60));

                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
