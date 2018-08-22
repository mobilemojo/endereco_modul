<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalAddressCheckPoweredByUniservRequest {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */

	/**
	 * @var OrwellInternationalAddressCheckInputAddress
	 * 		the address to check
	 */
	private $inputAddress = null;
	
	/**
	 * @var OrwellInternationalAddressCheckParameter
	 */
	private $parameter = null;
    
	/*
	 * 
	 * 		GETTER AND SETTER
	 * 
	 */
	
    /**
     * Returns $inputAddress.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$inputAddress
     */
    public function getInputAddress() {
        return $this->inputAddress;
    }
    
    /**
     * Sets $inputAddress.
     *
     * @param object $inputAddress
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$inputAddress
     */
    public function setInputAddress($inputAddress) {
        $this->inputAddress = $inputAddress;
    }
    
    /**
     * Returns $parameter.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parameter
     */
    public function getParameter() {
        return $this->parameter;
    }
    
    /**
     * Sets $parameter.
     *
     * @param object $parameter
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parameter
     */
    public function setParameter($parameter) {
        $this->parameter = $parameter;
    }
}

class OInterAddressCheckRequest extends  OrwellInternationalAddressCheckPoweredByUniservRequest{
	
}
?>