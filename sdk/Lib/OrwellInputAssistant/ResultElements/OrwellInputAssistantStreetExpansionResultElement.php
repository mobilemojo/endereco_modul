<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */
 
class OrwellInputAssistantStreetExpansionResultElement {
	
	/*
	 * 
	 * 		MEMBER DEFINITIOn
	 * 
	 */
	
	/**
	 * @var string		city in which a street exists that starts with the street prefix
	 * 					given in the request
	 */
	private $city = null;
	
	/**
	 * @var	string		postcode in which a street exists that starts with the street prefix
	 * 					given in the request
	 */
	private $postCode = null;
	
	/**
	 * @var string		street starting with the street prefix given in the request within the postcode/city area specified by city and postcode
	 */
	private $street = null;
	
	/*
	 * 
	 * 		GETTERS AND SETTERS
	 * 
	 */
	

    
    /**
     * Returns $city.
     *
     * @see OrwellInputAssistantStreetExpansionResultElement::$city
     */
    public function getCity() {
    	if($this->city == null)
			return "";
		else
        	return $this->city;
    }
    
    /**
     * Sets $city.
     *
     * @param object $city
     * @see OrwellInputAssistantStreetExpansionResultElement::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellInputAssistantStreetExpansionResultElement::$postCode
     */
    public function getPostCode() {
	   	if($this->postCode == null)
			return "";
		else
	        return $this->postCode;
    }
    
    /**
     * Sets $postCode.
     *
     * @param object $postCode
     * @see OrwellInputAssistantStreetExpansionResultElement::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
    
    /**
     * Returns $street.
     *
     * @see OrwellInputAssistantStreetExpansionResultElement::$street
     */
    public function getStreet() {
    	if($this->street == null)
			return "";
		else
        	return $this->street;
    }
    
    /**
     * Sets $street.
     *
     * @param object $street
     * @see OrwellInputAssistantStreetExpansionResultElement::$street
     */
    public function setStreet($street) {
        $this->street = $street;
    }
}
?>