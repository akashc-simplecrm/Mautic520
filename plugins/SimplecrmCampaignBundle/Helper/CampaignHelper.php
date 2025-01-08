<?php

/*
* @copyright   2017 Mautic Contributors. All rights reserved
* @author      Mautic
*
* @link        http://mautic.org
*
* @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

namespace MauticPlugin\SimplecrmCampaignBundle\Helper;

use Mautic\PluginBundle\Helper\IntegrationHelper;

class CampaignHelper
{

    /**
    * @var IntegrationHelper
    */
    #private static $integrationHelper;

    /**
    * @param IntegrationHelper $helper
    * @param LoggerInterface   $logger
    */
    /*public static function init(IntegrationHelper $helper)
    {
        self::$integrationHelper = $helper;
    }*/


    /**
    * @param $integration
    *
    * @return AbstractIntegration
    */
    /*public static function getIntegration()
    {
        try {
            return self::$integrationHelper->getIntegrationObject('Campaign');
        } catch (\Exception $e) {
            // do nothing
        }

        return null;
    }*/

    /**
    * @param $integration string
    *
    * @return bool
    */
    /*public static function isAuthorized()
    {
        $myIntegration = self::getIntegration();
        return $myIntegration && $myIntegration->getIntegrationSettings() && $myIntegration->getIntegrationSettings()->getIsPublished();
    }*/

    /**
    * @param $integration string
    *
    * @return bool
    */
    #public function postSentEvent($url, $event, $baseUrl = '')
    public function postSentEvent($event, $settings_key)
    {
        $campaign = $event->getCampaign();
        $details  = $event->getChanges();
      
        $listdata = isset($details['lists']) ? json_encode($details['lists']) : '';

        $url = $settings_key['webhookUrl'];

        $fp = fopen('campaign_data_CRM'.date('Y_m_d').'.log', 'a');
		fwrite($fp, date('Y-m-d H:i:s') . " : Request=>" . json_encode($campaign, JSON_PRETTY_PRINT)."\n");
		fwrite($fp, date('Y-m-d H:i:s') . " : details=>" . json_encode($details, JSON_PRETTY_PRINT)."\n");
		
        // Temp fix for pushing data on builder save
        if (empty($listdata)) {

            if (!empty($url)) {
                $data_string = array(
                    'campaign'=> array(
                    'CampaignID' => (string)$campaign->getId(),
                    'CampaignName' => $campaign->getName(),
                    'status' => $campaign->getIsPublished(),
                    'description' => $campaign->getDescription(),
                    'businessUnit' => $campaign->getBusinessUnit(),
                    'smsBudgetEstimate' => $campaign->getSmsBudgetEstimate(),
                    'campaignStatus' =>$campaign->getCampaignStatus(),
                    'rejectRemark' =>$campaign->getRejectRemark(),
                    'campaignMaker' =>$campaign->getCampaignMaker(),
                    'campaignURL' => $_SERVER['HTTP_HOST']."/s/campaigns/view/".$campaign->getId(),
                    //'details'=> $listdata
                    )
                );
                fwrite($fp, date('Y-m-d H:i:s') . " : Request=>" . json_encode($data_string, JSON_PRETTY_PRINT)."\n");
    
                $data_string = json_encode($data_string);
    
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
                );
    
                $result = curl_exec($ch);
                fwrite($fp, date('Y-m-d H:i:s') . " : Request=>" . json_encode($result, JSON_PRETTY_PRINT)."\n");
                fclose($fp);
            }
        
        }
    }
}
