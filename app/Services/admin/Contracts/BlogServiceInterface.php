<?php

namespace App\Services\admin\Contracts;

use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface BlogServiceInterface
{

    /**
     * @return Collection
     *
     */
    public function blogs(): Collection;

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function create(BlogRequest $request, Blog $blog): Response;

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function update(BlogRequest $request, Blog $blog): Response;

    /**
     * @param Blog $blog
     * @return Response
     */
    public function delete(Blog $blog): Response;

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response;

}
