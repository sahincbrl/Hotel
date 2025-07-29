<?php

namespace App\Repositories\admin\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface OrderRepositoryInterface
{
    /**
     * @return Collection
     */
    public function orders(): Collection;

    /**
     * @param Request $request
     * @return Response
     */
    public function apply(Request $request): Response;

}
