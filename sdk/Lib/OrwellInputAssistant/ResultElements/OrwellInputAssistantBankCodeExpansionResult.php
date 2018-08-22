<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantBankCodeExpansionResultElement {
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */
	
	/**
	 * @var string	a complete bankCode, that starts with the bankcode prefix
	 * 				given in the request
	 */
	private $bankCode = null;
	
	/**
	 * @var string	the name of the bank for the bankCode
	 */
	private $bankName = null;
	
	/*
	 * 
	 * 		GETTERS AND SETTERS
	 * 
	 */
    
    /**
     * Returns $bankCode.
     *
     * @see OrwellInputAssistantBankCodeExpansionResultElement::$bankCode
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
     * @see OrwellInputAssistantBankCodeExpansionResultElement::$bankCode
     */
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    
    /**
     * Returns $bankName.
     *
     * @see OrwellInputAssistantBankCodeExpansionResultElement::$bankName
     */
    public function getBankName() {
    	if($this->bankName == null)
			return "";
		else
        	return $this->bankName;
    }
    
    /**
     * Sets $bankName.
     *
     * @param object $bankName
     * @see OrwellInputAssistantBankCodeExpansionResultElement::$bankName
     */
    public function setBankName($bankName) {
        $this->bankName = $bankName;
    }
}
?>