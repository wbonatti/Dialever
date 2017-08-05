<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:55
 */
class NotificationController extends GenericController
{

    public function getNotifications(){

        try {
            $this->app->logger->info("Controller - buscar notificacao");

            $dao = new NotificationDAO($this->app);

            $result = $dao->getNotifications();

            return $this->criaArray(new Notification(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}