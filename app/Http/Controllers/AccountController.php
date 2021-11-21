<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountIndexRequest;
use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountCollection;
use App\Http\Resources\AccountResource;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $service;

    public function __construct(AccountService $service)
    {
        $this->service = $service;
    }

    public function index(AccountIndexRequest $request)
    {
        $characters = $this->service->indexPaginate($request->validated());
        return $this->resultCollection(AccountCollection::class,$characters);
    }

    public function show($id)
    {
        $model = $this->service->get($id);
        return $this->resultResource(AccountResource::class,$model);
    }

    public function store(AccountRequest $request)
    {
        $model = $this->service->store($request->validated());
        return $this->result($model);
    }

    public function update($id, AccountRequest $request)
    {
        $model = $this->service->update($id, $request->validated());
        return $this->result($model);
    }

    public function destroy($id)
    {
        $model =  $this->service->destroy($id);
        return $this->result($model);
    }
}
