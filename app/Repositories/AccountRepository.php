<?php


namespace App\Repositories;


use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AccountRepository
{
    public function indexPaginate($params, $query = null) : LengthAwarePaginator
    {
        $perPage = $params['per_page'] ?? 4;
        return $this->prepareQuery($params, $query)->paginate($perPage);
    }
    public function index($params): Collection
    {
        return $this->prepareQuery($params)->get();
    }

    private function prepareQuery($params, $query = null)
    {
        if(!$query){
            $query = Account::select('*');
        }
        $query = $this->queryApplyFilter($query,$params);
        $query = $this->queryApplySort($query,$params);
        return $query;
    }
    private function queryApplyFilter($query,$params)
    {
        if(isset($params['name'])){
            $query->where(function ($subQuery) use ($params){
                $subQuery->where('sum','LIKE',"%{$params['sum']}%");
            });
        }
        return $query;
    }

    private function queryApplySort($query,$params){
        if(isset($params['sort']) && isset($params['order'])){
            $query->orderBy($params['sort'],$params['order']);
        }
        elseif (isset($params['sort']) && !isset($params['order'])){
            $query->orderBy($params['sort']);
        }
        return $query;
    }

    public function get(int $id) : ?Account
    {
        return Account::find($id);
    }

    public function store($data)
    {
        return Account::Create($data);
    }

    public function update($id, $data)
    {
        return $this->get($id)->update($data);
    }

    public function destroy($model)
    {
        return $model->delete();
    }

    public function existsName($name, $id = null) : bool
    {
        return !is_null(Account::where('name',$name)
            ->when($id, function ($query) use ($id) {
                return $query->where('id','<>',$id);
            })
            ->first());
    }
}
