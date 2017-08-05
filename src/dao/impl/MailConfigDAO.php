<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 16:26
 */
class MailConfigDAO extends GenericDAO
{

    public function getMailConfigs(){
        return $this->app->database->table(MailConfig::TABLE)->get();
    }

}