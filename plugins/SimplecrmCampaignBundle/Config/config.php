<?php

/*
 * @copyright   2017 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name'        => 'SimpleCRM Plugin for Campaign Activity Tracking',
    'description' => 'Plugin for Campaign Activity Tracking',
    'version'     => '5.2.0',
    'author'      => 'SimpleCRM',
    'services' => [
        'events' => [
            'simplecrm.campaign.email.subscribe' => [
                'class'     => \MauticPlugin\SimplecrmCampaignBundle\EventListener\CustomCampaignSubscriber::class,
                'arguments' => [
                    //'mautic.email.model.email',
                    'mautic.helper.integration',
                    'mautic.helper.simplecrmcampaign',
                ],
            ],
        ],
        'integrations' => [
            'mautic.integration.simplecrmcampaign' => [
                'class'     => \MauticPlugin\SimplecrmCampaignBundle\Integration\SimplecrmCampaignIntegration::class,
                'arguments' => [
                    'event_dispatcher',
                    'mautic.helper.cache_storage',
                    'doctrine.orm.entity_manager',
                    'session',
                    'request_stack',
                    'router',
                    'translator',
                    'monolog.logger.mautic',
                    'mautic.helper.encryption',
                    'mautic.lead.model.lead',
                    'mautic.lead.model.company',
                    'mautic.helper.paths',
                    'mautic.core.model.notification',
                    'mautic.lead.model.field',
                    'mautic.plugin.model.integration_entity',
                    'mautic.lead.model.dnc',
                    'mautic.user.model.user',
                ],
            ],
        ],
        'helpers' => [
            'mautic.helper.simplecrmcampaign' => [
                'class'     => \MauticPlugin\SimplecrmCampaignBundle\Helper\CampaignHelper::class,
                'arguments' => [
                    //'doctrine.dbal.default_connection',
                    //'mautic.helper.mailer',
                    ]
            ],
        ],
    ],
];
