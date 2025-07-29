<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;
use App\Repositories\admin\Contracts\AdminRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * @return Collection
     */
    public function admins(): Collection
    {
        return User::query()->where('role_id', 1)->get();
    }

    /**
     * @param AdminRequest $request
     * @param User $user
     * @return Response
     */
    public function create(AdminRequest $request, User $user): Response
    {
        if ($request->password == $request->re_password) {
            try {
                $data = $request->all();
                if (isset($request->image)) {
                    $image = $request->file('image');
                    $image_format = $image->getClientOriginalExtension();
                    $image_name = time() . '.' . $image_format;
                    $data['image'] = $image_name;
                    $data['role_id'] = 1;
                    $data['password'] = Hash::make($request->password);

                    if (!Storage::disk('uploads')->exists('adminImages/')) {
                        Storage::disk('uploads')->makeDirectory('adminImages/');
                    }
                    Storage::disk('uploads')->put('adminImages/' . $image_name, file_get_contents($image));

                    $user->newQuery()->create($data);
                    return response([
                        'title' => 'Uğurlu',
                        'message' => 'Yeni məlumat əlavə edildi!',
                        'status' => 'success',
                    ]);

                } else {
                    return response(['title' => 'Xəta!', 'message' => 'Xahiş edirik, şəkil seçin!', 'status' => 'error']);
                }
            } catch (Exception $e) {
                return response(['title' => 'Xəta!', 'message' => 'Yeni məlumat əlavə edilə bilmədi!' . $e->getMessage(), 'status' => 'error']);
            }
        } else {
            return response(['title' => 'Xəta!', 'message' => 'Şifrələr uyuşmur!', 'status' => 'error']);
        }
    }

    /**
     * @param AdminRequest $request
     * @param User $user
     * @return Response
     */
    public function update(AdminRequest $request, User $user): Response
    {
        try {
            $data = $request->all();
            if (isset($request->image)) {
                $image = $request->file('image');
                $image_format = $image->getClientOriginalExtension();
                $image_name = time() . '.' . $image_format;
                $data['image'] = $image_name;
                Storage::disk('uploads')->delete('adminImages/' . $user->image);

                if (!Storage::disk('uploads')->exists('adminImages/')) {
                    Storage::disk('uploads')->makeDirectory('adminImages/');
                }
                Storage::disk('uploads')->put('adminImages/' . $image_name, file_get_contents($image));
            }
            $user->update($data);
            return response([
                'title' => 'Uğurlu',
                'message' => 'Yeni məlumat əlavə edildi!',
                'status' => 'success',
            ]);

        } catch (Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Yeni məlumat əlavə edilə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * @param User $user
     * @return Response
     */
    public function delete(User $user): Response
    {
        try {
            Storage::disk('uploads')->delete('adminImages/' . $user->image);
            $user->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Məlumat silindi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Məlumat silinə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginUser(Request $request): RedirectResponse
    {
        // TODO: Implement loginUser() method.
    }
}
