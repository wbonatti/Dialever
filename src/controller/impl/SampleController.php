<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 17:13
 */
class SampleController extends GenericController
{

    public function getSamples(){

        try {
            $this->app->logger->info("Controller - buscar amostras");

            $dao = new SampleDAO($this->app, Sample::TABLE);

            $result = $dao->getSamples();

            return $this->criaArray(new Sample(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getSamplesById($id){

        try {
            $this->app->logger->info("Controller - buscar amostras por id");

            $dao = new SampleDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Sample(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}