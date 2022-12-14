<?php

namespace Meklad\LaraRepo;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Container\Container as Application;

abstract class LaraRepoBaseRepository
{
    /**
     * Eloquent Model
     *
     * @var Model
     */
    protected $model;

    /**
     * Service Container
     *
     * @var Application
     */
    protected $app;

    /**
     * Construct the base repository.
     *
     * @param Application $app
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model() : string;

    /**
     * Create new model instance
     *
     * @throws \Exception
     * @return Model
     */
    public function makeModel() : Model
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @return Collection
     */
    public function all() : Collection
    {
        return $this->model->get();
    }

    /**
     * Create model record
     *
     * @param Request $request
     * @return Model
     */
    public function create(Request $request) : Model
    {
        $model = $this->model->newInstance($request->toArray());
        $model->save();
        return $model;
    }

    /**
     * Update model record for given id
     *
     * @param Model $request
     * @param Request $request
     * @return Model
     */
    public function update(Model $model, Request $request) : Model
    {
        $model->update($request->all()->toArray());
        return $model;
    }

    /**
     * @param Model $model
     *
     * @throws \Exception
     * @return mixed
     */
    public function delete(Model $model) : mixed
    {
        return $model->delete();
    }

    /**
     * Get count of collection.
     *
     * @return int
     */
    public function count() : int
    {
        return ($this->model->newQuery())->count();
    }
}
