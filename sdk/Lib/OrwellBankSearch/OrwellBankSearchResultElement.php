<?php

/*
 *	Created: 	30.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellBankSearchResultElement {
	
	private $bank = null;
	
	private $bankCode = null;
	
	private $bankShort = null;
	
	private $bic = null;
	
	private $city = null;
	
	private $fuzzyValue = null;
	
	private $pan = null;
	
	private $postCode = null;

    /**
     * Returns $bank.
     *
     * @see OrwellBankSearchResultElement::$bank
     */
    public function getBank() {
        return $this->bank;
    }
    
    /**
     * Sets $bank.
     *
     * @param object $bank
     * @see OrwellBankSearchResultElement::$bank
     */
    public function setBank($bank) {
        $this->bank = $bank;
    }
    
    /**
     * Returns $bankCode.
     *
     * @see OrwellBankSearchResultElement::$bankCode
     */
    public function getBankCode() {
        return $this->bankCode;
    }
    
    /**
     * Sets $bankCode.
     *
     * @param object $bankCode
     * @see OrwellBankSearchResultElement::$bankCode
     */
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    
    /**
     * Returns $bankShort.
     *
     * @see OrwellBankSearchResultElement::$bankShort
     */
    public function getBankShort() {
        return $this->bankShort;
    }
    
    /**
     * Sets $bankShort.
     *
     * @param object $bankShort
     * @see OrwellBankSearchResultElement::$bankShort
     */
    public function setBankShort($bankShort) {
        $this->bankShort = $bankShort;
    }
    
    /**
     * Returns $bic.
     *
     * @see OrwellBankSearchResultElement::$bic
     */
    public function getBic() {
        return $this->bic;
    }
    
    /**
     * Sets $bic.
     *
     * @param object $bic
     * @see OrwellBankSearchResultElement::$bic
     */
    public function setBic($bic) {
        $this->bic = $bic;
    }
    
    /**
     * Returns $city.
     *
     * @see OrwellBankSearchResultElement::$city
     */
    public function getCity() {
        return $this->city;
    }
    
    /**
     * Sets $city.
     *
     * @param object $city
     * @see OrwellBankSearchResultElement::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $fuzzyValue.
     *
     * @see OrwellBankSearchResultElement::$fuzzyValue
     */
    public function getFuzzyValue() {
        return $this->fuzzyValue;
    }
    
    /**
     * Sets $fuzzyValue.
     *
     * @param object $fuzzyValue
     * @see OrwellBankSearchResultElement::$fuzzyValue
     */
    public function setFuzzyValue($fuzzyValue) {
        $this->fuzzyValue = $fuzzyValue;
    }
    
    /**
     * Returns $pan.
     *
     * @see OrwellBankSearchResultElement::$pan
     */
    public function getPan() {
        return $this->pan;
    }
    
    /**
     * Sets $pan.
     *
     * @param object $pan
     * @see OrwellBankSearchResultElement::$pan
     */
    public function setPan($pan) {
        $this->pan = $pan;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellBankSearchResultElement::$postCode
     */
    public function getPostCode() {
        return $this->postCode;
    }
    
    /**
     * Sets $postCode.
     *
     * @param object $postCode
     * @see OrwellBankSearchResultElement::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
}
?>