<?php

namespace App\Services\admin\Contracts;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface LoginServiceInterface
{
    /**
     * @return View|RedirectResponse
     */
    public function login(): View|RedirectResponse;

    public function loginAdmin(LoginRequest $loginRequest): RedirectResponse;

    public function logout(): RedirectResponse;
}
