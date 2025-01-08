<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\SimplecrmCampaignBundle;

use Doctrine\ORM\EntityManager;
use Mautic\CoreBundle\Factory\MauticFactory;
use Mautic\PluginBundle\Bundle\PluginBundleBase;
use Mautic\PluginBundle\Entity\Plugin;

class SimplecrmCampaignBundle extends PluginBundleBase
{
    // Nothing more required

    /*public function boot()
    {
        parent::boot();

        CampaignHelper::init($this->container->get('mautic.helper.integration'));
    }*/

}
