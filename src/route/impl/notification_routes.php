<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:52
 */
$app->get('/notifications', function ($request, $response, $args) {

    $controller = new NotificationController($this);
    $return = $controller->getNotifications();

    return $response->withJson($return);
});