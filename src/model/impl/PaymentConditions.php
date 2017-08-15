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

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['discount', 'code', 'description', 'minimun'];

    public function convertArray($array)
    {
        return array(
            'id' => $array['id'],
            'discount' => $array['discount'],
            'paymentMethod' => $array['description'],
            'value' => $array['minimun']
        );
    }

    public static function createModel($array)
    {
        $payment =  new PaymentConditions();
        if(!empty($array['id'])){
            $payment = PaymentConditions::find($array['id']);
        }
        $payment->discount = $array['discount'];
        $payment->code = $array['code'];
        $payment->description = $array['description'];
        $payment->minimun = $array['minimun'];

        return $payment;

    }

}