<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:50
 */
class CompaniesDAO extends GenericDAO
{

    public function getCompanies(){
        return $this->app->database->table(Companies::TABLE)->get();
    }

}