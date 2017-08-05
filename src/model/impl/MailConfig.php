<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 16:22
 */
use \Illuminate\Database\Eloquent\Model as Model;

class MailConfig extends Model implements GenericModel
{
    const TABLE = "sys_configs";

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
            'module' => $array['key_module'],
            'email' => $array['email'],
            'name' => $array['name']
        );
    }
}