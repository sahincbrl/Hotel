<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\ContactUsRequest;
use App\Models\Contact;
use App\Services\frontend\Contracts\ContactUsServiceInterface;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    private const path = 'frontend.contactUs.';


    public function __construct(private readonly ContactUsServiceInterface $contactUsService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view(self::path . 'index');
    }

    /**
     * @param ContactUsRequest $request
     * @param Contact $contact
     * @return Response
     */
    public function store(ContactUsRequest $request, Contact $contact): Response
    {
        return $this->contactUsService->create($request, $contact);
    }

}
