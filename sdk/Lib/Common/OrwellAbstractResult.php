<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

abstract class OrwellAbstractResult {
	
	/**
	 * @type array of *ResultElement Objects
	 * @var array elements 	-	contains the result elements
	 */
	protected $elements = null;
	
	/**
	 * @type array of string
	 * @var array status		-	containing status codes for executed webservice
	 */
	protected $status = null;

	protected $fieldId = null;

	protected $callNo = null;

	protected $service = null;
	
	/*
	 *
	 *		PUBLIC METHODS
	 *
	 */
	
	/**	
	 * @return array 	an array of OrwellAddressCheckResultElement objects. Each describing one valid address
	 * 					returned by the OrwellAddressCheck WebService or empty if no address has been returned
	 */
	public function getElements(){
		if($this->elements == null)
			return array();
		return $this->elements;
	}
	
	/**
	 * 
	 * @param int $idx 	Index of an OrwellAddressCheckResultElement object within the internal elements array 
	 * @return OrwellAddressCheckResultElement or null if $idx is not a key within the internal array
	 */
	public function get(int $idx){
		if(array_key_exists($idx, $this->elements))
			return $this->elements[$idx];
		else
			return null; 
	}
	
	/**
	 * 
	 * @return array 	an array of string representing statuscodes returned by the OrwellAddressCheck Webservice. Which describe 
	 * 					the relationship of the input to the returned addresses. Empty if AddressCheck has not been called yet.
	 */
	public function getStatus(){
		if($this->status == null)
			return array();
		else
			return $this->status;
	}

	/**
	 * Function to check for presence of a specfic statuscode
	 * 
	 * @param string $status	the statuscode to be searched for 
	 * @return int 				-1 if statuscode could not be found
	 * 							else: the index of the statuscode within the internal statuscode array.
	 * 							so the index can be used together with the array returned by getStatus()
	 */	
	public function hasStatus(string $status){
		$idx = array_search($status, $this->status); 
		if($idx === false)
			return -1;
		else
			return $idx;
	}

	/**
	 * @return null
	 */
	public function getFieldId()
	{
		return $this->fieldId;
	}

	/**
	 * @param null $fieldId
	 * @return OrwellAbstractResult
	 */
	public function setFieldId($fieldId)
	{
		$this->fieldId = $fieldId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCallNo()
	{
		return $this->callNo;
	}

	/**
	 * @param int $callNo
	 * @return OrwellAbstractResult
	 */
	public function setCallNo($callNo)
	{
		$this->callNo = $callNo;
		return $this;
	}

	/**
	 * @return null
	 */
	public function getService()
	{
		return $this->service;
	}

	/**
	 * @param null $service
	 * @return OrwellAbstractResult
	 */
	public function setService($service)
	{
		$this->service = $service;
		return $this;
	}

	/**
	 * @param mixed $elements
	 * @return $this
	 */
	public function setElements($elements)
	{
		$this->elements = $elements;
		return $this;
	}
}
?>