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
     * Conexao constructor.
     * @param Conexao $con
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

}