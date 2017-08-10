<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:48
 */
class CompaniesController extends GenericController
{

    public function getCompanies(){

        try {
            $this->app->logger->info("Controller - buscar produtos");

            $dao = new CompaniesDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new Companies(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getCompaniesById($id){

        try {
            $this->app->logger->info("Controller - buscar produtos por id");

            $dao = new CompaniesDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Companies(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}