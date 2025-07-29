<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\admin\Contracts\LoginServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    private const path = 'admin.login.';

    /**
     * @param LoginServiceInterface $loginService
     */
    public function __construct(private readonly LoginServiceInterface $loginService)
    {

    }

    /**
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        return $this->loginService->login();
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginAdmin(LoginRequest $request): RedirectResponse
    {
        return $this->loginService->loginAdmin($request);
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        return $this->loginService->logout();
    }
}
