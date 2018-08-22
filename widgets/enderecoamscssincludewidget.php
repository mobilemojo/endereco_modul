<?php
namespace mojo\enderecoAMS;
class EnderecoAMSCSSIncludeWidget extends \OxidEsales\Eshop\Application\Component\Widget\WidgetController
{

    /**
     * @var string Widget template
     */
    protected $_sThisTemplate = 'widget/enderecoamscssinputfiles.tpl';

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

    public function insertBootstrapCSS()
    {
        return \OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam('enderecoAMSBootstrapModalCss');
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