<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellAddressCheckRequest {
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
    /**
	 * @type string
	 * @var tid - Transaction ID
	 */
	private $tid = null;

	/**
	 * @type string
	 * @var firstName 	- 	firstName for the addressCheck request 
	 * 						only taken into account if postCode is of (special) type G
	 */
	private $firstName = null;
	
	/**
	 * @type string
	 * @var lastName 	- 	lastName for the addressCheck request
	 * 						only taken into account if postCode is of (special) type G
	 */
	private $lastName = null;
	
	/**
	 * @type string
	 * @var postCode	-	postCode input value
	 * 						optional if city is specified
	 */
	private $postCode = null;
	
	/**
	 * @type string
	 * @var city		- 	city input value
	 * 						optional if postCode is specified
	 */
	private $city = null;
	
	/**
	 * @type
	 * @var district	-	district input value
	 * 						optional
	 * 						not taken into account for correction, only checked 
	 * 						for existence and correct spelling
	 */
	private $district = null;
	
	/**
	 * @type string
	 * @var street 		-	street input value
	 * 						mandatory
	 */
	private $street = null;
	
	/**
	 * @type string
	 * @var houseNumber	-	housenumber input value
	 * 						optional
	 * 						only relevent if street runs through different postCode
	 * 						areas
	 */
	private $houseNumber = null;
	
	/**
	 * @type string
	 * @var pobNumber 	-	postBox input value
	 * 						optional
	 */
	private $pobNumber = null;
	
	/**
	 * @type string
	 * @var postCodeSim	-	similarity threshold for postCodes
	 */
	private $postCodeSim = null;
	
	/**
	 * @type string
	 * @var citySim 	- 	similarity threshold for cities
	 */
	private $citySim = null;
	
	/**
	 * type string
	 * @var streetSim 	-	similarity threshold for streets
	 */
	private $streetSim = null;
	
	/**
	 * @type string
	 * @var addressCorrigible 	-	similarity threshold for whole address
	 */
	private $addressCorrigible = null;
	
	/**
	 * @type string
	 * @var addressMultiHit		-	specifies minimal distance of second-best to best result so
	 * 								needed to say that the best result is the wanted one
	 */
	private $addressMultiHit = null;
	
	/**
	 * @type string
	 * @var maxHits		-	maximum number of results returned
	 */
	private $maxHits = null;
	
	/**
	 * @type string
	 * @var search 		-	type of search to modify fuzzy evaluation of whole address
	 * 						possible values:
	 * 							- city	: 	the returned result will be the one which city input is the
	 * 										nearest to the results' city value
	 * 							- street: 	the returned result will be the one which street input is
	 * 										nearest to the result's street value
	 */
	private $search = null;
	
	/**
	 * @type string
	 * @var sort	-	sorting of results returned
	 * 					possible values:
	 * 							- 0	: sorted by fuzzy value
	 */
	private $sort = null;
	
	/**
	 * @var encoding	-	type of encoding
	 * 						not functional yet 
	 */
	private $encoding = null;
	
	
	/*
	 * 
	 * 		GETTER AND SETTERS
	 * 
	 */
	
	/**
     * Returns $addressCorrigible.
     *
     * @see OrwellAddressCheckRequest::$addressCorrigible
     */
    public function getAddressCorrigible() {
    	if($this->addressCorrigible == null)
			return "";
		else
        	return $this->addressCorrigible;
    }
    
    /**
     * Sets $addressCorrigible.
     *
     * @param object $addressCorrigible
     * @see OrwellAddressCheckRequest::$addressCorrigible
     */
    public function setAddressCorrigible($addressCorrigible) {
        $this->addressCorrigible = $addressCorrigible;
    }
    
    /**
     * Returns $addressMultiHit.
     *
     * @see OrwellAddressCheckRequest::$addressMultiHit
     */
    public function getAddressMultiHit() {
    	if($this->addressMultiHit == null)
			return "";
		else
        	return $this->addressMultiHit;
    }
    
    /**
     * Sets $addressMultiHit.
     *
     * @param object $addressMultiHit
     * @see OrwellAddressCheckRequest::$addressMultiHit
     */
    public function setAddressMultiHit($addressMultiHit) {
        $this->addressMultiHit = $addressMultiHit;
    }
    
    /**
     * Returns $city.
     *
     * @see OrwellAddressCheckRequest::$city
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
     * @see OrwellAddressCheckRequest::$city
     */
    public function setCity($city) {
        $this->city = $city;
    }
    
    /**
     * Returns $citySim.
     *
     * @see OrwellAddressCheckRequest::$citySim
     */
    public function getCitySim() {
    	if($this->citySim == null)
			return "";
		else
       	 return $this->citySim;
    }
    
    /**
     * Sets $citySim.
     *
     * @param object $citySim
     * @see OrwellAddressCheckRequest::$citySim
     */
    public function setCitySim($citySim) {
        $this->citySim = $citySim;
    }
    
    /**
     * Returns $district.
     *
     * @see OrwellAddressCheckRequest::$district
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
     * @see OrwellAddressCheckRequest::$district
     */
    public function setDistrict($district) {
        $this->district = $district;
    }
    
    /**
     * Returns $encoding.
     *
     * @see OrwellAddressCheckRequest::$encoding
     */
    public function getEncoding() {
    	if($this->encoding == null)
			return "";
		else
        	return $this->encoding;
    }
    
    /**
     * Sets $encoding.
     *
     * @param object $encoding
     * @see OrwellAddressCheckRequest::$encoding
     */
    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }
    
    /**
     * Returns $firstName.
     *
     * @see OrwellAddressCheckRequest::$firstName
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
     * @see OrwellAddressCheckRequest::$firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    
    /**
     * Returns $houseNumber.
     *
     * @see OrwellAddressCheckRequest::$houseNumber
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
     * @see OrwellAddressCheckRequest::$houseNumber
     */
    public function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }
    
    /**
     * Returns $lastName.
     *
     * @see OrwellAddressCheckRequest::$lastName
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
     * @see OrwellAddressCheckRequest::$lastName
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    
    /**
     * Returns $maxHits.
     *
     * @see OrwellAddressCheckRequest::$maxHits
     */
    public function getMaxHits() {
    	if($this->maxHits == null)
			return "";
		else
        	return $this->maxHits;
    }
    
    /**
     * Sets $maxHits.
     *
     * @param object $maxHits
     * @see OrwellAddressCheckRequest::$maxHits
     */
    public function setMaxHits($maxHits) {
        $this->maxHits = $maxHits;
    }
    
    /**
     * Returns $pobNumber.
     *
     * @see OrwellAddressCheckRequest::$pobNumber
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
     * @see OrwellAddressCheckRequest::$pobNumber
     */
    public function setPobNumber($pobNumber) {
        $this->pobNumber = $pobNumber;
    }
    
    /**
     * Returns $postCode.
     *
     * @see OrwellAddressCheckRequest::$postCode
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
     * @see OrwellAddressCheckRequest::$postCode
     */
    public function setPostCode($postCode) {
        $this->postCode = $postCode;
    }
    
    /**
     * Returns $postCodeSim.
     *
     * @see OrwellAddressCheckRequest::$postCodeSim
     */
    public function getPostCodeSim() {
    	if($this->postCodeSim == null)
			return "";
		else
        	return $this->postCodeSim;
    }
    
    /**
     * Sets $postCodeSim.
     *
     * @param object $postCodeSim
     * @see OrwellAddressCheckRequest::$postCodeSim
     */
    public function setPostCodeSim($postCodeSim) {
        $this->postCodeSim = $postCodeSim;
    }
    
    /**
     * Returns $search.
     *
     * @see OrwellAddressCheckRequest::$search
     */
    public function getSearch() {
    	if($this->search == null)
			return "";
		else
        	return $this->search;
    }
    
    /**
     * Sets $search.
     *
     * @param object $search
     * @see OrwellAddressCheckRequest::$search
     */
    public function setSearch($search) {
        $this->search = $search;
    }
    
    /**
     * Returns $sort.
     *
     * @see OrwellAddressCheckRequest::$sort
     */
    public function getSort() {
    	if($this->sort == null)
			return "";
		else
        	return $this->sort;
    }
    
    /**
     * Sets $sort.
     *
     * @param object $sort
     * @see OrwellAddressCheckRequest::$sort
     */
    public function setSort($sort) {
        $this->sort = $sort;
    }
    
    /**
     * Returns $street.
     *
     * @see OrwellAddressCheckRequest::$street
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
     * @see OrwellAddressCheckRequest::$street
     */
    public function setStreet($street) {
        $this->street = $street;
    }
    
    /**
     * Returns $streetSim.
     *
     * @see OrwellAddressCheckRequest::$streetSim
     */
    public function getStreetSim() {
    	if($this->streetSim == null)
			return "";
		else
        	return $this->streetSim;
    }
    
    /**
     * Sets $streetSim.
     *
     * @param object $streetSim
     * @see OrwellAddressCheckRequest::$streetSim
     */
    public function setStreetSim($streetSim) {
        $this->streetSim = $streetSim;
    }
    
    /**
     * Returns $tid.
     *
     * @see OrwellAddressCheckRequest::$tid
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
     * @see OrwellAddressCheckRequest::$tid
     */
    public function setTid($tid) {
        $this->tid = $tid;
    }
}

?>