<?php
//plugins/HelloWorldBundle/Views/World/details.html.php

// Check if the request is Ajax
if (!$app->getRequest()->isXmlHttpRequest()) {

    // Set tmpl for parent template
    $view['slots']->set('tmpl', 'Details');

    // Extend index.html.php as the parent
    $view->extend('MauticShopifyBundle:World:index.html.php');
}
?>

<div>
    <!-- Desired content/markup -->
</div>