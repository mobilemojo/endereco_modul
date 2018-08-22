<?php

/*
 *	Created: 	11.02.2010
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalInputAssistantCityExpansionRequest extends OrwellInputAssistantCityExpansionRequest {
	
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
	 * 
	 */
	    
    /**
     * Returns $country.
     *
     * @see OrwellInternationalInputAssistantCityExpansionRequest::$country
     */
    public function getCountry() {
        return $this->country;
    }
    
    /**
     * Sets $country.
     *
     * @param object $country
     * @see OrwellInternationalInputAssistantCityExpansionRequest::$country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
}
?>