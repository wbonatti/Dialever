<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:10
 */
use \Illuminate\Database\Eloquent\Model as Model;

class Proposal extends Model implements GenericModel
{
    const TABLE = "proposals";

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function convertArray($array)
    {
        return array(
            'id' => $array['id'],
            'name' => $array['customer_name'],
            'contact' => $array['contact_name'],
            'contactMail' => $array['contact_mail'],
            'paymentConditions' => $array['payment_condition']
        );
    }

}