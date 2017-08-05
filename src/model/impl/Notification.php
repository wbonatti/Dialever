<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:56
 */
use \Illuminate\Database\Eloquent\Model as Model;

class Notification extends Model implements GenericModel
{
    const TABLE = "notifications";

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
            'message' => $array['message'],
            'module' => $array['module'],
            'active' => $array['active'] ,
            'creator' => $array['creator']
        );
    }

}