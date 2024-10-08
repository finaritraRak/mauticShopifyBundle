<?php
// plugins/shopifyBundle/Views/World/index.html.php

// Extend the base content
$view->extend('MauticCoreBundle:Default:content.html.php');

// Get tmpl from sub-template
$tmpl = $view['slots']->get('tmpl', 'Details');

// Tell Mautic to call JS onLoad method
$view['slots']->set('mauticContent', 'shopify'.$tmpl);

// Set the page and header title
$header = ($tmpl == 'World')
    ? $view['translator']->trans(
        'plugin.shopify.worlds',
        array('%world%' => ucfirst($world))
    ) : $view['translator']->trans('plugin.shopify.manage_worlds');
$view['slots']->set('headerTitle', $header);
?>

<div class="shopify-content">
    <?php $view['slots']->output('_content'); ?>
</div>