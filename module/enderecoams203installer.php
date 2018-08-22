<?php
/**
 * Created by IntelliJ IDEA.
 * User: bastian
 * Date: 20.03.16
 * Time: 16:31
 */

namespace mojo\enderecoAMS;
class EnderecoAMS203Installer {

    public static function onActivate()
    {
        $sModuleId = 'module:enderecoams203';

        $oConfig = \OxidEsales\Eshop\Core\Registry::getConfig();
        $iFirstActivation = $oConfig->getShopConfVar('enderecoams203FirstInstalled', null, $sModuleId);

        if($iFirstActivation == '1')
        {
            $oTheme = oxNew(\OxidEsales\Eshop\Application\Controller\Admin\ThemeController);
            $sThemeId = strtolower($oTheme->getActiveThemeId());
            $oConfig->saveShopConfVar('str', 'enderecoams203FirstInstalled', '1', null, $sModuleId);

            if(strpos($sThemeId, 'roxid') !== false)
            {
                $oConfig->saveShopConfVar('select', 'enderecoAMSStyling', '1', null, $sModuleId);

            }
            elseif(strpos($sThemeId, 'roxive') !== false)
            {
                $oConfig->saveShopConfVar('select', 'enderecoAMSStyling', '2', null, $sModuleId);
            }
            elseif(strpos($sThemeId, 'azure') !== false)
            {
                $oConfig->saveShopConfVar('str', 'enderecoAMSStyling', '0', null, $sModuleId);
            }
        }
    }

    public static function onDeactivate()
    {

    }
}