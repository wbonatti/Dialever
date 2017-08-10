<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 02:06
 */
class CustomerController extends GenericController
{

    public function getCustomers(){

        try {
            $this->app->logger->info("Controller - buscar clientes");

            $dao = new CustomerDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new Customer(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getCustomersById($id){

        try {
            $this->app->logger->info("Controller - buscar clientes por id");

            $dao = new CustomerDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Customer(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}