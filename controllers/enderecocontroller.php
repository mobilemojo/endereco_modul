<?php
namespace mojo\enderecoAMS;
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'sdk'.DIRECTORY_SEPARATOR.'autoload.php';
class EnderecoController extends \OxidEsales\Eshop\Application\Controller\FrontendController
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

        $bShowAllZipCodeCityNameCombinations = $config->getShopConfVar("enderecoAMSShowAllCityNames", null, "module:enderecoams203");

        if(null === $bShowAllZipCodeCityNameCombinations)
            $bShowAllZipCodeCityNameCombinations = true;

        $this->oClient = EnderecoClient::getInstance($sMandator, $sLogin, $sPw);
        define('ORWELL_SHOW_CITIES_WITH_ADDITIONALS_EVEN_IF_ZIP_IS_EQUAL', $bShowAllZipCodeCityNameCombinations);
    }

    public function render() {
        try {
            $sJson = $_POST['orwellServiceData'];
            $aInput = json_decode($sJson, true);

            $result = $this->oClient->executeRequest(OrwellUtility::arrayToRequest($aInput));
            $aResult = OrwellUtility::makeArrayFromResult($result);
            echo json_encode($aResult, JSON_PRETTY_PRINT);
        }
        catch(Exception $e)
        {
            echo $e->getMessage()."\n";
            echo $e->getTraceAsString()."\n";
        }
        exit;
    }
}

