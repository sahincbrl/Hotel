<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Repositories\admin\Contracts\LoginRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LoginRepository implements LoginRepositoryInterface
{
    /**
     * @return View|RedirectResponse
     */
    public function login(): View|RedirectResponse
    {
        if (Auth::check()) {
            return to_route('admin.index');
        } else {
            return view('admin.login.index');
        }
    }

    /**
     * @param LoginRequest $loginRequest
     * @return RedirectResponse
     */
    public function loginAdmin(LoginRequest $loginRequest): RedirectResponse
    {
        $credentials = $loginRequest->only('email', 'password');
        if (auth()->attempt($credentials)) {
            if (Auth::user()->role_id == 1) {
                return to_route('admin.index');
            } else {
                Session::flush();
                Auth::logout();
                return back();
            }
        }
        Session::flash('message', 'E-poçt və ya şifrə yalnışdır!');
        return back();
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return to_route('admin.login');
    }
}
