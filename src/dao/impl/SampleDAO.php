<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 17:15
 */
class SampleDAO extends GenericDAO
{

    public function getSamples(){
        return $this->app->database->table(Sample::TABLE)
                                   ->leftJoin(Customer::TABLE,Customer::TABLE.".id", "=" ,Sample::TABLE.".customer_id")
                                   ->select(Sample::TABLE.'.*', Customer::TABLE.'.name')->get();
    }

}