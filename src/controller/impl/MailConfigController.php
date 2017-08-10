<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 16:25
 */
class MailConfigController extends GenericController
{

    public function getMailConfigs(){

        try {
            $this->app->logger->info("Controller - buscar configuracoes de email");

            $dao = new MailConfigDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new MailConfig(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getMailConfigsById($id){

        try {
            $this->app->logger->info("Controller - buscar configuracoes de email por id");

            $dao = new MailConfigDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new MailConfig(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}