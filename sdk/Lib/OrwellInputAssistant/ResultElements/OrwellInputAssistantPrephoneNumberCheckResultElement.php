<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantPrephoneNumberCheckResultElement {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */

	/**
	 * @var string	the prephonenumber from the request
	 */
	private $prephoneNumber = null;
	
	/*
	 * 
	 * 		GETTERS AND SETTERS
	 * 
	 */
    
    /**
     * Returns $prephoneNumber.
     *
     * @see OrwellInputAssistantPrephoneNumberCheckResultElement::$prephoneNumber
     */
    public function getPrephoneNumber() {
    	if($this->prephoneNumber == null)
			return "";
		else
        	return $this->prephoneNumber;
    }
    
    /**
     * Sets $prephoneNumber.
     *
     * @param object $prephoneNumber
     * @see OrwellInputAssistantPrephoneNumberCheckResultElement::$prephoneNumber
     */
    public function setPrephoneNumber($prephoneNumber) {
        $this->prephoneNumber = $prephoneNumber;
    }
    }
?>