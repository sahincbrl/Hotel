<?php

namespace App\Services\frontend;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\frontend\ContactUsRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Repositories\admin\Contracts\CategoryRepositoryInterface;
use App\Repositories\frontend\Contracts\ContactUsRepositoryInterface;
use App\Services\frontend\Contracts\ContactUsServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class ContactUsService implements ContactUsServiceInterface
{
    /**
     * @param ContactUsRepositoryInterface $contactUsRepository
     */
    public function __construct(private readonly ContactUsRepositoryInterface $contactUsRepository)
    {

    }

    /**
     * @param ContactUsRequest $request
     * @param Contact $contact
     * @return Response
     */
    public function create(ContactUsRequest $request, Contact $contact): Response
    {
        return $this->contactUsRepository->create($request, $contact);
    }


}
