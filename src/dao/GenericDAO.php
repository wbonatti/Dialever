<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 00:48
 */
use \Illuminate\Database\Eloquent\Model as Model;

class GenericDAO
{
    /**
     * @var app
     */
    protected $app;

    /**
     * @var table
     */
    protected $model;

    /**
     * Conexao constructor.
     * @param Conexao $con
     */
    public function __construct($app, Model $model)
    {
        $this->app = $app;
        $this->model = $model;
    }

    public function getAll(){
        try{
            return $this->model->all();
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getById($id){
        try{
            return $this->model->find($id);
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function save(Model $model){
        try{
            return $model->save();
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id){
        try{
            $result = $this->model->find($id);
            return $result->delete();
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

}