<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 02:15
 */
interface GenericModel
{

    public function convertArray($array);

    public static function createModel($array);

}