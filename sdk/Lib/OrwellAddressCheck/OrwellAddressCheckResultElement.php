<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellAddressCheckResultElement {
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string 		Identification number of area in Database of Deutsche Post
	 */
	private $alort = null;
	
	/**
	 * @var string		number for route determination 
	 */
	private $cargoCode = null;
	
	/**
	 * @var string		a city similar or equal to input value for city
	 */
	private $city = null;
	
	/**
	 * @var string 		the old city name
	 * 					for example the input value of city if it was correct but doesn't exist any 
	 * 					longer under that name	
	 */
	private $cityOld = null;
	
	/**
	 * @var string		the district for the specified postCode, city, street combination defined by
	 * 					the other fields
	 * 					can be empty
	 */
	private $district = null;
	
	/**
	 * @var string	 	german federal state to which the postCode belongs
	 */
	private $federalState = null;
	
	/**
	 * @var string		the firstname
	 * 					identical to input value if the type of the address is different from 'G'
	 * 					otherwise probably changed
	 */
	private $firstName = null;
	
	/**
	 * @var string		similarity value of the described address compared to input address
	 */
	private $fuzzyValue = null;
	
	/**
	 * @var string		the housenumber if it was present in the input address
	 */
	private $houseNumber = null;
	
	/**
	 * @var string		the lastname
	 *					identical to input value if the type of the address is different from 'G'
	 * 					otherwise probably changed
	 */
	private $lastName = null;
	
	/**
	 * @var string		the post box number if the address type is 'P' else it is empty
	 */
	private $pobNumber = null;
	
	/**
	 * @var string		a postcode similar or equal to input value for postcode
	 */
	private $postCode = null;
	
	/**
	 * @var string		a street similar or equal to input value for street
	 */
	private $street = null;
	
	/**
	 * @var string		a identification number for the specified street
	 * 					unique only within ALORT and POSTCODE area
	 */
	private $streetKey = null;
	
	/**
	 * @var string		the old street name
	 * 					for example the input value of street if it was correct but doesn't exist any 
	 * 					longer under that name	
	 */
	private $streetOld = null;
	
	/**
	 * @var string	 	type of returned address
	 * 					possible values:
	 * 					-	D : Delivery Address (most private households)
	 * 					- 	P : Postbox Address 
	 * 					- 	G : Address for a delivery station that itself will distribute the 
	 * 							mailing any further
	 */
	private $type = null;	
	
	/*
	 *
	 * 		GETTER AND SETTER
	 * 
	 */
	
    /**
     * Returns $alort.
     *
     * @see OrwellAddressCheckResultElement::$alort
     */
    public function getAlort() {
    	if($this->alort == null)
			return "";
		else
        	return $this->alort;
    }
    
    /**
     * Sets $alort.
     *
     * @param object $alort
     * @see OrwellAddressCheckResultElement::$alort
     */
    public function setAlort($alort) {
        $this->alort = $alort;
    }
    
    /**
     * Returns $cargoCode.
     *
     * @see OrwellAddressCheckResultElement::$cargoCode
     */
    public function getCargoCode() {
    	if($this->cargoCode == null)
			return "";
		else
        	return $this->cargoCode;
    }
    
    /**
     * Sets $cargoCode.
     *
     * @param object $cargoCode
     * @see OrwellAddressCheckResultElement::$cargoCode
     */
    public function setCargoCode($cargoCode) {
        $this->cargoCode = $cargoCode;
    }
    
    /**
     * Returns $city.
     *
     * @see OrwellAddressCheckResultElement::$city
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
     * @see OrwellAddressCheckResultElement::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $cityOld.
     *
     * @see OrwellAddressCheckResultElement::$cityOld
     */
    public function getCityOld() {
    	if($this->cityOld == null)
			return "";
		else
        	return $this->cityOld;
    }
    
    /**
     * Sets $cityOld.
     *
     * @param object $cityOld
     * @see OrwellAddressCheckResultElement::$cityOld
     */
    public function setCityOld($cityOld) {
        $this->cityOld = $cityOld;
    }
    
    /**
     * Returns $district.
     *
     * @see OrwellAddressCheckResultElement::$district
     */
    public function getDistrict() {
    	if($this->district == null)
			return "";
		else
        	return $this->district;
    }
    
    /**
     * Sets $district.
     *
     * @param object $district
     * @see OrwellAddressCheckResultElement::$district
     */
    public function setDistrict($district) {
        $this->district = $district;
    }
    
    /**
     * Returns $federalState.
     *
     * @see OrwellAddressCheckResultElement::$federalState
     */
    public function getFederalState() {
    	if($this->federalState == null)
			return "";
		else
        	return $this->federalState;
    }
    
    /**
     * Sets $federalState.
     *
     * @param object $federalState
     * @see OrwellAddressCheckResultElement::$federalState
     */
    public function setFederalState($federalState) {
        $this->federalState = $federalState;
    }
    
    /**
     * Returns $firstName.
     *
     * @see OrwellAddressCheckResultElement::$firstName
     */
    public function getFirstName() {
    	if($this->firstName == null)
			return "";
		else
        	return $this->firstName;
    }
    
    /**
     * Sets $firstName.
     *
     * @param object $firstName
     * @see OrwellAddressCheckResultElement::$firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    
    /**
     * Returns $fuzzyValue.
     *
     * @see OrwellAddressCheckResultElement::$fuzzyValue
     */
    public function getFuzzyValue() {
    	if($this->fuzzyValue == null)
			return "";
		else
        	return $this->fuzzyValue;
    }
    
    /**
     * Sets $fuzzyValue.
     *
     * @param object $fuzzyValue
     * @see OrwellAddressCheckResultElement::$fuzzyValue
     */
    public function setFuzzyValue($fuzzyValue) {
        $this->fuzzyValue = $fuzzyValue;
    }
    
    /**
     * Returns $houseNumber.
     *
     * @see OrwellAddressCheckResultElement::$houseNumber
     */
    public function getHouseNumber() {
    	if($this->houseNumber == null)
			return "";
		else
        	return $this->houseNumber;
    }
    
    /**
     * Sets $houseNumber.
     *
     * @param object $houseNumber
     * @see OrwellAddressCheckResultElement::$houseNumber
     */
    public function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }
    
    /**
     * Returns $lastName.
     *
     * @see OrwellAddressCheckResultElement::$lastName
     */
    public function getLastName() {
    	if($this->lastName == null)
			return "";
		else
        	return $this->lastName;
    }
    
    /**
     * Sets $lastName.
     *
     * @param object $lastName
     * @see OrwellAddressCheckResultElement::$lastName
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    
    /**
     * Returns $pobNumber.
     *
     * @see OrwellAddressCheckResultElement::$pobNumber
     */
    public function getPobNumber() {
    	if($this->pobNumber == null)
			return "";
		else
        	return $this->pobNumber;
    }
    
    /**
     * Sets $pobNumber.
     *
     * @param object $pobNumber
     * @see OrwellAddressCheckResultElement::$pobNumber
     */
    public function setPobNumber($pobNumber) {
        $this->pobNumber = $pobNumber;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellAddressCheckResultElement::$postCode
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
     * @see OrwellAddressCheckResultElement::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
    
    /**
     * Returns $street.
     *
     * @see OrwellAddressCheckResultElement::$street
     */
    public function getStreet() {
    	if($this->street == null)
			return "";
		else
        	return $this->street;
    }
    
    /**
     * Sets $street.
     *
     * @param object $street
     * @see OrwellAddressCheckResultElement::$street
     */
    public function setStreet($street) {
        $this->street = $street;
    }
    
    /**
     * Returns $streetKey.
     *
     * @see OrwellAddressCheckResultElement::$streetKey
     */
    public function getStreetKey() {
    	if($this->streetKey == null)
			return "";
		else
        	return $this->streetKey;
    }
    
    /**
     * Sets $streetKey.
     *
     * @param object $streetKey
     * @see OrwellAddressCheckResultElement::$streetKey
     */
    public function setStreetKey($streetKey) {
        $this->streetKey = $streetKey;
    }
    
    /**
     * Returns $streetOld.
     *
     * @see OrwellAddressCheckResultElement::$streetOld
     */
    public function getStreetOld() {
    	if($this->streetOld == null)
			return "";
		else
        	return $this->streetOld;
    }
    
    /**
     * Sets $streetOld.
     *
     * @param object $streetOld
     * @see OrwellAddressCheckResultElement::$streetOld
     */
    public function setStreetOld($streetOld) {
        $this->streetOld = $streetOld;
    }
    
    /**
     * Returns $type.
     *
     * @see OrwellAddressCheckResultElement::$type
     */
    public function getType() {
    	if($this->type == null)
			return "";
		else
        	return $this->type;
    }
    
    /**
     * Sets $type.
     *
     * @param object $type
     * @see OrwellAddressCheckResultElement::$type
     */
    public function setType($type) {
        $this->type = $type;
    }
}
?>