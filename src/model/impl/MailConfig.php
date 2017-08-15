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
    protected $fillable = ['key_module', 'email', 'name'];

    public function convertArray($array)
    {
        return array(
            'id' => $array['id'],
            'module' => $array['key_module'],
            'email' => $array['email'],
            'name' => $array['name']
        );
    }

    public static function createModel($array)
    {
        $mail =  new MailConfig();
        if(!empty($array['id'])){
            $mail = MailConfig::find($array['id']);
        }
        $mail->key_module = $array['module'];
        $mail->email = $array['email'];
        $mail->name = $array['name'];

        return $mail;

    }
}