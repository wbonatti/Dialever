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

            $result = $dao->getAll();

            return $this->criaArray(new Notification(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getNotificationsById($id){

        try {
            $this->app->logger->info("Controller - buscar notificacao por id");

            $dao = new NotificationDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Notification(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function saveNotification($id, $message, $module, $user, $active){

        try {
            $this->app->logger->info("Controller - salvando notificacao");

            $dao = new NotificationDAO($this->app);

            $result = $dao->save(Notification::createModel([
                'id' => $id,
                'message' => $message,
                'module' => $module,
                'user_id' => $user,
                'active' => $active,
            ]));

            return $this->criaArray(new Notification(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function deleteNotification($id){

        try {
            $this->app->logger->info("Controller - deletar notificacao");

            $dao = new NotificationDAO($this->app);

            $result = $dao->delete($id);

            return $this->criaArray(new Notification(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}