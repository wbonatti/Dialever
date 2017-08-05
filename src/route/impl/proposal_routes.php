<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:13
 */

$app->get('/proposals', function ($request, $response, $args) {

    $controller = new ProposalController($this);
    $return = $controller->getProposals();

    return $response->withJson($return);
});