<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:13
 */
class PaymentConditionsDAO extends GenericDAO
{
    /**
     * DAO constructor.
     */
    public function __construct($app)
    {
        parent::__construct($app, PaymentConditions::TABLE);
    }

}