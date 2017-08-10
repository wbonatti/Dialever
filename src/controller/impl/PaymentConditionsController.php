<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:11
 */
class PaymentConditionsController extends GenericController
{

    public function getPaymentMethods(){

        try {
            $this->app->logger->info("Controller - buscar formas de pagamento");

            $dao = new PaymentConditionsDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new PaymentConditions(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getPaymentMethodsById($id){

        try {
            $this->app->logger->info("Controller - buscar formas de pagamento por id");

            $dao = new PaymentConditionsDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new PaymentConditions(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}