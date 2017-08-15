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

            $result = $dao->getAll();

            return $this->criaArray(new User(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getUsersById($id){

        try {
            $this->app->logger->info("Controller - buscar usuarios por id");

            $dao = new UserDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new User(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function saveUser($id, $name, $assing, $phone, $login, $email, $code, $pass){

        try {
            $this->app->logger->info("Controller - Salvando usuario");

            $dao = new UserDAO($this->app);

            $user = User::createModel([
                'id' => $id,
                'name' => $name,
                'login' => $login,
                'pass' => hash("sha256",$pass),
                'signature' => $assing,
                'phone' => $phone,
                'email' => $email,
                'code' => $code,
            ]);

            $result = $dao->save($user);

            return $this->criaArray(new User(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function deleteUser($id){

        try {
            $this->app->logger->info("Controller - deletar usuarios");

            $dao = new UserDAO($this->app);

            $result = $dao->delete($id);

            return $this->criaArray(new User(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}