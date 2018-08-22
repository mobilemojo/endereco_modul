<?php

/*
 *	Created: 	22.12.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellAccountCheckAccountCheckResultElement {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string 	given accountNumber
	 */
	private $accountNumber = null;
	
	/**
	 * @var string	city of the bank if account informations are valid
	 */
	private $bankCity = null;
	
	/**
	 * @var string	given bankCode 
	 */
	private $bankCode = null;
	
	/**
	 * @var string 	specifying whether the bankcode will be deleted
	 */
	private $bankCodeDeletion = null;
	
	/**
	 * @var string	only useful if bankcode will be deleted
	 */
	private $bankCodeNext = null;
	
	/**
	 * @var string	specifying whether the given bank is the owner of the bankcode
	 */
	private $bankCodeOwner = null;
	
	/**
	 * @var string 	the name of the bank
	 */
	private $bankName = null;
	
	/**
	 * @var string 	the name of the bank in short form
	 */
	private $bankNameShort = null;
	
	/**
	 * @var	string	the postcode of the bank (can be empty)
	 */
	private $bankPostCode = null;
	
	/**
	 * @var string 	the Bank Identifier Code for the bank (can be empty)
	 */
	private $bic = null;
	
	/**
	 * @var	string 	attribute to mark changes on the bank
	 */
	private $changeCode = null;
	
	/**
	 * @var string	number of the dataset of the bank within the bankcode file of the Bundesbank 	
	 */
	private $dataSetNumber = null;
	
	/**
	 * @var string	number of instituition (can be empty) 
	 */
	private $pan = null;
	
	/**
	 * @var string	number of validation
	 */
	private $ruleNumber = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
    
    /**
     * Returns $accountNumber.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$accountNumber
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
     * @see OrwellAccountCheckAccountCheckResultElement::$accountNumber
     */
    public function setAccountNumber($accountNumber) {
        $this->accountNumber = $accountNumber;
    }
    
    /**
     * Returns $bankCity.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCity
     */
    public function getBankCity() {
        if($this->bankCity == null)
			return "";
		else
        	return $this->bankCity;
    }
    
    /**
     * Sets $bankCity.
     *
     * @param object $bankCity
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCity
     */
    public function setBankCity($bankCity) {
        $this->bankCity = $bankCity;
    }
    
    /**
     * Returns $bankCode.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCode
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
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCode
     */
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    
    /**
     * Returns $bankCodeDeletion.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCodeDeletion
     */
    public function getBankCodeDeletion() {
        if($this->bankCodeDeletion == null)
			return "";
		else
        	return $this->bankCodeDeletion;
    }
    
    /**
     * Sets $bankCodeDeletion.
     *
     * @param object $bankCodeDeletion
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCodeDeletion
     */
    public function setBankCodeDeletion($bankCodeDeletion) {
        $this->bankCodeDeletion = $bankCodeDeletion;
    }
    
    /**
     * Returns $bankCodeNext.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCodeNext
     */
    public function getBankCodeNext() {
        if($this->bankCodeNext == null)
			return "";
		else
        	return $this->bankCodeNext;
    }
    
    /**
     * Sets $bankCodeNext.
     *
     * @param object $bankCodeNext
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCodeNext
     */
    public function setBankCodeNext($bankCodeNext) {
        $this->bankCodeNext = $bankCodeNext;
    }
    
    /**
     * Returns $bankCodeOwner.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCodeOwner
     */
    public function getBankCodeOwner() {
        if($this->bankCodeOwner == null)
			return "";
		else
        	return $this->bankCodeOwner;
    }
    
    /**
     * Sets $bankCodeOwner.
     *
     * @param object $bankCodeOwner
     * @see OrwellAccountCheckAccountCheckResultElement::$bankCodeOwner
     */
    public function setBankCodeOwner($bankCodeOwner) {
        $this->bankCodeOwner = $bankCodeOwner;
    }
    
    /**
     * Returns $bankName.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankName
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
     * @see OrwellAccountCheckAccountCheckResultElement::$bankName
     */
    public function setBankName($bankName) {
        $this->bankName = $bankName;
    }
    
    /**
     * Returns $bankNameShort.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankNameShort
     */
    public function getBankNameShort() {
        if($this->bankNameShort == null)
			return "";
		else
        	return $this->bankNameShort;
    }
    
    /**
     * Sets $bankNameShort.
     *
     * @param object $bankNameShort
     * @see OrwellAccountCheckAccountCheckResultElement::$bankNameShort
     */
    public function setBankNameShort($bankNameShort) {
        $this->bankNameShort = $bankNameShort;
    }
    
    /**
     * Returns $bankPostCode.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bankPostCode
     */
    public function getBankPostCode() {
        if($this->bankPostCode == null)
			return "";
		else
        	return $this->bankPostCode;
    }
    
    /**
     * Sets $bankPostCode.
     *
     * @param object $bankPostCode
     * @see OrwellAccountCheckAccountCheckResultElement::$bankPostCode
     */
    public function setBankPostCode($bankPostCode) {
        $this->bankPostCode = $bankPostCode;
    }
    
    /**
     * Returns $bic.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$bic
     */
    public function getBic() {
        if($this->bic == null)
			return "";
		else
        	return $this->bic;
    }
    
    /**
     * Sets $bic.
     *
     * @param object $bic
     * @see OrwellAccountCheckAccountCheckResultElement::$bic
     */
    public function setBic($bic) {
        $this->bic = $bic;
    }
    
    /**
     * Returns $changeCode.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$changeCode
     */
    public function getChangeCode() {
        if($this->changeCode == null)
			return "";
		else
        	return $this->changeCode;
    }
    
    /**
     * Sets $changeCode.
     *
     * @param object $changeCode
     * @see OrwellAccountCheckAccountCheckResultElement::$changeCode
     */
    public function setChangeCode($changeCode) {
        $this->changeCode = $changeCode;
    }
    
    /**
     * Returns $dataSetNumber.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$dataSetNumber
     */
    public function getDataSetNumber() {
        if($this->dataSetNumber == null)
			return "";
		else
        	return $this->dataSetNumber;
    }
    
    /**
     * Sets $dataSetNumber.
     *
     * @param object $dataSetNumber
     * @see OrwellAccountCheckAccountCheckResultElement::$dataSetNumber
     */
    public function setDataSetNumber($dataSetNumber) {
        $this->dataSetNumber = $dataSetNumber;
    }
    
    /**
     * Returns $pan.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$pan
     */
    public function getPan() {
        if($this->pan == null)
			return "";
		else
        	return $this->pan;
    }
    
    /**
     * Sets $pan.
     *
     * @param object $pan
     * @see OrwellAccountCheckAccountCheckResultElement::$pan
     */
    public function setPan($pan) {
        $this->pan = $pan;
    }
    
    /**
     * Returns $ruleNumber.
     *
     * @see OrwellAccountCheckAccountCheckResultElement::$ruleNumber
     */
    public function getRuleNumber() {
        if($this->ruleNumber == null)
			return "";
		else
        	return $this->ruleNumber;
    }
    
    /**
     * Sets $ruleNumber.
     *
     * @param object $ruleNumber
     * @see OrwellAccountCheckAccountCheckResultElement::$ruleNumber
     */
    public function setRuleNumber($ruleNumber) {
        $this->ruleNumber = $ruleNumber;
    }
}
?>