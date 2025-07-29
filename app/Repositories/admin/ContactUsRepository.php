<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Repositories\admin\Contracts\ContactUsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ContactUsRepository implements ContactUsRepositoryInterface
{
    /**
     * @return Collection
     */
    public function contact(): Collection
    {
        return Contact::all();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return Contact::query()->find($id);
    }

    /**
     * @param ContactUsRequest $request
     * @return Response
     */
    public function replyPost(ContactUsRequest $request): Response
    {
        try {
            Mail::send('email.send_message',
                ['msg' => 'Cavab: ' . $request->answer], function ($message) use ($request) {
                    $message->to($request->email, $request->name)->subject('Cavab');
                    $message->from('aqileli2002@mail.ru', 'Sahin Otel');
                });
            return response(['title' => 'Uğurlu', 'message' => 'Cavab verildi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Xəta baş verdi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * @param Contact $contact
     * @return Response
     */
    public function delete(Contact $contact): Response
    {
        try {
            $contact->delete();
            return response(['title' => 'Uğurlu', 'message' => 'Cavab verildi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Xəta baş verdi!' . $e->getMessage(), 'status' => 'error']);
        }
    }
}
