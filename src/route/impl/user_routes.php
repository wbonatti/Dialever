<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 31/07/17
 * Time: 23:51
 */

$app->get('/login', function ($request, $response, $args) {

    $controller = new LoginController($this);
    $return = $controller->login($request->getParam("user"), $request->getParam("pass"));

    return $response->withJson($return);
});

$app->get('/logout', function ($request, $response, $args) {

    $controller = new LoginController($this);
    $return = $controller->logout();

    return $response->withJson($return);
});

$app->get('/isLogged', function ($request, $response, $args) {

    $controller = new LoginController($this);
    $return = $controller->isLogged();

    return $response->withJson($return);
});

$app->get('/users', function ($request, $response, $args) {

    $controller = new UserController($this);
    $return = $controller->getUsers();

    return $response->withJson($return);
});

$app->get('/users/{id}', function ($request, $response, $args) {

    $controller = new UserController($this);
    $return = $controller->getUsersById($args['id']);

    return $response->withJson($return);
});
