<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 02:09
 */
class CustomerDAO extends GenericDAO
{

    public function getCustomers()
    {
        return $this->app->database->table(Customer::TABLE)->get();
    }
}