<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalAddressCheckPoweredByUniservResult extends OrwellAbstractResult{
	
	/**
	 * @var string		error message or warning 
	 */
	private $errorMsg = null;
	
	/**
	 * @var int			count of returned addresses
	 */
	private $retCount = null;
	
	/**
	 * @var int			additional information to retType
	 */
	private $retInfo = null;
	
	/**
	 * @var int 		serverside returnvalue
	 * 					-1 = Exception
	 * 					 0 = OK
	 * 					 1 = Error
	 * 					 2 = Warnung
	 */
	private $retType = null;
	
	public function __construct($oiacWSresult){
		
		$this->elements = array();
		
		foreach($oiacWSresult->enhancedAddress as $enhancedAddress){
			
			$elem = new OrwellInternationalAddressCheckPoweredByUniservResultElement();
			
			$reflect = new ReflectionObject($enhancedAddress);
			
			$reflectElem = new ReflectionObject($elem);
			
			foreach($reflect->getProperties(ReflectionProperty::IS_PUBLIC) as $prop){
					
				$setter = $reflectElem->getMethod("set".ucfirst($prop->getName()));
				
				$setter->invoke($elem, $prop->getValue($enhancedAddress));
			}
			
			$this->elements[] = $elem;	
		}
		
		$this->status = $oiacWSresult->status;
		$this->retCount = $oiacWSresult->retCount;
		$this->retInfo = $oiacWSresult->retInfo;
		$this->retType = $oiacWSresult->retType;
		$this->errorMsg = $oiacWSresult->errorMsg;
	}
	
    
    /**
     * Returns $errorMsg.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$errorMsg
     */
    public function getErrorMsg() {
        return $this->errorMsg;
    }
    
    /**
     * Sets $errorMsg.
     *
     * @param object $errorMsg
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$errorMsg
     */
    public function setErrorMsg($errorMsg) {
        $this->errorMsg = $errorMsg;
    }
    
    /**
     * Returns $retCount.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$retCount
     */
    public function getRetCount() {
        return $this->retCount;
    }
    
    /**
     * Sets $retCount.
     *
     * @param object $retCount
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$retCount
     */
    public function setRetCount($retCount) {
        $this->retCount = $retCount;
    }
    
    /**
     * Returns $retInfo.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$retInfo
     */
    public function getRetInfo() {
        return $this->retInfo;
    }
    
    /**
     * Sets $retInfo.
     *
     * @param object $retInfo
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$retInfo
     */
    public function setRetInfo($retInfo) {
        $this->retInfo = $retInfo;
    }
    
    /**
     * Returns $retType.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$retType
     */
    public function getRetType() {
        return $this->retType;
    }
    
    /**
     * Sets $retType.
     *
     * @param object $retType
     * @see OrwellInternationalAddressCheckPoweredByUniservResult::$retType
     */
    public function setRetType($retType) {
        $this->retType = $retType;
    }
    }

class OInterAddressCheckResult extends OrwellInternationalAddressCheckPoweredByUniservResult {
	
}
?>