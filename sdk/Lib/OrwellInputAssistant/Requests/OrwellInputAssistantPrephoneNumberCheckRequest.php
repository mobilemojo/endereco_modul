<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantPrephoneNumberCheckRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */

	/**
	 * @var string		prephone number to check
	 */
	private $prephoneNumber = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
    
    /**
     * Returns $prephoneNumber.
     *
     * @see OrwellInputAssistantPrephoneNumberCheckRequest::$prephoneNumber
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
     * @see OrwellInputAssistantPrephoneNumberCheckRequest::$prephoneNumber
     */
    public function setPrephoneNumber($prephoneNumber) {
        $this->prephoneNumber = $prephoneNumber;
    }
}
?>