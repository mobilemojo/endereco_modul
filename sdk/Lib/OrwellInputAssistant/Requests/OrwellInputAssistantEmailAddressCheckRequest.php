<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantEmailAddressCheckRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string	emailAddress to check
	 */
	private $emailAddress = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
    
    /**
     * Returns $emailAddress.
     *
     * @see OrwellInputAssistantEmailAddressCheckRequest::$emailAddress
     */
    public function getEmailAddress() {
    	if($this->emailAddress == null)
			return "";
		else
        	return $this->emailAddress;
    }
    
    /**
     * Sets $emailAddress.
     *
     * @param object $emailAddress
     * @see OrwellInputAssistantEmailAddressCheckRequest::$emailAddress
     */
    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }
}
?>