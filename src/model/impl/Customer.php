<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 02:00
 */
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements GenericModel
{
    const TABLE = "customers";

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
            'name' => $array['name'],
            'contact' => $array['contact'],
            'city' => $array['city']
        );
    }

}