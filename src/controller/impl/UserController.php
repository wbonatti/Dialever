<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:38
 */
class UserController extends GenericController
{

    public function getUsers(){

        try {
            $this->app->logger->info("Controller - buscar usuarios");

            $dao = new UserDAO($this->app);

            $result = $dao->getUsers();

            return $this->criaArray(new User(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}