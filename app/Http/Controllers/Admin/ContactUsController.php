<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\Contact;
use App\Services\admin\Contracts\ContactUsServiceInterface;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    private const path = 'admin.contactUs.';

    public function __construct(private readonly ContactUsServiceInterface $contactUsService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $contacts = $this->contactUsService->contact();
        return view(self::path . 'index',
            compact('contacts'));
    }

    public function edit(Contact $contact): View
    {
        return view(self::path . 'edit', compact('contact'));
    }

    /**
     * @param int $id
     * @return View
     */
    public function reply(int $id): View
    {
        $contact = $this->contactUsService->findById($id);
        return view(self::path . 'reply', compact('contact'));
    }

    /**
     * @param ContactUsRequest $request
     * @return Response
     */
    public function replyPost(ContactUsRequest $request): Response
    {
        return $this->contactUsService->replyPost($request);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        $contact = $this->contactUsService->findById($id);
        return $this->contactUsService->delete($contact);
    }

}
