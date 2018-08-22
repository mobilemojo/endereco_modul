<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantFirstNameCheckResultElement {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */ 
	 
	 /**
	  *	@var string		a valid firstname in correct casing
	  */
	 private $firstName = null;
	 
	 /*
	  * 
	  * 	GETTERS AND SETTERS
	  * 
	  */
	 
    /**
     * Returns $firstName.
     *
     * @see OrwellInputAssistantFirstNameCheckResultElement::$firstName
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
     * @see OrwellInputAssistantFirstNameCheckResultElement::$firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    }
?>