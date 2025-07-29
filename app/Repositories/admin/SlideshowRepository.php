<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\SlideshowRequest;
use App\Models\Slideshow;
use App\Models\User;
use App\Repositories\admin\Contracts\SlideshowRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Facades\Storage;

class SlideshowRepository implements SlideshowRepositoryInterface
{
    /**
     * @return Collection
     */
    public function slideshows(): Collection
    {
        return Slideshow::all();
    }

    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function create(SlideshowRequest $request, Slideshow $slideshow): Response
    {
        try {
            $data = $request->all();
            if (isset($request->image)) {
                $image = $request->file('image');
                $image_format = $image->getClientOriginalExtension();
                $image_name = time() . '.' . $image_format;
                $data['image'] = $image_name;

                if (!Storage::disk('uploads')->exists('slideshowImages/')) {
                    Storage::disk('uploads')->makeDirectory('slideshowImages/');
                }
                Storage::disk('uploads')->put('slideshowImages/' . $image_name, file_get_contents($image));

                $slideshow->newQuery()->create($data);
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
    }


    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function update(SlideshowRequest $request, Slideshow $slideshow): Response
    {
        try {
            $data = $request->all();
            if (isset($request->image)) {
                $image = $request->file('image');
                $image_format = $image->getClientOriginalExtension();
                $image_name = time() . '.' . $image_format;
                $data['image'] = $image_name;
                Storage::disk('uploads')->delete('slideshowImages/' . $slideshow->image);

                if (!Storage::disk('uploads')->exists('slideshowImages/')) {
                    Storage::disk('uploads')->makeDirectory('slideshowImages/');
                }
                Storage::disk('uploads')->put('slideshowImages/' . $image_name, file_get_contents($image));
            }
            $slideshow->update($data);
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
     * @param Slideshow $slideshow
     * @return Response
     */

    public function delete(Slideshow $slideshow): Response
    {
        try {
            Storage::disk('uploads')->delete('adminImages/' . $slideshow->image);
            $slideshow->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Məlumat silindi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Məlumat silinə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }
}
