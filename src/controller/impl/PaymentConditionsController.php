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

    public function savePaymentCondiction($id, $discount, $code, $description, $minimun){

        try {
            $this->app->logger->info("Controller - salvando formas de pagamento");

            $dao = new PaymentConditionsDAO($this->app);

            $result = $dao->save(PaymentConditions::createModel([
                'id' => $id,
                'code' => $code,
                'description' => $description,
                'discount' => $discount,
                'minimun' => $minimun,
            ]));

            return $this->criaArray(new PaymentConditions(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function deletePaymentCondiction($id){

        try {
            $this->app->logger->info("Controller - deletando formas de pagamento id: " . $id);

            $dao = new PaymentConditionsDAO($this->app);

            $result = $dao->delete($id);

            return $this->criaArray(new PaymentConditions(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}