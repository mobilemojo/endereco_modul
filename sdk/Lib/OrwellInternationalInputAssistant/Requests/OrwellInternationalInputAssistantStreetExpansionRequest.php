<?php

/*
 *	Created: 	11.02.2010
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalInputAssistantStreetExpansionRequest extends OrwellInputAssistantStreetExpansionRequest {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
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
     * @see OrwellInternationalInputAssistantStreetExpansionRequest::$country
     */
    public function getCountry() {
        return $this->country;
    }
    
    /**
     * Sets $country.
     *
     * @param object $country
     * @see OrwellInternationalInputAssistantStreetExpansionRequest::$country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
    }
?>