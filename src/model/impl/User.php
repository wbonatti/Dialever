<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 31/07/17
 * Time: 22:13
 */
use Illuminate\Database\Eloquent\Model;

class User extends Model implements GenericModel
{
    const TABLE = 'users';

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
            'login' => $array['login'],
            'name' => $array['name']
        );
    }

}