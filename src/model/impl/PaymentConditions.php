<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:07
 */
use \Illuminate\Database\Eloquent\Model as Model;

class PaymentConditions extends Model implements GenericModel
{
    const TABLE = "payment_conditions";

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;


    public function convertArray($array)
    {
        return array(
            'id' => $array['id'],
            'discount' => $array['discount'],
            'paymentMethod' => $array['description'],
            'value' => $array['minimun']
        );
    }

}