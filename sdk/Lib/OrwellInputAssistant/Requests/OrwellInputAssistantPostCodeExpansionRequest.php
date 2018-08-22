<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantPostCodeExpansionRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string		postcode prefix (0-5 charaters) to be expanded to all postcodes
	 * 					starting with this prefix and to be augmented with cities for those
	 * 					postcodes
	 */
	private $postCode = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $postCode.
     *
     * @see OrwellInputAssistantPostCodeExpansionRequest::$postCode
     */
    public function getPostCode() {
    	if($this->postCode == null)
			return "";
		else
        	return $this->postCode;
    }
    
    /**
     * Sets $postCode.
     *
     * @param object $postCode
     * @see OrwellInputAssistantPostCodeExpansionRequest::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
}
?>