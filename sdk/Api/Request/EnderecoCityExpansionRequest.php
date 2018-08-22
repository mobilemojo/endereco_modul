<?php

class EnderecoCityExpansionRequest extends EnderecoAbstractRequest {

    /**
     * @var string
     */
    private $city;

    public function __construct()
    {
        $this->setService('cityExpansion');
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
     * @return EnderecoCityExpansionRequest
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }


}