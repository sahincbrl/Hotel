<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Repositories\admin\Contracts\BlogRepositoryInterface;
use App\Services\admin\Contracts\BlogServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class BlogService implements BlogServiceInterface
{
    /**
     * @param BlogRepositoryInterface $blogRepository
     */

    public function __construct(private readonly BlogRepositoryInterface $blogRepository)
    {

    }

    /**
     * @return Collection
     */
    public function blogs(): Collection
    {
        return $this->blogRepository->blogs();
    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function create(BlogRequest $request, Blog $blog): Response
    {
        return $this->blogRepository->create($request, $blog);
    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function update(BlogRequest $request, Blog $blog): Response
    {
        return $this->blogRepository->update($request, $blog);
    }

    /**
     * @param Blog $blog
     * @return Response
     */
    public function delete(Blog $blog): Response
    {
        return $this->blogRepository->delete($blog);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response
    {
        return $this->blogRepository->deleteImage($id);
    }
}
