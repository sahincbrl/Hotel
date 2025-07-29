<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\RoomRequest;
use App\Models\Room;
use App\Models\RoomImage;
use App\Repositories\admin\Contracts\RoomRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class RoomRepository implements RoomRepositoryInterface
{
    /**
     * @return Collection
     */
    public function rooms(): Collection
    {
        return Room::all();
    }

    public function create(RoomRequest $request, Room $room): Response
    {
        if (isset($request->title_image)) {
            $data = $request->all();
            $title_image = $request->file('title_image');
            $title_image_format = $title_image->getClientOriginalExtension();
            $title_image_name = time() . '.' . $title_image_format;
            $data['title_image'] = $title_image_name;

            if (!Storage::disk('uploads')->exists('roomImages/')) {
                Storage::disk('uploads')->makeDirectory('roomImages/');
            }
            Storage::disk('uploads')->put('roomImages/' . $title_image_name, file_get_contents($title_image));
            $newRoom = $room->newQuery()->create($data);

            $files = $request->file('other_images');
            $i = 1;
            foreach ($files as $file) {
                $image_format = $file->extension();
                $image_name = time() . '-' . $i . '.' . $image_format;
                $file->move('uploads/roomImages/', $image_name);
                $i++;
                RoomImage::query()->create([
                    'image_name' => $image_name,
                    'room_id' => $newRoom->id,
                ]);
            }
            $newRoom->last_image = $i;
            $newRoom->save();

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
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function update(RoomRequest $request, Room $room): Response
    {
        $data = $request->all();
        if (isset($request->title_image)) {
            $title_image = $request->file('title_image');
            $title_image_format = $title_image->getClientOriginalExtension();
            $title_image_name = time() . '.' . $title_image_format;
            $data['title_image'] = $title_image_name;

            Storage::disk('uploads')->delete('roomImages/' . $room->title_image);

            if (!Storage::disk('uploads')->exists('roomImages/')) {
                Storage::disk('uploads')->makeDirectory('roomImages/');
            }
            Storage::disk('uploads')->put('roomImages/' . $title_image_name, file_get_contents($title_image));
        }
        $room->update($data);

        if (isset($request->other_images)) {
            $files = $request->file('other_images');
            $i = $room->last_image;
            foreach ($files as $file) {
                $image_format = $file->extension();
                $image_name = time() . '-' . $i . '.' . $image_format;
                $file->move('uploads/roomImages/', $image_name);
                $i++;
                RoomImage::query()->create([
                    'image_name' => $image_name,
                    'room_id' => $room->id,
                ]);
            }
            $room->last_image = $i;
            $room->save();
        }

        return response([
            'title' => 'Uğurlu',
            'message' => 'Yeni məlumat əlavə edildi!',
            'status' => 'success',
        ]);

    }

    /**
     * @param Room $room
     * @return Response
     */
    public function delete(Room $room): Response
    {
        try {
            Storage::disk('uploads')->delete('roomImages/' . $room->title_image);
            foreach ($room->roomImages as $ri) {
                Storage::disk('uploads')->delete('roomImages/' . $ri->image_name);
            }
            $room->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Məlumat silindi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Məlumat silinə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    public function deleteImage(int $id): Response
    {
        try {
            $roomImage = RoomImage::query()->find($id);
            Storage::disk('uploads')->delete('roomImages/' . $roomImage->image_name);
            $roomImage->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Məlumat silindi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Məlumat silinə bilmədi!' . $e->getMessage(), 'status' => 'error']);
        }
    }
}
