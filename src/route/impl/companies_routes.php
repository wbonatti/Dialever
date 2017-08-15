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

$app->get('/companie/save', function ($request, $response, $args) {

    $controller = new CompaniesController($this);
    $return = $controller->saveCompanies("",0,"tete","teste","01.123.1233331");

    return $response->withJson($return);
});

$app->get('/companie/delete/{id}', function ($request, $response, $args) {

    $controller = new CompaniesController($this);
    $return = $controller->deleteCompanies($args['id']);

    return $response->withJson($return);
});