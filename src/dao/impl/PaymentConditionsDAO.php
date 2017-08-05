<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:13
 */
class PaymentConditionsDAO extends GenericDAO
{

    public function getPaymentMethods()
    {
        return $this->app->database->table(PaymentConditions::TABLE)->get();
    }

}