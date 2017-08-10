<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:24
 */
class ProductDAO extends GenericDAO
{
    /**
     * DAO constructor.
     */
    public function __construct($app)
    {
        parent::__construct($app, Product::TABLE);
    }

}