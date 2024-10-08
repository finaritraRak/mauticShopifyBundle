<?php
// plugins/MauticShopifyBundle/Config/config.php

return array(
    'name'        => 'Mautic Shopify integration',
    'description' => 'Shopify integration.',
    'author'      => 'fy',
    'version'     => '1.0.0',

    //route
    'routes'   => array(
        'main' => array(
            'plugin_shopify_integration' => array(
                'path'       => '/hello/{world}',
                'controller' => 'MauticShopifyBundle:Default:world',
                'defaults'    => array(
                    'world' => 'earth'
                ),
                'requirements' => array(
                    'world' => 'earth|mars'
                )
            ),
            'plugin_shopîfy_list'  => array(
                'path'       => '/hello/{page}',
                'controller' => 'MauticShopifyBundle:Default:index'
             ),
            'plugin_shopify_admin' => array(
                'path'       => '/hello/admin',
                'controller' => 'MauticShopifyBundle:Default:admin'
            ),
        ),
        'public' => array(
            'plugin_shopify_goodbye' => array(
                'path'       => '/hello/goodbye',
                'controller' => 'MauticShopifyBundle:Default:goodbye'
            ),
            'plugin_shopify_contact' => array(
                'path'       => '/hello/contact',
                'controller' => 'MauticShopifyBundle:Default:contact'
            )
        ),
        'api' => array(
            'plugin_shopify_api' => array(
                'path'       => '/hello',
                'controller' => 'MauticShopifyBundle:Api:howdy',
                'method'     => 'GET'
            )
        )
    ),

    //menu
    'menu'     => array(
        'main' => array(
            'priority' => 4,
            'items'    => array(
                'plugin.shopify.index' => array(
                    'id'        => 'plugin_shopify_index',
                    'iconClass' => 'fa-globe',
                    'access'    => 'plugin:shopify:worlds:view',
                    'parent'    => 'mautic.core.channels',
                    'children'  => array(
                        'plugin.shopify.manage_worlds'     => array(
                            'route' => 'plugin_shopify_list'
                        ),
                        'mautic.category.menu.index' => array(
                            'bundle' => 'plugin:shopify'
                        )
                    )
                )
            )
        ),
        'admin' => array(
            'plugin.shopify.admin' => array(
                'route'     => 'plugin_shopify_admin',
                'iconClass' => 'fa-gears',
                'access'    => 'admin',
                'checks'    => array(
                    'parameters' => array(
                        'shopify_api_enabled' => true
                    )
                ),
                'priority'  => 60
            )
        )
    ),

    //services
    'services'    => array(
        'events' => array(
            'plugin.shopify.leadbundle.subscriber' => array(
                'class' => 'MauticPlugin\MauticShopifyBundle\EventListener\LeadSubscriber'
            )
        ),
        'forms'  => array(
            'plugin.shopify.form' => array(
                'class' => 'MauticPlugin\MauticShopifyBundle\Form\Type\ShopifyType',
                'alias' => 'shopify'
            )
        ),
        'helpers' => array(
            'mautic.helper.shopify' => array(
                'class'     => 'MauticPlugin\MauticShopifyBundle\Helper\ShopifyHelper',
                'alias'     => 'shopify'
            )
        ),
        'other'   => array(
            'plugin.shopify.mars.validator' => array(
                'class'     => 'MauticPlugin\MauticShopifyBundle\Form\Validator\Constraints\MarsValidator',
                'arguments' => 'mautic.factory',
                'tag'       => 'validator.constraint_validator',
                'alias'     => 'shopify_mars'
            )
        )
    ),

    //category
    'categories' => array(
        'plugin:MauticShopify' => 'mautic.shopify.world.categories'
    ),

    //parameters
    'parameters' => array(
        'shopify_api_enabled' => false
    )
    
);