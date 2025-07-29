<?php

namespace App\Services\frontend\Contracts;

use App\Http\Requests\frontend\ContactUsRequest;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface ContactUsServiceInterface
{
    /**
     * @param ContactUsRequest $request
     * @param Contact $contact
     * @return Response
     */
    public function create(ContactUsRequest $request, Contact $contact): Response;
}
