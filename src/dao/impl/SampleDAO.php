<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 17:15
 */
class SampleDAO extends GenericDAO
{
    /**
     * DAO constructor.
     */
    public function __construct($app)
    {
        parent::__construct($app, Sample::TABLE);
    }


    public function getSamples(){
        return $this->app->database->table($this->table)
                                   ->leftJoin(Customer::TABLE,Customer::TABLE.".id", "=" ,$this->table.".customer_id")
                                   ->select($this->table.'.*', Customer::TABLE.'.name')->get();
    }

}