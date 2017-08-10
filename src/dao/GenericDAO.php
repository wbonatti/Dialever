<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 00:48
 */
class GenericDAO
{
    /**
     * @var app
     */
    protected $app;

    /**
     * @var table
     */
    protected $table;

    /**
     * Conexao constructor.
     * @param Conexao $con
     */
    public function __construct($app, $table)
    {
        $this->app = $app;
        $this->table = $table;
    }

    public function getAll(){
        return $this->app->database->table($this->table)->get();
    }

    public function getById($id){
        return $this->app->database->table($this->table)->find($id);
    }

}