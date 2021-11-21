<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionIndexRequest;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function index(TransactionIndexRequest $request)
    {
        $characters = $this->service->indexPaginate($request->validated());
        return $this->resultCollection(TransactionCollection::class,$characters);
    }

    public function show($id)
    {
        $model = $this->service->get($id);
        return $this->resultResource(TransactionResource::class,$model);
    }

    public function store(TransactionRequest $request)
    {
        $model = $this->service->store($request->validated());
        return $this->result($model);
    }

    public function update($id, TransactionRequest $request)
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
