<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 03/08/17
 * Time: 21:51
 */

class UserDAO extends GenericDAO
{

    public function doLogin($user, $pass){
        $records = $this->app->database->table(User::TABLE)->where("login","=",$user)->get();

        if(empty($records)) {
            //Usuario nao encontrado!
            throw new Exception("1");
        }

        $login = null;

        foreach ($records as $record) {
            if($record["crypted_password"] == hash("sha256",$pass)){
                $login = $record;
                break;
            }
        }

        if(empty($login)){
            //Usuario ou senha invalidos!
            throw new Exception("2");
        }

        return $login;

    }

    public function getUsers(){
        return $this->app->database->table(User::TABLE)->get();
    }

}