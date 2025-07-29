<?php

namespace App\Repositories\admin\Contracts;

use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface AdminRepositoryInterface
{
    /**
     * @return Collection
     */
    public function admins(): Collection;

    /**
     * @param AdminRequest $request
     * @param User $user
     * @return Response
     */
    public function create(AdminRequest $request, User $user): Response;

    /**
     * @param AdminRequest $request
     * @param User $user
     * @return Response
     */
    public function update(AdminRequest $request, User $user): Response;

    /**
     * @param User $user
     * @return Response
     */
    public function delete(User $user): Response;

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginUser(Request $request): RedirectResponse;
}
