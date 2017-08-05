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