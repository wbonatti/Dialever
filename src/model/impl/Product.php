<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:18
 */
use \Illuminate\Database\Eloquent\Model as Model;

class Product extends Model implements GenericModel
{
    const TABLE = "products";

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
            'price' => $array['price'],
            'package' => $array['package'],
            'peso' => $array['weight'],
            'description' => $array['description']
        );
    }

}