<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 17:09
 */
$app->get('/samples', function ($request, $response, $args) {

    $controller = new SampleController($this);
    $return = $controller->getSamples();

    return $response->withJson($return);
});
