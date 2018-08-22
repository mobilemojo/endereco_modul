<?php
namespace mojo\enderecoAMS;
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'sdk'.DIRECTORY_SEPARATOR.'autoload.php';

class EnderecoController2 extends \OxidEsales\Eshop\Application\Controller\FrontendController
{
    /**
     * @var EnderecoClient
     */
    protected $oClient;

    public function init()
    {

        $config = $this->getConfig();
        $sMandator = $config->getConfigParam("enderecoAMSMandator");
        $sLogin = $config->getConfigParam("enderecoAMSLogin");
        $sPw = $config->getConfigParam("enderecoAMSPassword");

        if(empty($sMandator)) $sMandator = $config->getShopConfVar("enderecoAMSMandator", null, "module:enderecoams203");
        if(empty($sLogin)) $sLogin = $config->getShopConfVar("enderecoAMSLogin", null, "module:enderecoams203");
        if(empty($sPw)) $sPw = $config->getShopConfVar("enderecoAMSPassword", null, "module:enderecoams203");

        $this->oClient = EnderecoClient::getInstance($sMandator, $sLogin, $sPw);
    }

    public function render() {
        $this->oClient->doAccounting();
        exit;
    }
}