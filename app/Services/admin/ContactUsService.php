<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\Contact;
use App\Repositories\admin\Contracts\ContactUsRepositoryInterface;
use App\Services\admin\Contracts\ContactUsServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @return Collection
     */
    public function contact(): Collection
    {
        return $this->contactUsRepository->contact();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return $this->contactUsRepository->findById($id);
    }

    /**
     * @param ContactUsRequest $request
     * @return Response
     */
    public function replyPost(ContactUsRequest $request): Response
    {
        return $this->contactUsRepository->replyPost($request);
    }

    /**
     * @param Contact $contact
     * @return Response
     */
    public function delete(Contact $contact): Response
    {
        return $this->contactUsRepository->delete($contact);
    }
}
