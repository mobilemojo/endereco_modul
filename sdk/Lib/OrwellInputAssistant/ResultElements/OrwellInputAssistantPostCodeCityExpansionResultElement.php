<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantPostCodeCityExpansionResultElement {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string	a valid city for a postCode starting with the postcode prefix given
	 * 				in the request
	 */
	private $city = null;
	
	/**
	 * @var string	a postcode starting with the postcode prefix given in the request
	 */
	private $postCode = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $city.
     *
     * @see OrwellInputAssistantPostCodeCityExpansionResultElement::$city
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
     * @see OrwellInputAssistantPostCodeExpansionResultElement::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellInputAssistantPostCodeExpansionResultElement::$postCode
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
     * @see OrwellInputAssistantPostCodeExpansionResultElement::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
    }
?>