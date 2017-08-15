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
    protected $fillable = ['id', 'code', 'name', 'real_name', 'cnpj'];

    public function convertArray($array)
    {
        return array(
            'id' => $array['id'],
            'name' => $array['name'],
            'realName' => $array['real_name']
        );
    }

    public static function createModel($array)
    {
        $companies =  new Companies();
        if(!empty($array['id'])){
            $companies = Companies::find($array['id']);
        }
        $companies->code = $array['code'];
        $companies->name = $array['name'];
        $companies->real_name = $array['real_name'];
        $companies->cnpj = $array['cnpj'];

        return $companies;

    }

}