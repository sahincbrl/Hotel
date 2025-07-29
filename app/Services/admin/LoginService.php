<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Repositories\admin\Contracts\LoginRepositoryInterface;
use App\Services\admin\Contracts\LoginServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginService implements LoginServiceInterface
{
    /**
     * @param LoginRepositoryInterface $loginRepository
     */
    public function __construct(private readonly LoginRepositoryInterface $loginRepository)
    {

    }

    /**
     * @return View|RedirectResponse
     */
    public function login(): View|RedirectResponse
    {
        return $this->loginRepository->login();
    }

    /**
     * @param LoginRequest $loginRequest
     * @return RedirectResponse
     */
    public function loginAdmin(LoginRequest $loginRequest): RedirectResponse
    {
        return $this->loginRepository->loginAdmin($loginRequest);
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        return $this->loginRepository->logout();
    }
}
