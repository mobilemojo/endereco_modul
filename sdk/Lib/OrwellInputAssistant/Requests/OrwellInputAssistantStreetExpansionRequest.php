<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantStreetExpansionRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string		postcode in which the street prefix should be searched
	 */
	private $postCode = null;
	
	/**
	 * @var string		city in which the street prefix should be searched
	 */
	private $city = null;
	
	/**	
	 * @var string		street prefix to search all streets starting with this prefix 
	 * 					within the specified postcode and city region 
	 */
	private $street = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $city.
     *
     * @see OrwellInputAssistantStreetExpansionRequest::$city
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
     * @see OrwellInputAssistantStreetExpansionRequest::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellInputAssistantStreetExpansionRequest::$postCode
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
     * @see OrwellInputAssistantStreetExpansionRequest::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
    
    /**
     * Returns $street.
     *
     * @see OrwellInputAssistantStreetExpansionRequest::$street
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
     * @see OrwellInputAssistantStreetExpansionRequest::$street
     */
    public function setStreet($street) {
        $this->street = $street;
    }
    }
?>