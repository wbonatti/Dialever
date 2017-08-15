<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 17:10
 */
use \Illuminate\Database\Eloquent\Model as Model;

class Sample extends Model implements GenericModel
{
    const TABLE = "samples";

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
            'cep' => $array['cep'],
            'companyName' => $array['company_name'],
            'companyContact' => $array['company_contact'],
            'companyCity' => $array['company_city'],
            'customerName' => $array['name'],
        );
    }

}