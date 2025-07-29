<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\RoomImage;
use App\Repositories\admin\Contracts\BlogRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BlogRepository implements BlogRepositoryInterface
{
    /**
     * @return Collection
     */
    public function blogs(): Collection
    {
        return Blog::all();

    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function create(BlogRequest $request, Blog $blog): Response
    {
        if (isset($request->title_image)) {
            $data = $request->all();
            $title_image = $request->file('title_image');
            $title_image_format = $title_image->getClientOriginalExtension();
            $title_image_name = time() . '.' . $title_image_format;
            $data['title_image'] = $title_image_name;

            if (!Storage::disk('uploads')->exists('blogImages/')) {
                Storage::disk('uploads')->makeDirectory('blogImages/');
            }
            Storage::disk('uploads')->put('blogImages/' . $title_image_name, file_get_contents($title_image));
            $newBlog = $blog->newQuery()->create($data);

            $files = $request->file('other_images');
            $i = 1;
            foreach ($files as $file) {
                $image_format = $file->extension();
                $image_name = time() . '-' . $i . '.' . $image_format;
                $file->move('uploads/blogImages/', $image_name);
                $i++;
                BlogImage::query()->create([
                    'image_name' => $image_name,
                    'blog_id' => $newBlog->id,
                ]);
            }
            $newBlog->last_image = $i;
            $newBlog->save();

            return response([
                'title' => 'Uğurlu',
                'message' => 'Yeni məlumat əlavə edildi!',
                'status' => 'success',
            ]);

        } else {
            return response(['title' => 'Xəta!', 'message' => 'Xahiş edirik, şəkil seçin!', 'status' => 'error']);
        }
    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function update(BlogRequest $request, Blog $blog): Response
    {
        $data = $request->all();
        if (isset($request->title_image)) {
            $title_image = $request->file('title_image');
            $title_image_format = $title_image->getClientOriginalExtension();
            $title_image_name = time() . '.' . $title_image_format;
            $data['title_image'] = $title_image_name;

            Storage::disk('uploads')->delete('blogImages/' . $blog->title_image);

            if (!Storage::disk('uploads')->exists('blogImages/')) {
                Storage::disk('uploads')->makeDirectory('blogImages/');
            }
            Storage::disk('uploads')->put('blogImages/' . $title_image_name, file_get_contents($title_image));
        }
        $blog->update($data);

        if (isset($request->other_images)) {
            $files = $request->file('other_images');
            $i = $blog->last_image;
            foreach ($files as $file) {
                $image_format = $file->extension();
                $image_name = time() . '-' . $i . '.' . $image_format;
                $file->move('uploads/blogImages/', $image_name);
                $i++;
                BlogImage::query()->create([
                    'image_name' => $image_name,
                    'blog_id' => $blog->id,
                ]);
            }
            $blog->last_image = $i;
            $blog->save();
        }

        return response([
            'title' => 'Uğurlu',
            'message' => 'Yeni məlumat əlavə edildi!',
            'status' => 'success',
        ]);

    }

    /**
     * @param Blog $blog
     * @return Response
     */
    public function delete(Blog $blog): Response
    {
        try {
            Storage::disk('uploads')->delete('blogImages/' . $blog->title_image);
            foreach ($blog->blogImages as $bq) {
                Storage::disk('uploads')->delete('blogImages/' . $bq->image_name);
            }
            $blog->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Məlumat silindi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Məlumat silinə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response
    {
        try {
            $blogImage = BlogImage::query()->find($id);
            Storage::disk('uploads')->delete('blogImages/' . $blogImage->image_name);
            $blogImage->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Məlumat silindi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Məlumat silinə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

}
