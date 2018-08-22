<?php
/**
 * Created by IntelliJ IDEA.
 * User: mitch
 * Date: 27.11.16
 * Time: 12:39
 */

class EnderecoPostCodeExpansionRequest extends EnderecoAbstractRequest {

    /**
     * @var string
     */
    private $postCode;

    public function __construct()
    {
        $this->setService('postCodeExpansion');
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return EnderecoPostCodeExpansionRequest
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }


}