<?php


class OrwellUniversalAddressCheckRequest extends OrwellAddressCheckRequest {
	/*
	 *  
	 * 		MEMBER DEFINITION
	 * 
	 */
	
	/**
	 * @var string country - only used to distinguish german addresses from others
	 * 						 if value is DE, the address is german and the OrwellAddressCheck will be used
	 */
	private $country = null;
	
	/*
	 * 
	 * 		GETTER AND SETTERS
	 * 
	 */
    
    /**
     * Returns $country.
     *
     * @see OrwellUniversalAddressCheckRequest::$country
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
     * @see OrwellUniversalAddressCheckRequest::$country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
}
?>