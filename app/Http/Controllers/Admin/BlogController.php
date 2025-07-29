<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Services\admin\Contracts\BlogServiceInterface;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BlogController extends Controller
{
    private const path = 'admin.blog.';

    /**
     * @param BlogServiceInterface $blogService
     */
    public function __construct(private readonly BlogServiceInterface $blogService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $blogs= $this->blogService->blogs();
        return view(self::path . 'index', compact('blogs'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view(self::path . 'create');
    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function store(BlogRequest $request, Blog $blog): Response
    {
        return $this->blogService->create($request, $blog);
    }

    /**
     * @param Blog $blog
     * @return View
     */
    public function edit(Blog $blog): View
    {
        return view(self::path . 'edit', compact('blog'));
    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function update(BlogRequest $request, Blog $blog): Response
    {
        return $this->blogService->update($request, $blog);
    }

    /**
     * @param Blog $blog
     * @return Response
     */
    public function destroy(Blog $blog): Response
    {
        return $this->blogService->delete($blog);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response
    {
        return $this->blogService->deleteImage($id);
    }

}
