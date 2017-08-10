<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:12
 */
class ProposalController extends GenericController
{

    public function getProposals(){

        try {
            $this->app->logger->info("Controller - buscar propostas");

            $dao = new ProposalDAO($this->app);

            $result = $dao->getAll();

            return $this->criaArray(new Proposal(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

    public function getProposalsById($id){

        try {
            $this->app->logger->info("Controller - buscar propostas por id");

            $dao = new ProposalDAO($this->app);

            $result = $dao->getById($id);

            return $this->criaArray(new Proposal(),$result);
        }catch (Exception $e){
            return $this->criaArrayErro($e->getMessage());
        }

    }

}