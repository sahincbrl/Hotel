<?php

namespace App\Repositories\frontend;

use App\Http\Requests\frontend\ContactUsRequest;
use App\Models\Contact;
use App\Repositories\frontend\Contracts\ContactUsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ContactUsRepository implements ContactUsRepositoryInterface
{
    /**
     * @param ContactUsRequest $request
     * @param Contact $contact
     * @return Response
     */
    public function create(ContactUsRequest $request, Contact $contact): Response
    {
        try {
            $data = $request->all();
            $contact->newQuery()->create($data);
            return response([
                'title' => 'Uğurlu',
                'message' => 'Tez bir zamanda admin sizin ilə əlaqə saxlayacaq',
                'status' => 'success'
            ]);
        } catch (\Exception $exception) {
            return response([
                'title' => 'Uğursuz',
                'message' => 'Xeta bas verdi! yeniden cehd edin',
                'status' => 'error'
            ]);
        }
    }
}
