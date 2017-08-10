<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:18
 */
class ProductController extends GenericController
{

    public function getProducts(){

        try {
            $this->app->logger->info("Controller - buscar produtos");

            $dao = new ProductDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new Product(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getProductsById($id){

        try {
            $this->app->logger->info("Controller - buscar produtos por id");

            $dao = new ProductDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Product(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}