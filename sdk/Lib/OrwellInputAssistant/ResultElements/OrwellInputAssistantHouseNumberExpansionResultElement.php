<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantHouseNumberExpansionResultElement {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */
	
	/**
	 * @var string	city in which the housenumber is searched
	 */
	private $city = null;
	
	/**
	 * @var string	postcode area in which the housenumber is searched
	 */
	private $postCode = null;
	
	/**
	 * @var string	street in which the housenumber is searched
	 */
	private $street = null;
	
	/**
	 * @var string 	housenumber to be checked for the address described by 
	 * 				postcode, city, street
	 */
	private $houseNumber = null;
	
	/*
	 * 
	 * 		GETTERS AND SETTERS
	 * 
	 */ 
	
    /**
     * Returns $city.
     *
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$city
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
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $houseNumber.
     *
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$houseNumber
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
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$houseNumber
     */
    public function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$postCode
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
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
    
    /**
     * Returns $street.
     *
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$street
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
     * @see OrwellInputAssistantHouseNumberExpansionResultElement::$street
     */
    public function setStreet($street) {
        $this->street = $street;
    }
    }
?>