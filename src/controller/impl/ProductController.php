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

            $result = $dao->getProducts();

            return $this->criaArray(new Product(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}