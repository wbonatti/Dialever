<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:00
 */
class NotificationDAO extends GenericDAO
{

    public function getNotifications(){
        return $this->app->database->table(Notification::TABLE)->get();
    }

}