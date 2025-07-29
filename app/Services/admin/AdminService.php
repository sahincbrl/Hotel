<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;
use App\Repositories\admin\Contracts\AdminRepositoryInterface;
use App\Services\admin\Contracts\AdminServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminService implements AdminServiceInterface
{
    /**
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(private readonly AdminRepositoryInterface $adminRepository)
    {

    }

    /**
     * @return Collection
     */
    public function admins(): Collection
    {
        return $this->adminRepository->admins();
    }

    /**
     * @param AdminRequest $request
     * @param User $user
     * @return Response
     */
    public function create(AdminRequest $request, User $user): Response
    {
        return $this->adminRepository->create($request, $user);
    }

    /**
     * @param AdminRequest $request
     * @param User $user
     * @return Response
     */
    public function update(AdminRequest $request, User $user): Response
    {
        return $this->adminRepository->update($request, $user);
    }

    /**
     * @param User $user
     * @return Response
     */
    public function delete(User $user): Response
    {
        return $this->adminRepository->delete($user);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginUser(Request $request): RedirectResponse
    {
        return $this->adminRepository->loginUser($request);
    }
}
