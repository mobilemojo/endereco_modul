<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantFirstNameCheckRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 * 		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string	firstname to check
	 */
	private $firstName = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $firstName.
     *
     * @see OrwellInputAssistantFirstNameCheckRequest::$firstName
     */
    public function getFirstName() {
    	if($this->firstName == null)
			return "";
		else
        	return $this->firstName;
    }
    
    /**
     * Sets $firstName.
     *
     * @param object $firstName
     * @see OrwellInputAssistantFirstNameCheckRequest::$firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
}
?>