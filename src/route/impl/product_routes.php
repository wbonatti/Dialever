<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:16
 */

$app->get('/products', function ($request, $response, $args) {

    $controller = new ProductController($this);
    $return = $controller->getProducts();

    return $response->withJson($return);
});