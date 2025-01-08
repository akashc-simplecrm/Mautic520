<?php

/*
 * @copyright   2017 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\SimplecrmCampaignBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class SimplecrmCampaignIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'SimplecrmCampaign';
    }

    /**
     * Return's authentication method such as oauth2, oauth1a, key, etc.
     *
     * @return string
     */
    public function getAuthenticationType()
    {
        // Just use none for now and I'll build in "basic" later
        return 'none';
    }

    /**
     * Return array of key => label elements that will be converted to inputs to
     * obtain from the user.
     *
     * @return array
     */
    public function getRequiredKeyFields()
    {
        return [
            'webhookUrl' => 'mautic.integration.simplecrmcampaign.webhookUrl',

            'mauticBaseUrl' => 'mautic.integration.simplecrmcampaign.mauticBaseUrl',
        ];
    }

}
