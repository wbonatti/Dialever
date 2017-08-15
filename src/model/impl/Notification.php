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
    protected $fillable = ['message', 'module', 'user_id', 'active'];

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

    public static function createModel($array)
    {
        $notification =  new Notification();
        if(!empty($array['id'])){
            $notification = Notification::find($array['id']);
        }
        $notification->message = $array['message'];
        $notification->module = $array['module'];
        $notification->user_id = $array['user_id'];
        $notification->active = $array['active'];

        return $notification;

    }

}