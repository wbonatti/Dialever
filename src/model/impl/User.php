<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 31/07/17
 * Time: 22:13
 */
use Illuminate\Database\Eloquent\Model as Model;

class User extends Model implements GenericModel
{
    const TABLE = 'users';

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
    protected $fillable = ['id', 'name', 'login', 'crypted_password', 'signature', 'phone', 'email', 'code'];

    public function convertArray($array)
    {
        return array(
            'id' => $array['id'],
            'login' => $array['login'],
            'name' => $array['name']
        );
    }

    public static function createModel($array)
    {
        $user =  new User();
        if(!empty($array['id'])){
            $user = User::find($array['id']);
        }
        $user->name = $array['name'];
        $user->login = $array['login'];
        $user->crypted_password = hash("sha256",$array['pass']);
        $user->signature = $array['assing'];
        $user->phone = $array['phone'];
        $user->email = $array['email'];
        $user->code = $array['code'];

        return $user;

    }

}