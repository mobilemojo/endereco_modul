<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantHouseNumberExpansionRequest extends OrwellInputAssistantRequest{
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string		postcode of the address where the housenumber should be searched
	 */
	private $postCode = null;
	
	/**
	 * @var string		city of the address where the housenumber should be searched
	 */
	private $city = null;
	
	/**
	 * @var string		street of the address where the housenumber should be searched
	 */
	private $street = null;
	
	/**
	 * @var string		housenumber to be validated for the address specified by postCode, 
	 * 					city, and street
	 */
	private $houseNumber = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $city.
     *
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$city
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
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $houseNumber.
     *
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$houseNumber
     */
    public function getHouseNumber() {
    	if($this->houseNumber == null)
			return "";
		else
        	return $this->houseNumber;
    }
    
    /**
     * Sets $houseNumber.
     *
     * @param object $houseNumber
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$houseNumber
     */
    public function setHouseNumber($houseNumber) {
       	$this->houseNumber = $houseNumber;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$postCode
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
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$postCode
     */
    public function setPostCode($postCode) {
       	$this->postCode = $postCode;
    }
    
    /**
     * Returns $street.
     *
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$street
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
     * @see OrwellInputAssistantHouseNumberExpansionRequest::$street
     */
    public function setStreet($street) {
        $this->street = $street;
    }
}
?>