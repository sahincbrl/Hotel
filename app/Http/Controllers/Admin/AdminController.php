<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;
use App\Services\admin\Contracts\AdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminController extends Controller
{
    private const path = 'admin.admins.';

    /**
     * @param AdminServiceInterface $adminService
     */
    public function __construct(private readonly AdminServiceInterface $adminService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $admins = $this->adminService->admins();
        return view(self::path . 'index',
            compact('admins'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view(self::path . 'create');
    }

    /**
     * @param AdminRequest $request
     * @param User $admin
     * @return Response
     */
    public function store(AdminRequest $request, User $admin): Response
    {
        return $this->adminService->create($request, $admin);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param User $admin
     * @return View
     */
    public function edit(User $admin): View
    {
        return view(self::path . 'edit', compact('admin'));
    }

    /**
     * @param AdminRequest $request
     * @param User $admin
     * @return Response
     */
    public function update(AdminRequest $request, User $admin): Response
    {
        return $this->adminService->update($request, $admin);
    }

    /**
     * @param User $admin
     * @return Response
     */
    public function destroy(User $admin): Response
    {
        return $this->adminService->delete($admin);
    }
}
