<?php

class EnderecoStreetExpansionRequest extends EnderecoAbstractRequest {

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */

    private $city;

    /**
     * @var string
     */

    private $street;

    public function __construct()
    {
        $this->setService('streetExpansion');
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
     * @return EnderecoStreetExpansionRequest
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return EnderecoStreetExpansionRequest
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return EnderecoStreetExpansionRequest
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }


}