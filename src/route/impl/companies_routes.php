<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 15:45
 */
$app->get('/companies', function ($request, $response, $args) {

    $controller = new CompaniesController($this);
    $return = $controller->getCompanies();

    return $response->withJson($return);
});

$app->get('/companies/{id}', function ($request, $response, $args) {

    $controller = new CompaniesController($this);
    $return = $controller->getCompaniesById($args['id']);

    return $response->withJson($return);
});