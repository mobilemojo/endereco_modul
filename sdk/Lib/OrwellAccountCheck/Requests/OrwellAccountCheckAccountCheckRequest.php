<?php

/*
 *	Created: 	22.12.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellAccountCheckAccountCheckRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string	transactionid - specifying the transaction context of the current webservice call
	 * 				optional
	 */
	private $tid = null;
	
	/**
	 * @var string	bankCode to be validated
	 */
	private $bankCode = null;
	
	/**
	 * @var string	accountNumber to be validated
	 */
	private $accountNumber = null;
	
    /*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
	
    /**
     * Returns $accountNumber.
     *
     * @see OrwellAccountCheckAccountCheckRequest::$accountNumber
     */
    public function getAccountNumber() {
    	if($this->accountNumber == null)
			return "";
		else
        	return $this->accountNumber;
    }
    
    /**
     * Sets $accountNumber.
     *
     * @param object $accountNumber
     * @see OrwellAccountCheckAccountCheckRequest::$accountNumber
     */
    public function setAccountNumber($accountNumber) {
        $this->accountNumber = $accountNumber;
    }
    
    /**
     * Returns $bankCode.
     *
     * @see OrwellAccountCheckAccountCheckRequest::$bankCode
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
     * @see OrwellAccountCheckAccountCheckRequest::$bankCode
     */
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    
    /**
     * Returns $tid.
     *
     * @see OrwellAccountCheckAccountCheckRequest::$tid
     */
    public function getTid() {
    	if($this->tid == null)
			return "";
		else
        	return $this->tid;
    }
    
    /**
     * Sets $tid.
     *
     * @param object $tid
     * @see OrwellAccountCheckAccountCheckRequest::$tid
     */
    public function setTid($tid) {
        $this->tid = $tid;
    }
    }
?>