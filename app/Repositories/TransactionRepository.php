<?php


namespace App\Repositories;


use App\Models\Transaction;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class TransactionRepository
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
            $query = Transaction::select('*');
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

    /**
     * Получить персонажа
     */
    public function get(int $id) : ?Transaction
    {
        return Transaction::find($id);
    }

    public function store($data)
    {
        return Transaction::Create($data);
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
        return !is_null(Transaction::where('name',$name)
            ->when($id, function ($query) use ($id) {
                return $query->where('id','<>',$id);
            })
            ->first());
    }
}
