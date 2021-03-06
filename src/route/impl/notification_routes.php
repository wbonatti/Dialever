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

$app->get('/notifications/{id}', function ($request, $response, $args) {

    $controller = new NotificationController($this);
    $return = $controller->getNotificationsById($args['id']);

    return $response->withJson($return);
});

$app->get('/notification/save', function ($request, $response, $args) {

    $controller = new NotificationController($this);
    $return = $controller->saveNotification("","teste te","teste",1,true);

    return $response->withJson($return);
});

$app->get('/notification/delete/{id}', function ($request, $response, $args) {

    $controller = new NotificationController($this);
    $return = $controller->deleteNotification($args['id']);

    return $response->withJson($return);
});