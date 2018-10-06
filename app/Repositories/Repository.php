<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use DB;

class Repository implements RepositoryInterface
{
    // Model property on class instances
    protected $model;

    // Constructor to bind modelto repo
    public function __construct(Model $model)
    {
        $this->model = $model;
        // DB::enableQueryLog();
    }

    // Get all instances of model
    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    // Get all instances of model with limit
    public function allWithLimit($limit, $start, array $columns = ['*'])
    {
        return $this->model->limit($limit, $start)->get($columns);
    }

    // Get all instances of model with order
    public function allWithOrder(array $columns = ['*'], array $orderBy = [])
    {
        return $this->model->orderBy($orderBy[0], $orderBy[1])->get($columns);
    }

    // Get all instances of model with order and limit
    public function allWithOrderAndLimit($limit, $start, array $columns = ['*'], array $orderBy = [])
    {
        return $this->model->orderBy($orderBy[0], $orderBy[1])->limit($limit, $start)->get($columns);
    }

    // Get all instances of model with order and where
    public function allWithOrderAndWhere(string $search, array $columns = ['*'], array $orderBy = [])
    {
        $query = $this->model->query();
        foreach ($columns as $key => $column) {
            $query = $query->orWhere($column, 'LIKE', "%$search%");
        }
        return $query->orderBy($orderBy[0], $orderBy[1])->get($columns);
    }

    // Create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Update record in database
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }

    // Show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Remove record from database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // Set the associated model
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    // Get the associated model
    public function getModel() : Model
    {
        return $this->model;
    }

    // Eager load database relations
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
