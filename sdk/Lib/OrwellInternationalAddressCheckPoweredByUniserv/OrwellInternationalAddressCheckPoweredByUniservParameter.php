<?php

/*
 *	Created: 	10.02.2010
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalAddressCheckPoweredByUniservParameter {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */
	
	/*
	 * Members of Parameter Object in WebService Description  
	 */
	
	/**
	 * @var string		to configure the case of letters in the output
	 * 					optional
	 * 					possible values:
	 * 					0 = upper and lower case (default)
	 * 					1 = lower case
	 * 					2 = upper case
	 * 					3 = inherit from input 
	 */
	private $parCase = null;
	
	/**
	 * @var	string		specify how to handle special characters in output
	 * 					optional
	 * 					possible values:
	 * 					0 = included (default)
	 * 					1 = expand (ä = ae and so on)
	 * 					2 = inherit from input
	 * 					3 = expand based on country code 
	 * 					@see OrwellInternationalAddressCheckPoweredByUniservRequest::$country
	 * 					@see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxCountry
	 */
	private $parSpecialChars = null;
	
	/**
	 * @var string		specify how the output should look like (standardization)
	 * 					optional
	 * 					0 = no standardization, don't analyse
	 * 					1 = take from convertaddress-dictionary.analysis without standardization (default) 
	 * 					2 = abbrevation from convertaddress-dictionary. analysis without standardization
	 * 					3 = analysis und standardization
	 */
	private $parNormOutput = null;
	
	/**
	 * @var string		to fix the language to a specific value
	 * 					optional
	 * 					possible values:
	 * 					1 = german
	 * 					2 = english (default)
	 * 					3 = french
	 */
	private $parLanguage = null;
	
	/**
	 * @var string		maximum length of output lines as integer converted to string, only useful if parameter parNormOutLine is used
	 * 					determines the maximum length of the address formated as lines in the result
	 * 					if to long, the values will be shortened until they fit into the line
	 * 					default = 99
	 * 					optional
	 */
	private $parLenOutLine = null;
	
	/**
	 * @var string 		maximum length of the returned city (france only 32 or 38 possible)
	 * 					if longer formatting according to parCityAbbrev
	 * 					optional
	 */
	private $parCityLen	= null;
	
	/**
	 * @var string		determines how to long city names should be formatted (if still to long 
	 * 					after formatting, the name will be cut)
	 * 					0 = always long form
	 * 					1 = always short form
	 * 					2 = use short form if long form is longer than parCityLen (default)
	 * 					optional
	 */
	private $parCityAbbrev = null;
	
	/**
	 * @var string		maxium length of the returned street (only for strHno)
	 * 					france (only 32 or 38)
	 * 					if longer formatting according to parStrAbbrev
	 * 					optional
	 */
	private $parStrLen = null;
	
	/**
	 * @var	string		determines how to long street names should be formatted (if still to long
	 * 					after formatting, the name will be cut)
	 * 					0 = always long form
	 * 					1 = always short form
	 * 					2 = use short form if long form is longer than parStrLen
	 * 					optional
	 */
	private $parStrAbbrev = null;
	
	/**
	 * @var string		determines language of city in the output; only useful for regions
	 * 					with regional dialects
	 * 					@see $parAlternativeStr
	 * 					0 = language of input (input in dialect => output in dialect etc.)
	 * 						(default)
	 * 					1 = lookup based on input language, result in base-language (no dialect)
	 * 					2 = lookup based on input language, result in regional dialect
	 * 					optional
	 */
	private $parAlternativeCity = null;
	
	/**
	 * @var string		@see $parAlternativeCity
	 * 					optional
	 */
	private $parAlternativeStr = null;
	
	/**
	 * @var	string		use ZIP to return valid housenumbers if given housenumber is not correct
	 * 					0 = don't use the ZIP (UNI_HNO_ERROR could be returned because housenumber box (group) cant't be found) 
	 * 					1 = a housenumer area for the zip will be returned
	 */
	private $parZipHno = null;
	
	/**
	 * @var string		validate a postbox ?
	 * 					0 = no
	 * 					1 = yes 
	 * 						(default)
	 * 					optional
	 */
	private $parCheckPobox = null;
	 
	/**
	 * @var string 		minimum similarity street for a possible match to apply sufficient and reliable
	 * 					@see $parCityMval 
	 * 					range: 1-100 
	 * 					default = 65
	 */
	private $parStrMval = null;
	
	/**
	 * @var string		complexity of street validation, complete/partly, yes/no
	 * 					0 = no street validation
	 * 					2 = street validation without change of spelling
	 * 					4 = street validation with change of spelling
	 * 						(default)
	 */
	private $parCheckStr = null;
	
	/**
	 * @var string		spelling of street type (spain only), long form or short form
	 * 					0 = long form
	 * 						(default)
	 * 					1 = short form
	 * 					optional
	 */
	private $parStrType = null;
	
	/**
	 * @var string		spain only; determines whether street type "calle" should be returned
	 * 					0 = no
	 * 					1 = yes
	 * 						(default)
	 *					optional
	 */
	private $parStrMainType = null;
	
	/**
	 * @var	string		correct renamed streets (deliver new name instead of old) or aliases
	 * 					0 = no
	 * 					1 = rename only
	 * 					2 = alias only
	 * 					3 = rename and alias
	 * 						(default)
	 * 					optional
	 */
	private $parRef = null;	
	
	/**
	 * @var string		minium similarity city
	 * 					@see $parStrMval
	 * 					default = 70
	 * 					optional
	 */
	private $parCityMval = null;
	
	/**
	 * @var string		italy only
	 * 					0 = return city only
	 * 						(default) 					
	 * 					1 = return city and province
	 * 					optional
	 */
	private $parOutCity = null;
	
	/**
	 * @var string 		suppress output of district if it's the same as the city
	 * 					germany only
	 * 					0 = suppress
	 * 					1 = always return district
	 * 						(default)
	 * 					optional
	 */
	private $parSuppressDistrictEqual = null;
	
	/**
	 * @var string		use the city found during analysis in the next step: postal validation
	 * 					0 = yes
	 * 					1 = no
	 * 					2 = use it, but don't correct it
	 * 						(default)
	 * 					optional
	 */
	private $parUseCity = null;
	
	/**
	 * @var string		USA only
	 * 					use ZIP arguments like ZIP+4 or as 5-digit ZIP
	 * 					0 = as 5-digit
	 * 						(default)
	 * 					1 = as ZIP+4
	 * 					optional
	 */
	private $parZipFull = null;
	
	/**
	 * @var string		allow special zip-codes for bulk purchaser
	 * 					0 = no
	 * 					1 = yes
	 * 					(default)
	 * 					optional
	 */
	private $parBulkPurchaser = null;
	
	/**
	 * @var string		maximum number of elements per choice
	 * 					optional
	 * 					possible values:
	 * 					0-65335, default= 1000
	 */
	private $parSelListMax = null;
	
	/**
	 * @var string		fine tuning for match quality
	 * 					UK only
	 * 					accept a adress marked as insufficient
	 * 					0 = mark as errornous
	 * 					1 = mark as success and return
	 * 						(default)
	 * 					optional
	 */	
	private $parInsuffResult = null;
	
	/**
	 * @var string		resolve choices
	 * 					UK only
	 * 					for value 0 no internal resolving takes place
	 * 					range: 0-15
	 * 					default = 5
	 */
	private $parUntieRange = null;
	
	/**
	 * @var string		activates or decativates housenumber check
	 * 					optional
	 * 					possible values:
	 * 					1 = activated
	 * 					2 = deactivated
	 */
	private $parHnoConfirmed = null;
	
	/*
	 * 
	 *		GETTER AND SETTER 
	 * 
	 */
	
    /**
     * Returns $parCase.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parCase
     */
    public function getParCase() {
    	if($this->parCase == null)
			return "";
		else
        	return $this->parCase;
    }
    
    /**
     * Sets $parCase.
     *
     * @param object $parCase
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parCase
     */
    public function setParCase($parCase) {
        $this->parCase = $parCase;
    }
    
    /**
     * Returns $parHnoConfirmed.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parHnoConfirmed
     */
    public function getParHnoConfirmed() {
    	if($this->parHnoConfirmed == null)
			return "";
		else
        	return $this->parHnoConfirmed;
    }
    
    /**
     * Sets $parHnoConfirmed.
     *
     * @param object $parHnoConfirmed
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parHnoConfirmed
     */
    public function setParHnoConfirmed($parHnoConfirmed) {
        $this->parHnoConfirmed = $parHnoConfirmed;
    }
    
    /**
     * Returns $parLanguage.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parLanguage
     */
    public function getParLanguage() {
    	if($this->parLanguage == null)
			return "";
		else
        	return $this->parLanguage;
    }
    
    /**
     * Sets $parLanguage.
     *
     * @param object $parLanguage
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parLanguage
     */
    public function setParLanguage($parLanguage) {
        $this->parLanguage = $parLanguage;
    }
    
    /**
     * Returns $parSelListMax.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parSelListMax
     */
    public function getParSelListMax() {
    	if($this->parSelListMax == null)
			return "";
		else
        	return $this->parSelListMax;
    }
    
    /**
     * Sets $parSelListMax.
     *
     * @param object $parSelListMax
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parSelListMax
     */
    public function setParSelListMax($parSelListMax) {
        $this->parSelListMax = $parSelListMax;
    }
    
    /**
     * Returns $parSpecialChars.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parSpecialChars
     */
    public function getParSpecialChars() {
    	if($this->parSpecialChars == null)
			return "";
		else
        	return $this->parSpecialChars;
    }
    
    /**
     * Sets $parSpecialChars.
     *
     * @param object $parSpecialChars
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$parSpecialChars
     */
    public function setParSpecialChars($parSpecialChars) {
        $this->parSpecialChars = $parSpecialChars;
    }
    
    /**
     * Returns $parAlternativeCity.
     *
     * @see OrwellInternationalAddressCheckParameter::$parAlternativeCity
     */
    public function getParAlternativeCity() {
    	if($this->parAlternativeCity == null)
			return "";
		else
        	return $this->parAlternativeCity;
    }
    
    /**
     * Sets $parAlternativeCity.
     *
     * @param object $parAlternativeCity
     * @see OrwellInternationalAddressCheckParameter::$parAlternativeCity
     */
    public function setParAlternativeCity($parAlternativeCity) {
        $this->parAlternativeCity = $parAlternativeCity;
    }
    
    /**
     * Returns $parAlternativeStr.
     *
     * @see OrwellInternationalAddressCheckParameter::$parAlternativeStr
     */
    public function getParAlternativeStr() {
    	if($this->parAlternativeStr == null)
			return "";
		else
        	return $this->parAlternativeStr;
    }
    
    /**
     * Sets $parAlternativeStr.
     *
     * @param object $parAlternativeStr
     * @see OrwellInternationalAddressCheckParameter::$parAlternativeStr
     */
    public function setParAlternativeStr($parAlternativeStr) {
        $this->parAlternativeStr = $parAlternativeStr;
    }
    
    /**
     * Returns $parBulkPurchaser.
     *
     * @see OrwellInternationalAddressCheckParameter::$parBulkPurchaser
     */
    public function getParBulkPurchaser() {
    	if($this->parBulkPurchaser == null)
			return "";
		else
        	return $this->parBulkPurchaser;
    }
    
    /**
     * Sets $parBulkPurchaser.
     *
     * @param object $parBulkPurchaser
     * @see OrwellInternationalAddressCheckParameter::$parBulkPurchaser
     */
    public function setParBulkPurchaser($parBulkPurchaser) {
        $this->parBulkPurchaser = $parBulkPurchaser;
    }
    
    /**
     * Returns $parCheckPobox.
     *
     * @see OrwellInternationalAddressCheckParameter::$parCheckPobox
     */
    public function getParCheckPobox() {
    	if($this->parCheckPobox == null)
			return "";
		else
        	return $this->parCheckPobox;
    }
    
    /**
     * Sets $parCheckPobox.
     *
     * @param object $parCheckPobox
     * @see OrwellInternationalAddressCheckParameter::$parCheckPobox
     */
    public function setParCheckPobox($parCheckPobox) {
        $this->parCheckPobox = $parCheckPobox;
    }
    
    /**
     * Returns $parCheckStr.
     *
     * @see OrwellInternationalAddressCheckParameter::$parCheckStr
     */
    public function getParCheckStr() {
    	if($this->parCheckStr == null)
			return "";
		else
        	return $this->parCheckStr;
    }
    
    /**
     * Sets $parCheckStr.
     *
     * @param object $parCheckStr
     * @see OrwellInternationalAddressCheckParameter::$parCheckStr
     */
    public function setParCheckStr($parCheckStr) {
        $this->parCheckStr = $parCheckStr;
    }
    
    /**
     * Returns $parCityAbbrev.
     *
     * @see OrwellInternationalAddressCheckParameter::$parCityAbbrev
     */
    public function getParCityAbbrev() {
    	if($this->parCityAbbrev == null)
			return "";
		else
        	return $this->parCityAbbrev;
    }
    
    /**
     * Sets $parCityAbbrev.
     *
     * @param object $parCityAbbrev
     * @see OrwellInternationalAddressCheckParameter::$parCityAbbrev
     */
    public function setParCityAbbrev($parCityAbbrev) {
        $this->parCityAbbrev = $parCityAbbrev;
    }
    
    /**
     * Returns $parCityLen.
     *
     * @see OrwellInternationalAddressCheckParameter::$parCityLen
     */
    public function getParCityLen() {
    	if($this->parCityLen == null)
			return "";
		else
        	return $this->parCityLen;
    }
    
    /**
     * Sets $parCityLen.
     *
     * @param object $parCityLen
     * @see OrwellInternationalAddressCheckParameter::$parCityLen
     */
    public function setParCityLen($parCityLen) {
        $this->parCityLen = $parCityLen;
    }
    
    /**
     * Returns $parCityMval.
     *
     * @see OrwellInternationalAddressCheckParameter::$parCityMval
     */
    public function getParCityMval() {
    	if($this->parCityMval == null)
			return "";
		else
        	return $this->parCityMval;
    }
    
    /**
     * Sets $parCityMval.
     *
     * @param object $parCityMval
     * @see OrwellInternationalAddressCheckParameter::$parCityMval
     */
    public function setParCityMval($parCityMval) {
        $this->parCityMval = $parCityMval;
    }
    
    /**
     * Returns $parInsuffResult.
     *
     * @see OrwellInternationalAddressCheckParameter::$parInsuffResult
     */
    public function getParInsuffResult() {
    	if($this->parInsuffResult == null)
			return "";
		else
        	return $this->parInsuffResult;
    }
    
    /**
     * Sets $parInsuffResult.
     *
     * @param object $parInsuffResult
     * @see OrwellInternationalAddressCheckParameter::$parInsuffResult
     */
    public function setParInsuffResult($parInsuffResult) {
        $this->parInsuffResult = $parInsuffResult;
    }
    
    /**
     * Returns $parLenOutLine.
     *
     * @see OrwellInternationalAddressCheckParameter::$parLenOutLine
     */
    public function getParLenOutLine() {
    	if($this->parLenOutLine == null)
			return "";
		else
        	return $this->parLenOutLine;
    }
    
    /**
     * Sets $parLenOutLine.
     *
     * @param object $parLenOutLine
     * @see OrwellInternationalAddressCheckParameter::$parLenOutLine
     */
    public function setParLenOutLine($parLenOutLine) {
        $this->parLenOutLine = $parLenOutLine;
    }
    
    /**
     * Returns $parNormOutput.
     *
     * @see OrwellInternationalAddressCheckParameter::$parNormOutput
     */
    public function getParNormOutput() {
    	if($this->parNormOutput == null)
			return "";
		else
        	return $this->parNormOutput;
    }
    
    /**
     * Sets $parNormOutput.
     *
     * @param object $parNormOutput
     * @see OrwellInternationalAddressCheckParameter::$parNormOutput
     */
    public function setParNormOutput($parNormOutput) {
        $this->parNormOutput = $parNormOutput;
    }
    
    /**
     * Returns $parOutCity.
     *
     * @see OrwellInternationalAddressCheckParameter::$parOutCity
     */
    public function getParOutCity() {
    	if($this->parOutCity == null)
			return "";
		else
        	return $this->parOutCity;
    }
    
    /**
     * Sets $parOutCity.
     *
     * @param object $parOutCity
     * @see OrwellInternationalAddressCheckParameter::$parOutCity
     */
    public function setParOutCity($parOutCity) {
        $this->parOutCity = $parOutCity;
    }
    
    /**
     * Returns $parRef.
     *
     * @see OrwellInternationalAddressCheckParameter::$parRef
     */
    public function getParRef() {
    	if($this->parRef == null)
			return "";
		else
       	 return $this->parRef;
    }
    
    /**
     * Sets $parRef.
     *
     * @param object $parRef
     * @see OrwellInternationalAddressCheckParameter::$parRef
     */
    public function setParRef($parRef) {
        $this->parRef = $parRef;
    }
    
    /**
     * Returns $parStrAbbrev.
     *
     * @see OrwellInternationalAddressCheckParameter::$parStrAbbrev
     */
    public function getParStrAbbrev() {
    	if($this->parStrAbbrev == null)
			return "";
		else
        	return $this->parStrAbbrev;
    }
    
    /**
     * Sets $parStrAbbrev.
     *
     * @param object $parStrAbbrev
     * @see OrwellInternationalAddressCheckParameter::$parStrAbbrev
     */
    public function setParStrAbbrev($parStrAbbrev) {
        $this->parStrAbbrev = $parStrAbbrev;
    }
    
    /**
     * Returns $parStrLen.
     *
     * @see OrwellInternationalAddressCheckParameter::$parStrLen
     */
    public function getParStrLen() {
    	if($this->parStrLen == null)
			return "";
		else
       	 	return $this->parStrLen;
    }
    
    /**
     * Sets $parStrLen.
     *
     * @param object $parStrLen
     * @see OrwellInternationalAddressCheckParameter::$parStrLen
     */
    public function setParStrLen($parStrLen) {
        $this->parStrLen = $parStrLen;
    }
    
    /**
     * Returns $parStrMainType.
     *
     * @see OrwellInternationalAddressCheckParameter::$parStrMainType
     */
    public function getParStrMainType() {
    	if($this->parStrMainType == null)
			return "";
		else
        	return $this->parStrMainType;
    }
    
    /**
     * Sets $parStrMainType.
     *
     * @param object $parStrMainType
     * @see OrwellInternationalAddressCheckParameter::$parStrMainType
     */
    public function setParStrMainType($parStrMainType) {
        $this->parStrMainType = $parStrMainType;
    }
    
    /**
     * Returns $parStrMval.
     *
     * @see OrwellInternationalAddressCheckParameter::$parStrMval
     */
    public function getParStrMval() {
    	if($this->parStrMval == null)
			return "";
		else
        	return $this->parStrMval;
    }
    
    /**
     * Sets $parStrMval.
     *
     * @param object $parStrMval
     * @see OrwellInternationalAddressCheckParameter::$parStrMval
     */
    public function setParStrMval($parStrMval) {
        $this->parStrMval = $parStrMval;
    }
    
    /**
     * Returns $parStrType.
     *
     * @see OrwellInternationalAddressCheckParameter::$parStrType
     */
    public function getParStrType() {
    	if($this->parStrType == null)
			return "";
		else
        	return $this->parStrType;
    }
    
    /**
     * Sets $parStrType.
     *
     * @param object $parStrType
     * @see OrwellInternationalAddressCheckParameter::$parStrType
     */
    public function setParStrType($parStrType) {
        $this->parStrType = $parStrType;
    }
    
    /**
     * Returns $parSuppressDistrictEqual.
     *
     * @see OrwellInternationalAddressCheckParameter::$parSuppressDistrictEqual
     */
    public function getParSuppressDistrictEqual() {
    	if($this->parSuppressDistrictEqual == null)
			return "";
		else
        	return $this->parSuppressDistrictEqual;
    }
    
    /**
     * Sets $parSuppressDistrictEqual.
     *
     * @param object $parSuppressDistrictEqual
     * @see OrwellInternationalAddressCheckParameter::$parSuppressDistrictEqual
     */
    public function setParSuppressDistrictEqual($parSuppressDistrictEqual) {
        $this->parSuppressDistrictEqual = $parSuppressDistrictEqual;
    }
    
    /**
     * Returns $parUntieRange.
     *
     * @see OrwellInternationalAddressCheckParameter::$parUntieRange
     */
    public function getParUntieRange() {
    	if($this->parUntieRange == null)
			return "";
		else
        	return $this->parUntieRange;
    }
    
    /**
     * Sets $parUntieRange.
     *
     * @param object $parUntieRange
     * @see OrwellInternationalAddressCheckParameter::$parUntieRange
     */
    public function setParUntieRange($parUntieRange) {
        $this->parUntieRange = $parUntieRange;
    }
    
    /**
     * Returns $parUseCity.
     *
     * @see OrwellInternationalAddressCheckParameter::$parUseCity
     */
    public function getParUseCity() {
    	if($this->parUseCity == null)
			return "";
		else
        	return $this->parUseCity;
    }
    
    /**
     * Sets $parUseCity.
     *
     * @param object $parUseCity
     * @see OrwellInternationalAddressCheckParameter::$parUseCity
     */
    public function setParUseCity($parUseCity) {
        $this->parUseCity = $parUseCity;
    }
    
    /**
     * Returns $parZipFull.
     *
     * @see OrwellInternationalAddressCheckParameter::$parZipFull
     */
    public function getParZipFull() {
    	if($this->parZipFull == null)
			return "";
		else
        	return $this->parZipFull;
    }
    
    /**
     * Sets $parZipFull.
     *
     * @param object $parZipFull
     * @see OrwellInternationalAddressCheckParameter::$parZipFull
     */
    public function setParZipFull($parZipFull) {
        $this->parZipFull = $parZipFull;
    }
    
    /**
     * Returns $parZipHno.
     *
     * @see OrwellInternationalAddressCheckParameter::$parZipHno
     */
    public function getParZipHno() {
    	if($this->parZipHno == null)
			return "";
		else
        	return $this->parZipHno;
    }
    
    /**
     * Sets $parZipHno.
     *
     * @param object $parZipHno
     * @see OrwellInternationalAddressCheckParameter::$parZipHno
     */
    public function setParZipHno($parZipHno) {
        $this->parZipHno = $parZipHno;
    }
    }
?>