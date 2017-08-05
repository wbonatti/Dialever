<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:15
 */
class ProposalDAO extends GenericDAO
{

    public function getProposals(){
        return $this->app->database->table(Proposal::TABLE)->get();
    }

}