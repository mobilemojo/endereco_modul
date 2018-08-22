<?php
namespace mojo\enderecoAMS;
class EnderecoModalWidget extends \OxidEsales\Eshop\Application\Component\Widget\WidgetController
{

    /**
     * @var string Widget template
     */
    protected $_sThisTemplate = 'widget/enderecomodalwidget.tpl';

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