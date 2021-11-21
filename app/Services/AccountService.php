<?php


namespace App\Services;


use App\Repositories\AccountRepository;

class AccountService extends BaseService
{
    protected $repository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->repository = $accountRepository;
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
     * Аккаунт
     */

    public function get($id) : ServiceResult
    {
        $model = $this->repository->get($id);

        if(is_null($model)) {
            return $this->errNotFound('Аккаунт не найден');
        }
        return $this->result($model);
    }
    /**
     * Сохранить аккаунт
     */
    public function store($data) : ServiceResult
    {
        if($this->repository->existsName($data['name'])) {
            return $this->errValidate("Аккаунт с таким именем уже существует");
        }
        $this->repository->store($data);
        return $this->ok('Аккаунт сохранен');

    }

    /**
     * Изменить аккаунт
     */
    public function update($id, $data) : ServiceResult
    {
        $model = $this->repository->get($id);
        if(is_null($model)) {
            return $this->errNotFound('Аккаунт не найден');
        }
        if($this->repository->existsName($data['name'],$id)) {
            return $this->errValidate("Аккаунт с таким именем уже существует");
        }

        $this->repository->update($id,$data);
        return $this->ok('Аккаунт обновлен');
    }

    /**
     * Удалить аккаунт
     */
    public function destroy($id)
    {
        $model =  $this->repository->get($id);
        if(is_null($model)) {
            return $this->errNotFound('Аккаунт не найден');
        }
        $this->repository->destroy($model);
        return $this->ok('Аккаунт удален');
    }

}
