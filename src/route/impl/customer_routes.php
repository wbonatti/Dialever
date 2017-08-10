<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 04/08/17
 * Time: 02:00
 */

$app->get('/customers', function ($request, $response, $args) {

    $controller = new CustomerController($this);
    $return = $controller->getCustomers();

    return $response->withJson($return);
});

$app->get('/customers/{id}', function ($request, $response, $args) {

    $controller = new CustomerController($this);
    $return = $controller->getCustomersById($args['id']);

    return $response->withJson($return);
});