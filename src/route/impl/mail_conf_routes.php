<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 16:20
 */
$app->get('/mailConfigs', function ($request, $response, $args) {

    $controller = new MailConfigController($this);
    $return = $controller->getMailConfigs();

    return $response->withJson($return);
});

$app->get('/mailConfigs/{id}', function ($request, $response, $args) {

    $controller = new MailConfigController($this);
    $return = $controller->getMailConfigsById($args['id']);

    return $response->withJson($return);
});

$app->get('/mailConfig/save', function ($request, $response, $args) {

    $controller = new MailConfigController($this);
    $return = $controller->saveMailConfig("","teste","teste@teste.com","testes");

    return $response->withJson($return);
});

$app->get('/mailConfig/delete/{id}', function ($request, $response, $args) {

    $controller = new MailConfigController($this);
    $return = $controller->deleteMailConfig($args['id']);

    return $response->withJson($return);
});