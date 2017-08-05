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
