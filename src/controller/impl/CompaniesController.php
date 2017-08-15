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
            $this->app->logger->info("Controller - buscar empresas");

            $dao = new CompaniesDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new Companies(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getCompaniesById($id){

        try {
            $this->app->logger->info("Controller - buscar empresas por id");

            $dao = new CompaniesDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Companies(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function saveCompanies($id, $code, $name, $real_name, $cnpj){

        try {
            $this->app->logger->info("Controller - salvando empresas");

            $dao = new CompaniesDAO($this->app);

            $result = $dao->save(Companies::createModel([
                'id' => $id,
                'name' => $name,
                'code' => $code,
                'real_name' => $real_name,
                'cnpj' => $cnpj,
            ]));

            return $this->criaArray(new Companies(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function deleteCompanies($id){

        try {
            $this->app->logger->info("Controller - deletando empresas por id");

            $dao = new CompaniesDAO($this->app);

            $result = $dao->delete($id);

            return $this->criaArray(new Companies(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}