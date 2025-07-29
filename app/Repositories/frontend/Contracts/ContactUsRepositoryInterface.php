<?php

namespace App\Repositories\frontend\Contracts;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\frontend\ContactUsRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface ContactUsRepositoryInterface
{
    /**
     * @param ContactUsRequest $request
     * @param Contact $contact
     * @return Response
     */
    public function create(ContactUsRequest $request, Contact $contact): Response;
}
