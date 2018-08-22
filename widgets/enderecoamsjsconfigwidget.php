<?php
namespace mojo\enderecoAMS;
class EnderecoAMSJSConfigWidget extends \OxidEsales\Eshop\Application\Component\Widget\WidgetController
{

    /**
     * @var string Widget template
     */
    protected $_sThisTemplate = 'widget/enderecoamsjsconfig.tpl';

    /**
     * Getter for protected property.
     *
     * @return string
     */
    public function getThisTemplate()
    {
        return $this->_sThisTemplate;
    }

    /**
     *
     * @return getTheme
     */
    public function getTheme()
    {
        return \OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam('enderecoAMSStyling');
    }

    /**
     *
     * @return logLevel
     */
    public function getLogLevel()
    {
        return \OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam('enderecoAMSLogLevel');
    }

    /**
     *
     * @return bCheckUnchagendAddresses
     */
    public function getCheckUnchangedAddresses()
    {
        return \OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam('enderecoAMSCheck');
    }

    /**
     * @inheritdoc
     *
     * Returns
     *
     * @return string template to render
     */
    public function render()
    {
        parent::render();
        return $this->getThisTemplate();
    }
}
