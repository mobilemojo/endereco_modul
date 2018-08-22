<?php


class OrwellUniversalAddressCheckResultElement extends OrwellAddressCheckResultElement{
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */
	/**
	 * @var string country	
	 */
	private $country = null;
	
	/*
	 * 
	 * 		GETTERS AND SETTERS
	 * 
	 */
	
    /**
     * Returns $country.
     *
     * @see OrwellUniversalAddressCheckResultElement::$country
     */
    public function getCountry() {
    	if($this->country == null)
			return "";
		else
        	return $this->country;
    }
    
    /**
     * Sets $country.
     *
     * @param object $country
     * @see OrwellUniversalAddressCheckResultElement::$country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
}
?>