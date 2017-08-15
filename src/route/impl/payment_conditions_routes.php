<?php
/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 05/08/17
 * Time: 14:06
 */
$app->get('/payments', function ($request, $response, $args) {

    $controller = new PaymentConditionsController($this);
    $return = $controller->getPaymentMethods();

    return $response->withJson($return);
});

$app->get('/payments/{id}', function ($request, $response, $args) {

    $controller = new PaymentConditionsController($this);
    $return = $controller->getPaymentMethodsById($args['id']);

    return $response->withJson($return);
});

$app->get('/payment/save', function ($request, $response, $args) {

    $controller = new PaymentConditionsController($this);
    $return = $controller->savePaymentCondiction("",001,0,"teste",2);

    return $response->withJson($return);
});

$app->get('/payment/delete/{id}', function ($request, $response, $args) {

    $controller = new PaymentConditionsController($this);
    $return = $controller->deletePaymentCondiction($args['id']);

    return $response->withJson($return);
});
