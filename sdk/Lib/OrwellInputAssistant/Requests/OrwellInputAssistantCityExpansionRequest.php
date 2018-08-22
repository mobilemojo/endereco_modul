<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantCityExpansionRequest extends OrwellInputAssistantRequest {

	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string		prefix of a city to search all cities starting with this prefix
	 * 					and to be augmented with the corresponding postcode
	 */
	private $city = null;

	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */	
	 
    /**
     * Returns $city.
     *
     * @see OrwellInputAssistantCityExpansionRequest::$city
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
     * @see OrwellInputAssistantCityExpansionRequest::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    }
?>