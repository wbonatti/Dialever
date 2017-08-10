<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:15
 */
class ProposalDAO extends GenericDAO
{
    /**
     * DAO constructor.
     */
    public function __construct($app)
    {
        parent::__construct($app, Proposal::TABLE);
    }

}