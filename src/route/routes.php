<?php
// Routes

require "impl/user_routes.php";
require "impl/customer_routes.php";
require "impl/payment_conditions_routes.php";
require "impl/product_routes.php";
require "impl/notification_routes.php";
require "impl/proposal_routes.php";
require "impl/companies_routes.php";
require "impl/mail_conf_routes.php";


$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Server Called");
    $response->withJson("You called '/' context");
});
