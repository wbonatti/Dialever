<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:24
 */
class ProductDAO extends GenericDAO
{

    public function getProducts(){
        return $this->app->database->table(Product::TABLE)->get();
    }

}