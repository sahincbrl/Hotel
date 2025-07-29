<?php

namespace App\Repositories\admin\Contracts;

use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

interface ContactUsRepositoryInterface
{
    /**
     * @return Collection
     */
    public function contact(): Collection;

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model;

    /**
     * @param ContactUsRequest $request
     * @return Response
     */
    public function replyPost(ContactUsRequest $request): Response;

    /**
     * @param Contact $contact
     * @return Response
     */
    public function delete(Contact $contact): Response;

}
