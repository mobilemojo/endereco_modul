<?php

/*
 *	Created: 	10.02.2010
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalAddressCheckPoweredByUniservInputAddress{
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */
	
	/**
	 * @var string 		country code of address, only for normal delivery addresses (most private households)
	 * 					optional
	 */
	private $country = null;
	
	/**
	 * @var string		2-char abrevation for state (USA only) 
	 */
	private $state = null;
	
	/**
	 * @var string		postcode/zip code of address, only for normal delivery addresses (most private households)
	 * 					optional
	 */
	private $zip = null;
	
	/**
	 * @var string		th +4 part of "ZIP+4" (USA only)
	 */
	private $zipAddOn = null;
	
	/**
	 * @var string		city of address, only for normal delivery addresses (most private households)
	 * 					optional
	 */
	private $city = null;
	
	/**
	 * @var string		district for city of address, only for normal delivery addresses (most private households)
	 * 					optional
	 */
	private $cityDistrict = null;
	
	/**
	 * @var string 		street of address
	 */
	private $str = null;
	
	/**
	 * @var string		housenumber of address
	 */
	private $hno = null;
	
	/**
	 * @var string 		secondaries (USA only)
	 */
	private $sec = null;
	
	/**
	 * @var string		street and housenumber, can be used alternatively for str and hno
	 */
	private $strHno = null;
	
	/**
	 * @var string		dependent street, side street
	 * 					if present content of str and hno will be ignored
	 * 					(UK and Portugal only)
	 */
	private $majorStr = null;
	
	/**
	 * @var string		name of an house, building or estate
	 */
	private $buildName = null;
	
	/**
	 * @var string		addition to @see $buildName
	 * 					(Canada and UK only)
	 */
	private $subBuildName = null;
	
	/**
	 * @var string		name of organisation or business
	 * 					(Canada and UK only)
	 */
	private $organisation = null;
	
	/**
	 * @var string		first line of an unformatted address
	 * 					optional
	 */
	private $line1 = null;
	
	/**
	 * @var string		second line of an unformatted address
	 * 					optional
	 */
	private $line2 = null;
	
	/**
	 * @var string		third line of an unformatted address
	 * 					optional
	 */
	private $line3 = null;
	
	/**
	 * @var string		fourth line of an unformatted address
	 * 					optional
	 */
	private $line4 = null;
	
	/**
	 * @var string		fifth line of an unformatted address
	 * 					optional
	 */
	private $line5 = null;
	
	/**
	 * @var string		sixth line of an unformatted address
	 * 					optional
	 */
	private $line6 = null;
	
	/**
	 * @var string 		country code of address, only for postbox addresses
	 * 					optional
	 */
	private $poBoxCountry = null;
	
	/**
	 * @var string		postcode of address, only for postbox addresses
	 * 					optional
	 */
	private $poBoxZip = null;
	/**
	 * @var string 		city of address, only for postbox addresses
	 * 					optional
	 */
	private $poBoxCity = null;
	
	/**
	 * @var string		postbox number of address, only for postbox addresses
	 * 					optional
	 */
	private $poBoxNumber = null;
	
	/**	
	 * @var string		country code for special addresses, for addresses with their own internal mailing distribution system
	 * 					optional
	 */
	private $specCountry = null;
	
	/**	
	 * @var string		postcode/zip code for special addresses, for addresses with their own internal mailing distribution system
	 * 					optional
	 */
	private $specZip = null;
	
	/**	
	 * @var string		city for special addresses, for addresses with their own internal mailing distribution system
	 * 					optional
	 */
	private $specCity = null;
	
	
	/*
	 * 
	 * 		GETTER AND SETTER
	 * 
	 */
	
	 /**
     * Returns $city.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$city
     */
    public function getCity() {
    	if($this->city == null)
			return "";
		else
        	return $this->city;
    }
    
    /**
     * Sets $city.
     *
     * @param object $city
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $cityDistrict.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$cityDistrict
     */
    public function getCityDistrict() {
    	if($this->cityDistrict == null)
			return "";
		else
        	return $this->cityDistrict;
    }
    
    /**
     * Sets $cityDistrict.
     *
     * @param object $cityDistrict
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$cityDistrict
     */
    public function setCityDistrict($cityDistrict) {
        $this->cityDistrict = $cityDistrict;
    }
    
    /**
     * Returns $country.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$country
     */
    public function getCountry() {
    	if($this->country == null)
			return "";
		else
       		return $this->country;
    }
    
    /**
     * Sets $country.
     *
     * @param object $country
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
    
    /**
     * Returns $line1.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line1
     */
    public function getLine1() {
    	if($this->line1 == null)
			return "";
		else
        	return $this->line1;
    }
    
    /**
     * Sets $line1.
     *
     * @param object $line1
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line1
     */
    public function setLine1($line1) {
        $this->line1 = $line1;
    }
    
    /**
     * Returns $line2.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line2
     */
    public function getLine2() {
    	if($this->line2 == null)
			return "";
		else
        	return $this->line2;
    }
    
    /**
     * Sets $line2.
     *
     * @param object $line2
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line2
     */
    public function setLine2($line2) {
        $this->line2 = $line2;
    }
    
    /**
     * Returns $line3.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line3
     */
    public function getLine3() {
    	if($this->line3 == null)
			return "";
		else
        	return $this->line3;
    }
    
    /**
     * Sets $line3.
     *
     * @param object $line3
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line3
     */
    public function setLine3($line3) {
        $this->line3 = $line3;
    }
    
    /**
     * Returns $line4.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line4
     */
    public function getLine4() {
    	if($this->line4 == null)
			return "";
		else
        	return $this->line4;
    }
    
    /**
     * Sets $line4.
     *
     * @param object $line4
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line4
     */
    public function setLine4($line4) {
        $this->line4 = $line4;
    }
    
    /**
     * Returns $line5.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line5
     */
    public function getLine5() {
    	if($this->line5 == null)
			return "";
		else
        	return $this->line5;
    }
    
    /**
     * Sets $line5.
     *
     * @param object $line5
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line5
     */
    public function setLine5($line5) {
        $this->line5 = $line5;
    }
    
    /**
     * Returns $line6.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line6
     */
    public function getLine6() {
    	if($this->line6 == null)
			return "";
		else
        	return $this->line6;
    }
    
    /**
     * Sets $line6.
     *
     * @param object $line6
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$line6
     */
    public function setLine6($line6) {
        $this->line6 = $line6;
    }
	
	/**
     * Returns $poBoxCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxCity
     */
    public function getPoBoxCity() {
    	if($this->poBoxCity == null)
			return "";
		else
        	return $this->poBoxCity;
    }
    
    /**
     * Sets $poBoxCity.
     *
     * @param object $poBoxCity
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxCity
     */
    public function setPoBoxCity($poBoxCity) {
        $this->poBoxCity = $poBoxCity;
    }
    
    /**
     * Returns $poBoxCountry.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxCountry
     */
    public function getPoBoxCountry() {
    	if($this->poBoxCountry == null)
			return "";
		else
        	return $this->poBoxCountry;
    }
    
    /**
     * Sets $poBoxCountry.
     *
     * @param object $poBoxCountry
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxCountry
     */
    public function setPoBoxCountry($poBoxCountry) {
        $this->poBoxCountry = $poBoxCountry;
    }
    
    /**
     * Returns $poBoxNumber.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxNumber
     */
    public function getPoBoxNumber() {
    	if($this->poBoxNumber == null)
			return "";
		else
        	return $this->poBoxNumber;
    }
    
    /**
     * Sets $poBoxNumber.
     *
     * @param object $poBoxNumber
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxNumber
     */
    public function setPoBoxNumber($poBoxNumber) {
        $this->poBoxNumber = $poBoxNumber;
    }
    
    /**
     * Returns $poBoxZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxZip
     */
    public function getPoBoxZip() {
    	if($this->poBoxZip == null)
			return "";
		else
        	return $this->poBoxZip;
    }
    
    /**
     * Sets $poBoxZip.
     *
     * @param object $poBoxZip
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$poBoxZip
     */
    public function setPoBoxZip($poBoxZip) {
        $this->poBoxZip = $poBoxZip;
    }
    
    /**
     * Returns $specCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$specCity
     */
    public function getSpecCity() {
    	if($this->specCity == null)
			return "";
		else
       	 	return $this->specCity;
    }
    
    /**
     * Sets $specCity.
     *
     * @param object $specCity
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$specCity
     */
    public function setSpecCity($specCity) {
        $this->specCity = $specCity;
    }
    
    /**
     * Returns $specCountry.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$specCountry
     */
    public function getSpecCountry() {
    	if($this->specCountry == null)
			return "";
		else
        	return $this->specCountry;
    }
    
    /**
     * Sets $specCountry.
     *
     * @param object $specCountry
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$specCountry
     */
    public function setSpecCountry($specCountry) {
        $this->specCountry = $specCountry;
    }
    
    /**
     * Returns $specZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$specZip
     */
    public function getSpecZip() {
    	if($this->specZip == null)
			return "";
		else
        	return $this->specZip;
    }
    
    /**
     * Sets $specZip.
     *
     * @param object $specZip
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$specZip
     */
    public function setSpecZip($specZip) {
        $this->specZip = $specZip;
    }
    
    /**
     * Returns $zip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$zip
     */
    public function getZip() {
    	if($this->zip == null)
			return "";
		else
        	return $this->zip;
    }
    
    /**
     * Sets $zip.
     *
     * @param object $zip
     * @see OrwellInternationalAddressCheckPoweredByUniservRequest::$zip
     */
    public function setZip($zip) {
        $this->zip = $zip;
    }

    
    /**
     * Returns $buildName.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$buildName
     */
    public function getBuildName() {
    	if($this->buildName == null)
			return "";
		else
        	return $this->buildName;
    }
    
    /**
     * Sets $buildName.
     *
     * @param object $buildName
     * @see OrwellInternationalAddressCheckInputAddress::$buildName
     */
    public function setBuildName($buildName) {
        $this->buildName = $buildName;
    }
    
    /**
     * Returns $hno.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$hno
     */
    public function getHno() {
    	if($this->hno == null)
			return "";
		else
        	return $this->hno;
    }
    
    /**
     * Sets $hno.
     *
     * @param object $hno
     * @see OrwellInternationalAddressCheckInputAddress::$hno
     */
    public function setHno($hno) {
        $this->hno = $hno;
    }
    
    /**
     * Returns $majorStr.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$majorStr
     */
    public function getMajorStr() {
    	if($this->majorStr == null)
			return "";
		else
        	return $this->majorStr;
    }
    
    /**
     * Sets $majorStr.
     *
     * @param object $majorStr
     * @see OrwellInternationalAddressCheckInputAddress::$majorStr
     */
    public function setMajorStr($majorStr) {
        $this->majorStr = $majorStr;
    }
    
    /**
     * Returns $organisation.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$organisation
     */
    public function getOrganisation() {
    	if($this->organisation == null)
			return "";
		else
        	return $this->organisation;
    }
    
    /**
     * Sets $organisation.
     *
     * @param object $organisation
     * @see OrwellInternationalAddressCheckInputAddress::$organisation
     */
    public function setOrganisation($organisation) {
        $this->organisation = $organisation;
    }
    
    /**
     * Returns $sec.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$sec
     */
    public function getSec() {
    	if($this->sec == null)
			return "";
		else
        	return $this->sec;
    }
    
    /**
     * Sets $sec.
     *
     * @param object $sec
     * @see OrwellInternationalAddressCheckInputAddress::$sec
     */
    public function setSec($sec) {
        $this->sec = $sec;
    }
    
    /**
     * Returns $state.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$state
     */
    public function getState() {
    	if($this->state == null)
			return "";
		else
        	return $this->state;
    }
    
    /**
     * Sets $state.
     *
     * @param object $state
     * @see OrwellInternationalAddressCheckInputAddress::$state
     */
    public function setState($state) {
        $this->state = $state;
    }
    
    /**
     * Returns $str.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$str
     */
    public function getStr() {
    	if($this->str == null)
			return "";
		else
       		return $this->str;
    }
    
    /**
     * Sets $str.
     *
     * @param object $str
     * @see OrwellInternationalAddressCheckInputAddress::$str
     */
    public function setStr($str) {
        $this->str = $str;
    }
    
    /**
     * Returns $strHno.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$strHno
     */
    public function getStrHno() {
    	if($this->strHno == null)
			return "";
		else
        	return $this->strHno;
    }
    
    /**
     * Sets $strHno.
     *
     * @param object $strHno
     * @see OrwellInternationalAddressCheckInputAddress::$strHno
     */
    public function setStrHno($strHno) {
        $this->strHno = $strHno;
    }
    
    /**
     * Returns $subBuildName.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$subBuildName
     */
    public function getSubBuildName() {
    	if($this->subBuildName == null)
			return "";
		else
        	return $this->subBuildName;
    }
    
    /**
     * Sets $subBuildName.
     *
     * @param object $subBuildName
     * @see OrwellInternationalAddressCheckInputAddress::$subBuildName
     */
    public function setSubBuildName($subBuildName) {
        $this->subBuildName = $subBuildName;
    }
    
    /**
     * Returns $zipAddOn.
     *
     * @see OrwellInternationalAddressCheckInputAddress::$zipAddOn
     */
    public function getZipAddOn() {
    	if($this->zipAddOn == null)
			return "";
		else
        	return $this->zipAddOn;
    }
    
    /**
     * Sets $zipAddOn.
     *
     * @param object $zipAddOn
     * @see OrwellInternationalAddressCheckInputAddress::$zipAddOn
     */
    public function setZipAddOn($zipAddOn) {
        $this->zipAddOn = $zipAddOn;
    }
    }
?>