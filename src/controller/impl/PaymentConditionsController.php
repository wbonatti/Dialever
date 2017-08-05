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

            $result = $dao->getPaymentMethods();

            return $this->criaArray(new PaymentConditions(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}