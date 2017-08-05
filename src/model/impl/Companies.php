<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:46
 */
use \Illuminate\Database\Eloquent\Model as Model;

class Companies extends Model implements GenericModel
{
    const TABLE = "companies";

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
            'name' => $array['name'],
            'realName' => $array['real_name']
        );
    }

}