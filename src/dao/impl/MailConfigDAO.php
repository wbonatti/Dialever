<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 16:26
 */
class MailConfigDAO extends GenericDAO
{
    /**
     * DAO constructor.
     */
    public function __construct($app)
    {
        parent::__construct($app, new MailConfig());
    }

}