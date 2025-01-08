<?php


/*
* @copyright   2017 Mautic Contributors. All rights reserved
* @author      Mautic
*
* @link        http://mautic.org
*
* @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
namespace MauticPlugin\SimplecrmCampaignBundle\EventListener;

use Mautic\CampaignBundle\Event as Events;
use Mautic\CampaignBundle\CampaignEvents;
use Mautic\CampaignBundle\Event\CampaignExecutionEvent;
use Mautic\CampaignBundle\Event\CampaignBuilderEvent;
//use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\CoreBundle\Helper\IpLookupHelper;

use Mautic\PluginBundle\Helper\IntegrationHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use MauticPlugin\SimplecrmCampaignBundle\Helper\CampaignHelper;
/**
* Class SegmentSubscriber.
*/
##class CustomCampaignSubscriber extends CommonSubscriber
class CustomCampaignSubscriber implements EventSubscriberInterface
{

  /**
     * @var IntegrationHelper
     */
    private $integrationHelper;

    /**
     * @var campaignHelper
     */
    private $campaignHelper;

    public function __construct(IntegrationHelper $integrationHelper, CampaignHelper $campaignHelper = null)
    {
        $this->integrationHelper = $integrationHelper;
        $this->campaignHelper        = $campaignHelper;
    }

    /**
    * @return array
    */
    public static function getSubscribedEvents()
    {
        return [
			    CampaignEvents::CAMPAIGN_POST_SAVE   => ['onCampaignPostSave', 0],
			   //  CampaignEvents::CAMPAIGN_ON_BUILD          => ['onCampaignBuild', 0],
			            
        ];
    }

    /**
    * @param onLeadListChange $event
    */
  
  public function onCampaignPostSave(Events\CampaignEvent $event) 
	{
    $integrationObject = $this->integrationHelper->getIntegrationObject("SimplecrmCampaign");
    $settings_key = $integrationObject->getKeys();

    if ($integrationObject->getIntegrationSettings()->getIsPublished()) {
      $this->campaignHelper->postSentEvent($event, $settings_key);
    }

    //if(CampaignHelper::isAuthorized()) {

            //$integration = CampaignHelper::getIntegration();

            //$webhookUrl = $integration->getUrl();
            //$baseUrl = $integration->getBaseUrl();
			
           //$this->leadHelper->postSentEvent($webhookUrl, $event, $baseUrl);
       //}
  }
  
  
  public function onCampaignbuild(CampaignBuilderEvent  $event) 
	{
    

    /*if(CampaignHelper::isAuthorized()) {

            $integration = CampaignHelper::getIntegration();

            $webhookUrl = $integration->getUrl();
           $baseUrl = $integration->getBaseUrl();
			
            CampaignHelper::postonCampaignbuild($webhookUrl, $event, $baseUrl);
			
			
        }*/
   
  
  }




   
}
