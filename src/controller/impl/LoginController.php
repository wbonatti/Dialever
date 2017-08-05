<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 03/08/17
 * Time: 21:29
 */

Class LoginController extends GenericController{

    public function login($user, $pass){

        try {
            $this->app->logger->info("Controller - efetuar logge in");

            $loginDao = new UserDAO($this->app);

            $usuario = $loginDao->doLogin($user, $pass);

            $_SESSION["user"] = serialize($usuario);

            return $this->criaArrayMensagem("Usuario logado");
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function logout(){

        try {
            $this->app->logger->info("Controller - finalizando sessao ");

            session_destroy();

            return $this->criaArrayMensagem("Usuario deslogado");
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function isLogged(){
        try {
            $this->app->logger->info("Controller - verificando usuario logado");

            $item = $this->isLoggedIn($this->app);

            return $this->criaArrayMensagem($item);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }


    }

}