<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantBankCodeExpansionRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string		part of or whole bankcode to be augmented with more related information
	 */
	private $bankCode = null; 	
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $bankCode.
     *
     * @see OrwellInputAssistantBankCodeExpansionRequest::$bankCode
     */
    public function getBankCode() {
    	if($this->bankCode == null)
			return "";
		else
        	return $this->bankCode;
    }
    
    /**
     * Sets $bankCode.
     *
     * @param object $bankCode
     * @see OrwellInputAssistantBankCodeExpansionRequest::$bankCode
     */
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
}
?>