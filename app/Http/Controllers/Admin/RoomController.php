<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomRequest;
use App\Models\Room;
use App\Services\admin\Contracts\CategoryServiceInterface;
use App\Services\admin\Contracts\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RoomController extends Controller
{
    private const path = 'admin.room.';

    /**
     * @param RoomServiceInterface $roomService
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(private readonly RoomServiceInterface     $roomService,
                                private readonly CategoryServiceInterface $categoryService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $rooms = $this->roomService->rooms();
        return view(self::path . 'index', compact('rooms'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $categories = $this->categoryService->categories();
        return view(self::path . 'create',
            compact('categories'));
    }

    /**
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function store(RoomRequest $request, Room $room): Response
    {
        return $this->roomService->create($request, $room);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param Room $room
     * @return View
     */
    public function edit(Room $room): View
    {
        $categories = $this->categoryService->categories();
        return view(self::path . 'edit',
            compact('room','categories'));
    }

    /**
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function update(RoomRequest $request, Room $room): Response
    {
        return $this->roomService->update($request, $room);
    }

    /**
     * @param Room $room
     * @return Response
     */
    public function destroy(Room $room): Response
    {
        return $this->roomService->delete($room);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response
    {
        return $this->roomService->deleteImage($id);
    }

}
