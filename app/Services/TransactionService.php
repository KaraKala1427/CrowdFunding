<?php

namespace App\Services;

use App\Repositories\TransactionRepository;
use phpDocumentor\Reflection\Types\Integer;

class TransactionService extends BaseService
{
    protected $repository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->repository = $transactionRepository;
    }

    /**
     * список с пагинацией
     */
    public function indexPaginate($params) : ServiceResult
    {
        $collection = $this->repository->indexPaginate($params);
        return $this->result($collection);
    }

    /**
     * Транзакция
     */

    public function get($id) : ServiceResult
    {
        $model = $this->repository->get($id);

        if(is_null($model)) {
            return $this->errNotFound('Транзакция не найден');
        }
        return $this->result($model);
    }
    /**
     * Сохранить транзакцию
     */
    public function store($data) : ServiceResult
    {
        if($this->repository->existsName($data['name'])) {
            return $this->errValidate("Транзакция с таким именем уже существует");
        }
        $this->repository->store($data);
        return $this->ok('Транзакция сохранен');

    }

    /**
     * Изменить транзакцию
     */
    public function update($id, $data) : ServiceResult
    {
        $model = $this->repository->get($id);
        if(is_null($model)) {
            return $this->errNotFound('Транзакция не найден');
        }
        if($this->repository->existsName($data['name'],$id)) {
            return $this->errValidate("Транзакция с таким именем уже существует");
        }

        $this->repository->update($id,$data);
        return $this->ok('Транзакция обновлен');
    }

    /**
     * Удалить транзакцию
     */
    public function destroy($id)
    {
        $model =  $this->repository->get($id);
        if(is_null($model)) {
            return $this->errNotFound('Транзакция не найден');
        }
        $this->repository->destroy($model);
        return $this->ok('Транзакция удален');
    }

}
