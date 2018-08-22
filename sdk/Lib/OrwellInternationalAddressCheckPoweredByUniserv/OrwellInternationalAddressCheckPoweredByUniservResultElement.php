<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInternationalAddressCheckPoweredByUniservResultElement extends OrwellInternationalAddressCheckPoweredByUniservInputAddress{
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 *  
	 */
	
	/**
	 * @var string		X-Coordinate
	 * 					optional
	 */
	private $xCoordinate = null;
	
	/**
	 * @var string		Y-Coordinate
	 * 					optional
	 */
	private $yCoordinate = null;
	
	/**
	 * @var string		level on which coordinates have been determined+
	 * 					optional
	 */
	private $coordinateLevel = null;
	
	/**
	 * @var string		indicator whether check has been executed on houselevel
	 * 					optional
	 */
	private $hnoMatch = null;
	
	/**
	 * @var string		similarity for city in output compared to input city
	 * 					optional
	 */
	private $mvalCity = null;
	
	/**
	 * @var string		similarity for street in output compared to input street
	 * 					optional
	 */
	private $mvalStr = null;
	
	/**
	 * @var string		indicator for result on city, only for normal delivery addresses (most private households)
	 * 					optional 
	 */
	private $resCity = null;
	
	/**
	 * @var string		indicator for result on cityDisrict, only for normal delivery addresses (most private households)
	 *					optional 
	 */
	private $resCityDistrict = null;
	
	/**
	 * @var string		indicator for result on region, only for normal delivery addresses (most private households) 
	 */
	private $resRegion = null;
	
	/**
	 * @var string		indicator for result on street, only for normal delivery addresses (most private households)
	 */
	private $resStr = null;
	
	/**
	 * @var string		indicator for result on postcode/zip code, only for normal delivery addresses (most private households)		
	 */
	private $resZip = null;
	
	/**
	 * @var string		indicator for result on housenumber, only for normal delivery addresses (most private households)
	 * 					optional
	 */
	private $resHno = null;
	
	/**
	 * @var string		indicator for result on city of postbox address, only for postbox addresses
	 * 					optional
	 */
	private $resPoBoxCity = null;
	
	/**
	 * @var string		indicator for result on postboxnumber of postbox address, only for postbox addressess
	 * 					optional
	 */
	private $resPoBoxNumber = null;
	
	/**
	 * @var string		indicator for result on postbox postcode/zip code, only for postbox addressess
	 * 					optional
	 */
	private $resPoBoxZip = null;
	
	/**
	 * @var string		indicator for result on city of special address, only for addresses with their own internal mailing distribution system
	 * 					optional
	 */
	private $resSpecCity = null;
	
	/**
	 * @var string		indicator for result on postcode/zip code of special addresses, only for addresses with their own internal mailing distribution system
	 * 					optional
	 */
	private $resSpecZip = null;
	
	/**
	 * @var int			indicator for a whole delivery address
	 * 					mandatory
	 */
	private $resultClass = null;
	
	/**
	 * @var int			indicator for geocoding
	 * 					mandatory
	 */
	private $resultCoordinateClass = null;
	
	/**
	 * @var int			indicator for a whole postbox address
	 * 					mandatory
	 */
	private $resultPoBoxClass = null;
	
	/**
	 * @var int 		indicator for a whole special address
	 * 					mandatory
	 */
	private $resultSpecClass = null;
	
	private $alternativeCity = null;
	private $alternativeStr = null;
	private $areaCensal = null;
	//private $buildingName = null;
	private $buildingType = null;
	private $buildingZip = null;
	private $carReg = null;
	private $carrierRoute = null;
	private $carrierSortInd = null;
	private $cityAbbrev = null;
	private $cityAdminCode = null;
	private $cityCode = null;
	private $cityDetail = null;
	private $cityDistrictCode = null;
	private $cityNorm = null;
	private $cityRegion = null;
	private $citySuffix = null;
	private $cityViable = null;
	private $community = null;
	private $communityCode = null;
	private $countryFull = null;
	private $countryIso2 = null;
	private $county = null;
	private $depDistrict = null;
	private $distrPrint = null;
	private $district = null;
	private $districtCode = null;
	private $dpvEtc = null;
	private $dpvValid = null;
	private $expireDays = null;
	private $floorNo = null;
	private $floorZip = null;
	private $freguesi = null;
	private $freguesiCode = null;
	private $hnoAddition = null;
	private $hnoCityCode = null;
	private $hnoCityDistrict = null;
	private $hnoNorm = null;
	private $hnoNum = null;
	private $hnoPos = null;
	private $hnoRange = null;
	private $hnoRistanti = null;
	private $hnoZip = null;
	private $icAdr = null;
	private $icArrd = null;
	private $langCode = null;
	private $line7 = null;
	private $mvalOrganisation = null;
	private $nielsen = null;
	private $predirStr = null;
	private $rdi = null;
	private $rdiEnhanced = null;
	private $region = null;
	private $regionCode = null;
	private $resAbbrev = null;
	private $resBuildName = null;
	private $resChange = null;
	private $resDepDistrict = null;
	private $resOrganisation = null;
	private $resPostField = null;
	private $resRef = null;
	private $resSec = null;
	private $resSubBuildName = null;
	private $resVariant = null;
	private $resZipAddOn = null;
	private $secTypFull = null;
	private $serialVersionUID = null;
	private $specIcCity = null;
	private $stateFull = null;
	private $strAbbrev = null;
	private $strKernel = null;
	private $strLangCode = null;
	private $strNo = null;
	private $strPostdir = null;
	private $strType = null;
	private $strZip = null;
	private $zipRange = null;
	private $zipSheme = null;
	private $zipType = null;

	
	/*
	 * 
	 * 		GETTER AND SETTER
	 * 
	 */
	
    /**
     * Returns $coordinateLevel.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$coordinateLevel
     */
    public function getCoordinateLevel() {
    	if($this->coordinateLevel == null)
			return "";
		else
        	return $this->coordinateLevel;
    }
    
    /**
     * Sets $coordinateLevel.
     *
     * @param object $coordinateLevel
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$coordinateLevel
     */
    public function setCoordinateLevel($coordinateLevel) {
        $this->coordinateLevel = $coordinateLevel;
    }
    
    /**
     * Returns $hnoMatch.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoMatch
     */
    public function getHnoMatch() {
    	if($this->hnoMatch == null)
			return "";
		else
        	return $this->hnoMatch;
    }
    
    /**
     * Sets $hnoMatch.
     *
     * @param object $hnoMatch
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoMatch
     */
    public function setHnoMatch($hnoMatch) {
        $this->hnoMatch = $hnoMatch;
    }
    
    /**
     * Returns $mValCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$mValCity
     */
    public function getMvalCity() {
    	if($this->mvalCity == null)
			return "";
		else
        	return $this->mvalCity;
    }
    
    /**
     * Sets $mValCity.
     *
     * @param object $mValCity
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$mValCity
     */
    public function setMvalCity($mvalCity) {
        $this->mvalCity = $mvalCity;
    }
    
    /**
     * Returns $mValStret.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$mValStret
     */
    public function getMvalStr() {
    	if($this->mvalStr == null)
			return "";
		else
        	return $this->mvalStr;
    }
    
    /**
     * Sets $mValStret.
     *
     * @param object $mValStret
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$mValStret
     */
    public function setMvalStr($mvalStr) {
        $this->mvalStr = $mvalStr;
    }
    
    /**
     * Returns $resCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resCity
     */
    public function getResCity() {
    	if($this->resCity == null)
			return "";
		else
        	return $this->resCity;
    }
    
    /**
     * Sets $resCity.
     *
     * @param object $resCity
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resCity
     */
    public function setResCity($resCity) {
        $this->resCity = $resCity;
    }
    
    /**
     * Returns $resCityDistrict.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resCityDistrict
     */
    public function getResCityDistrict() {
    	if($this->resCityDistrict == null)
			return "";
		else
        	return $this->resCityDistrict;
    }
    
    /**
     * Sets $resCityDistrict.
     *
     * @param object $resCityDistrict
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resCityDistrict
     */
    public function setResCityDistrict($resCityDistrict) {
        $this->resCityDistrict = $resCityDistrict;
    }
    
    /**
     * Returns $resHno.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resHno
     */
    public function getResHno() {
    	if($this->resHno == null)
			return "";
		else
        	return $this->resHno;
    }
    
    /**
     * Sets $resHno.
     *
     * @param object $resHno
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resHno
     */
    public function setResHno($resHno) {
        $this->resHno = $resHno;
    }
    
    /**
     * Returns $resPoBoxCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPoBoxCity
     */
    public function getResPoBoxCity() {
    	if($this->resPoBoxCity == null)
			return "";
		else
        	return $this->resPoBoxCity;
    }
    
    /**
     * Sets $resPoBoxCity.
     *
     * @param object $resPoBoxCity
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPoBoxCity
     */
    public function setResPoBoxCity($resPoBoxCity) {
        $this->resPoBoxCity = $resPoBoxCity;
    }
    
    /**
     * Returns $resPoBoxNumber.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPoBoxNumber
     */
    public function getResPoBoxNumber() {
    	if($this->resPoBoxNumber == null)
			return "";
		else
        	return $this->resPoBoxNumber;
    }
    
    /**
     * Sets $resPoBoxNumber.
     *
     * @param object $resPoBoxNumber
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPoBoxNumber
     */
    public function setResPoBoxNumber($resPoBoxNumber) {
        $this->resPoBoxNumber = $resPoBoxNumber;
    }
    
    /**
     * Returns $resRegion.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resRegion
     */
    public function getResRegion() {
    	if($this->resRegion == null)
			return "";
		else
        	return $this->resRegion;
    }
    
    /**
     * Sets $resRegion.
     *
     * @param object $resRegion
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resRegion
     */
    public function setResRegion($resRegion) {
        $this->resRegion = $resRegion;
    }
    
    /**
     * Returns $resSpecCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSpecCity
     */
    public function getResSpecCity() {
    	if($this->resSpecCity == null)
			return "";
		else
        	return $this->resSpecCity;
    }
    
    /**
     * Sets $resSpecCity.
     *
     * @param object $resSpecCity
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSpecCity
     */
    public function setResSpecCity($resSpecCity) {
        $this->resSpecCity = $resSpecCity;
    }
    
    /**
     * Returns $resSpecZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSpecZip
     */
    public function getResSpecZip() {
    	if($this->resSpecZip == null)
			return "";
		else
        	return $this->resSpecZip;
    }
    
    /**
     * Sets $resSpecZip.
     *
     * @param object $resSpecZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSpecZip
     */
    public function setResSpecZip($resSpecZip) {
        $this->resSpecZip = $resSpecZip;
    }
    
    /**
     * Returns $resStr.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resStr
     */
    public function getResStr() {
    	if($this->resStr == null)
			return "";
		else
        	return $this->resStr;
    }
    
    /**
     * Sets $resStr.
     *
     * @param object $resStr
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resStr
     */
    public function setResStr($resStr) {
        $this->resStr = $resStr;
    }
    
    /**
     * Returns $resZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resZip
     */
    public function getResZip() {
    	if($this->resZip == null)
			return "";
		else
        	return $this->resZip;
    }
    
    /**
     * Sets $resZip.
     *
     * @param object $resZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resZip
     */
    public function setResZip($resZip) {
        $this->resZip = $resZip;
    }
    
    /**
     * Returns $resultClass.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultClass
     */
    public function getResultClass() {
    	if($this->resultClass == null)
			return "";
		else
        	return $this->resultClass;
    }
    
    /**
     * Sets $resultClass.
     *
     * @param object $resultClass
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultClass
     */
    public function setResultClass($resultClass) {
        $this->resultClass = $resultClass;
    }
    
    /**
     * Returns $resultCoordinateClass.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultCoordinateClass
     */
    public function getResultCoordinateClass() {
    	if($this->resultCoordinateClass == null)
			return "";
		else
        	return $this->resultCoordinateClass;
    }
    
    /**
     * Sets $resultCoordinateClass.
     *
     * @param object $resultCoordinateClass
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultCoordinateClass
     */
    public function setResultCoordinateClass($resultCoordinateClass) {
        $this->resultCoordinateClass = $resultCoordinateClass;
    }
    
    /**
     * Returns $resultPoBoxClass.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultPoBoxClass
     */
    public function getResultPoBoxClass() {
    	if($this->resultPoBoxClass == null)
			return "";
		else
        	return $this->resultPoBoxClass;
    }
    
    /**
     * Sets $resultPoBoxClass.
     *
     * @param object $resultPoBoxClass
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultPoBoxClass
     */
    public function setResultPoBoxClass($resultPoBoxClass) {
        $this->resultPoBoxClass = $resultPoBoxClass;
    }
    
    /**
     * Returns $resultSpecClass.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultSpecClass
     */
    public function getResultSpecClass() {
    	if($this->resultSpecClass == null)
			return "";
		else
        	return $this->resultSpecClass;
    }
    
    /**
     * Sets $resultSpecClass.
     *
     * @param object $resultSpecClass
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resultSpecClass
     */
    public function setResultSpecClass($resultSpecClass) {
        $this->resultSpecClass = $resultSpecClass;
    }
    
    /**
     * Returns $xCoordinate.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$xCoordinate
     */
    public function getXCoordinate() {
    	if($this->xCoordinate == null)
			return "";
		else
        	return $this->xCoordinate;
    }
    
    /**
     * Sets $xCoordinate.
     *
     * @param object $xCoordinate
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$xCoordinate
     */
    public function setXCoordinate($xCoordinate) {
        $this->xCoordinate = $xCoordinate;
    }
    
    /**
     * Returns $yCoordinate.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$yCoordinate
     */
    public function getYCoordinate() {
    	if($this->yCoordinate == null)
			return "";
		else
        	return $this->yCoordinate;
    }
    
    /**
     * Sets $yCoordinate.
     *
     * @param object $yCoordinate
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$yCoordinate
     */
    public function setYCoordinate($yCoordinate) {
        $this->yCoordinate = $yCoordinate;
    }
    
    /**
     * Returns $resPoBoxZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPoBoxZip
     */
    public function getResPoBoxZip() {
    	if($this->resPoBoxZip == null)
			return "";
		else
        	return $this->resPoBoxZip;
    }
    
    /**
     * Sets $resPoBoxZip.
     *
     * @param object $resPoBoxZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPoBoxZip
     */
    public function setResPoBoxZip($resPoBoxZip) {
        $this->resPoBoxZip = $resPoBoxZip;
    }
    
    
    /**
     * Returns $alternativeCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$alternativeCity
     */
    public function getAlternativeCity() {
    	if($this->alternativeCity == null)
			return "";
		else
        	return $this->alternativeCity;
    }
    
    /**
     * Sets $alternativeCity.
     *
     * @param object $alternativeCity
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$alternativeCity
     */
    public function setAlternativeCity($alternativeCity) {
        $this->alternativeCity = $alternativeCity;
    }
    
    /**
     * Returns $alternativeStr.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$alternativeStr
     */
    public function getAlternativeStr() {
    	if($this->alternativeStr == null)
			return "";
		else
        	return $this->alternativeStr;
    }
    
    /**
     * Sets $alternativeStr.
     *
     * @param object $alternativeStr
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$alternativeStr
     */
    public function setAlternativeStr($alternativeStr) {
        $this->alternativeStr = $alternativeStr;
    }
    
    /**
     * Returns $areaCensal.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$areaCensal
     */
    public function getAreaCensal() {
    	if($this->areaCensal == null)
			return "";
		else
        	return $this->areaCensal;
    }
    
    /**
     * Sets $areaCensal.
     *
     * @param object $areaCensal
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$areaCensal
     */
    public function setAreaCensal($areaCensal) {
        $this->areaCensal = $areaCensal;
    }
    
    /**
     * Returns $buildingName.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$buildingName
     */
    public function getBuildingName() {
	   	return $this->getBuildName();
    }
    
    /**
     * Sets $buildingName.
     *
     * @param object $buildingName
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$buildingName
     */
    public function setBuildingName($buildingName) {
        $this->setBuildName($buildingName);
    }
    
    /**
     * Returns $buildingType.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$buildingType
     */
    public function getBuildingType() {
    	if($this->buildingType == null)
			return "";
		else
        	return $this->buildingType;
    }
    
    /**
     * Sets $buildingType.
     *
     * @param object $buildingType
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$buildingType
     */
    public function setBuildingType($buildingType) {
        $this->buildingType = $buildingType;
    }
    
    /**
     * Returns $buildingZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$buildingZip
     */
    public function getBuildingZip() {
    	if($this->buildingZip == null)
			return "";
		else
        	return $this->buildingZip;
    }
    
    /**
     * Sets $buildingZip.
     *
     * @param object $buildingZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$buildingZip
     */
    public function setBuildingZip($buildingZip) {
        $this->buildingZip = $buildingZip;
    }
    
    /**
     * Returns $carReg.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$carReg
     */
    public function getCarReg() {
    	if($this->carReg == null)
			return "";
		else
        	return $this->carReg;
    }
    
    /**
     * Sets $carReg.
     *
     * @param object $carReg
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$carReg
     */
    public function setCarReg($carReg) {
        $this->carReg = $carReg;
    }
    
    /**
     * Returns $carrierRoute.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$carrierRoute
     */
    public function getCarrierRoute() {
    	if($this->carrierRoute == null)
			return "";
		else
        	return $this->carrierRoute;
    }
    
    /**
     * Sets $carrierRoute.
     *
     * @param object $carrierRoute
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$carrierRoute
     */
    public function setCarrierRoute($carrierRoute) {
        $this->carrierRoute = $carrierRoute;
    }
    
    /**
     * Returns $carrierSortInd.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$carrierSortInd
     */
    public function getCarrierSortInd() {
    	if($this->carrierSortInd == null)
			return "";
		else
        	return $this->carrierSortInd;
    }
    
    /**
     * Sets $carrierSortInd.
     *
     * @param object $carrierSortInd
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$carrierSortInd
     */
    public function setCarrierSortInd($carrierSortInd) {
        $this->carrierSortInd = $carrierSortInd;
    }
    
    /**
     * Returns $cityAbbrev.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityAbbrev
     */
    public function getCityAbbrev() {
    	if($this->cityAbbrev == null)
			return "";
		else
        	return $this->cityAbbrev;
    }
    
    /**
     * Sets $cityAbbrev.
     *
     * @param object $cityAbbrev
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityAbbrev
     */
    public function setCityAbbrev($cityAbbrev) {
        $this->cityAbbrev = $cityAbbrev;
    }
    
    /**
     * Returns $cityAdminCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityAdminCode
     */
    public function getCityAdminCode() {
    	if($this->cityAdminCode == null)
			return "";
		else
        	return $this->cityAdminCode;
    }
    
    /**
     * Sets $cityAdminCode.
     *
     * @param object $cityAdminCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityAdminCode
     */
    public function setCityAdminCode($cityAdminCode) {
        $this->cityAdminCode = $cityAdminCode;
    }
    
    /**
     * Returns $cityCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityCode
     */
    public function getCityCode() {
    	if($this->cityCode == null)
			return "";
		else
        	return $this->cityCode;
    }
    
    /**
     * Sets $cityCode.
     *
     * @param object $cityCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityCode
     */
    public function setCityCode($cityCode) {
        $this->cityCode = $cityCode;
    }
    
    /**
     * Returns $cityDetail.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityDetail
     */
    public function getCityDetail() {
    	if($this->cityDetail == null)
			return "";
		else
        	return $this->cityDetail;
    }
    
    /**
     * Sets $cityDetail.
     *
     * @param object $cityDetail
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityDetail
     */
    public function setCityDetail($cityDetail) {
        $this->cityDetail = $cityDetail;
    }
    
    /**
     * Returns $cityDistrictCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityDistrictCode
     */
    public function getCityDistrictCode() {
    	if($this->cityDistrictCode == null)
			return "";
		else
        	return $this->cityDistrictCode;
    }
    
    /**
     * Sets $cityDistrictCode.
     *
     * @param object $cityDistrictCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityDistrictCode
     */
    public function setCityDistrictCode($cityDistrictCode) {
        $this->cityDistrictCode = $cityDistrictCode;
    }
    
    /**
     * Returns $cityNorm.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityNorm
     */
    public function getCityNorm() {
    	if($this->cityNorm == null)
			return "";
		else
        	return $this->cityNorm;
    }
    
    /**
     * Sets $cityNorm.
     *
     * @param object $cityNorm
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityNorm
     */
    public function setCityNorm($cityNorm) {
        $this->cityNorm = $cityNorm;
    }
    
    /**
     * Returns $cityRegion.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityRegion
     */
    public function getCityRegion() {
    	if($this->cityRegion == null)
			return "";
		else
        	return $this->cityRegion;
    }
    
    /**
     * Sets $cityRegion.
     *
     * @param object $cityRegion
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityRegion
     */
    public function setCityRegion($cityRegion) {
        $this->cityRegion = $cityRegion;
    }
    
    /**
     * Returns $citySuffix.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$citySuffix
     */
    public function getCitySuffix() {
    	if($this->citySuffix == null)
			return "";
		else
        	return $this->citySuffix;
    }
    
    /**
     * Sets $citySuffix.
     *
     * @param object $citySuffix
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$citySuffix
     */
    public function setCitySuffix($citySuffix) {
        $this->citySuffix = $citySuffix;
    }
    
    /**
     * Returns $cityViable.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityViable
     */
    public function getCityViable() {
    	if($this->cityViable == null)
			return "";
		else
        	return $this->cityViable;
    }
    
    /**
     * Sets $cityViable.
     *
     * @param object $cityViable
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$cityViable
     */
    public function setCityViable($cityViable) {
        $this->cityViable = $cityViable;
    }
    
    /**
     * Returns $community.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$community
     */
    public function getCommunity() {
    	if($this->community == null)
			return "";
		else
        	return $this->community;
    }
    
    /**
     * Sets $community.
     *
     * @param object $community
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$community
     */
    public function setCommunity($community) {
        $this->community = $community;
    }
    
    /**
     * Returns $communityCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$communityCode
     */
    public function getCommunityCode() {
    	if($this->communityCode == null)
			return "";
		else
        	return $this->communityCode;
    }
    
    /**
     * Sets $communityCode.
     *
     * @param object $communityCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$communityCode
     */
    public function setCommunityCode($communityCode) {
        $this->communityCode = $communityCode;
    }
    
    /**
     * Returns $countryFull.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$countryFull
     */
    public function getCountryFull() {
    	if($this->countryFull == null)
			return "";
		else
        	return $this->countryFull;
    }
    
    /**
     * Sets $countryFull.
     *
     * @param object $countryFull
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$countryFull
     */
    public function setCountryFull($countryFull) {
        $this->countryFull = $countryFull;
    }
    
    /**
     * Returns $countryIso2.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$countryIso2
     */
    public function getCountryIso2() {
    	if($this->countryIso2 == null)
			return "";
		else
        	return $this->countryIso2;
    }
    
    /**
     * Sets $countryIso2.
     *
     * @param object $countryIso2
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$countryIso2
     */
    public function setCountryIso2($countryIso2) {
        $this->countryIso2 = $countryIso2;
    }
    
    /**
     * Returns $county.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$county
     */
    public function getCounty() {
    	if($this->county == null)
			return "";
		else
        	return $this->county;
    }
    
    /**
     * Sets $county.
     *
     * @param object $county
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$county
     */
    public function setCounty($county) {
        $this->county = $county;
    }
    
    /**
     * Returns $depDistrict.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$depDistrict
     */
    public function getDepDistrict() {
    	if($this->depDistrict == null)
			return "";
		else
        	return $this->depDistrict;
    }
    
    /**
     * Sets $depDistrict.
     *
     * @param object $depDistrict
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$depDistrict
     */
    public function setDepDistrict($depDistrict) {
        $this->depDistrict = $depDistrict;
    }
    
    /**
     * Returns $distrPrint.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$distrPrint
     */
    public function getDistrPrint() {
    	if($this->distrPrint == null)
			return "";
		else
        	return $this->distrPrint;
    }
    
    /**
     * Sets $distrPrint.
     *
     * @param object $distrPrint
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$distrPrint
     */
    public function setDistrPrint($distrPrint) {
        $this->distrPrint = $distrPrint;
    }
    
    /**
     * Returns $district.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$district
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
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$district
     */
    public function setDistrict($district) {
        $this->district = $district;
    }
    
    /**
     * Returns $districtCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$districtCode
     */
    public function getDistrictCode() {
    	if($this->districtCode == null)
			return "";
		else
        	return $this->districtCode;
    }
    
    /**
     * Sets $districtCode.
     *
     * @param object $districtCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$districtCode
     */
    public function setDistrictCode($districtCode) {
        $this->districtCode = $districtCode;
    }
    
    /**
     * Returns $dpvEtc.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$dpvEtc
     */
    public function getDpvEtc() {
    	if($this->dpvEtc == null)
			return "";
		else
        	return $this->dpvEtc;
    }
    
    /**
     * Sets $dpvEtc.
     *
     * @param object $dpvEtc
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$dpvEtc
     */
    public function setDpvEtc($dpvEtc) {
        $this->dpvEtc = $dpvEtc;
    }
    
    /**
     * Returns $dpvValid.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$dpvValid
     */
    public function getDpvValid() {
    	if($this->dpvValid == null)
			return "";
		else
        	return $this->dpvValid;
    }
    
    /**
     * Sets $dpvValid.
     *
     * @param object $dpvValid
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$dpvValid
     */
    public function setDpvValid($dpvValid) {
        $this->dpvValid = $dpvValid;
    }
    
    /**
     * Returns $expireDays.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$expireDays
     */
    public function getExpireDays() {
    	if($this->expireDays == null)
			return "";
		else
        	return $this->expireDays;
    }
    
    /**
     * Sets $expireDays.
     *
     * @param object $expireDays
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$expireDays
     */
    public function setExpireDays($expireDays) {
        $this->expireDays = $expireDays;
    }
    
    /**
     * Returns $floorNo.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$floorNo
     */
    public function getFloorNo() {
    	if($this->floorNo == null)
			return "";
		else
        	return $this->floorNo;
    }
    
    /**
     * Sets $floorNo.
     *
     * @param object $floorNo
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$floorNo
     */
    public function setFloorNo($floorNo) {
        $this->floorNo = $floorNo;
    }
    
    /**
     * Returns $floorZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$floorZip
     */
    public function getFloorZip() {
    	if($this->floorZip == null)
			return "";
		else
        	return $this->floorZip;
    }
    
    /**
     * Sets $floorZip.
     *
     * @param object $floorZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$floorZip
     */
    public function setFloorZip($floorZip) {
        $this->floorZip = $floorZip;
    }
    
    /**
     * Returns $freguesi.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$freguesi
     */
    public function getFreguesi() {
    	if($this->freguesi == null)
			return "";
		else
        	return $this->freguesi;
    }
    
    /**
     * Sets $freguesi.
     *
     * @param object $freguesi
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$freguesi
     */
    public function setFreguesi($freguesi) {
        $this->freguesi = $freguesi;
    }
    
    /**
     * Returns $freguesiCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$freguesiCode
     */
    public function getFreguesiCode() {
    	if($this->freguesiCode == null)
			return "";
		else
        	return $this->freguesiCode;
    }
    
    /**
     * Sets $freguesiCode.
     *
     * @param object $freguesiCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$freguesiCode
     */
    public function setFreguesiCode($freguesiCode) {
        $this->freguesiCode = $freguesiCode;
    }
    
    /**
     * Returns $hnoAddition.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoAddition
     */
    public function getHnoAddition() {
    	if($this->hnoAddition == null)
			return "";
		else
        	return $this->hnoAddition;
    }
    
    /**
     * Sets $hnoAddition.
     *
     * @param object $hnoAddition
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoAddition
     */
    public function setHnoAddition($hnoAddition) {
        $this->hnoAddition = $hnoAddition;
    }
    
    /**
     * Returns $hnoCityCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoCityCode
     */
    public function getHnoCityCode() {
    	if($this->hnoCityCode == null)
			return "";
		else
        	return $this->hnoCityCode;
    }
    
    /**
     * Sets $hnoCityCode.
     *
     * @param object $hnoCityCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoCityCode
     */
    public function setHnoCityCode($hnoCityCode) {
        $this->hnoCityCode = $hnoCityCode;
    }
    
    /**
     * Returns $hnoCityDistrict.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoCityDistrict
     */
    public function getHnoCityDistrict() {
    	if($this->hnoCityDistrict == null)
			return "";
		else
        	return $this->hnoCityDistrict;
    }
    
    /**
     * Sets $hnoCityDistrict.
     *
     * @param object $hnoCityDistrict
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoCityDistrict
     */
    public function setHnoCityDistrict($hnoCityDistrict) {
        $this->hnoCityDistrict = $hnoCityDistrict;
    }
    
    /**
     * Returns $hnoNorm.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoNorm
     */
    public function getHnoNorm() {
    	if($this->hnoNorm == null)
			return "";
		else
        	return $this->hnoNorm;
    }
    
    /**
     * Sets $hnoNorm.
     *
     * @param object $hnoNorm
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoNorm
     */
    public function setHnoNorm($hnoNorm) {
        $this->hnoNorm = $hnoNorm;
    }
    
    /**
     * Returns $hnoNum.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoNum
     */
    public function getHnoNum() {
    	if($this->hnoNum == null)
			return "";
		else
        	return $this->hnoNum;
    }
    
    /**
     * Sets $hnoNum.
     *
     * @param object $hnoNum
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoNum
     */
    public function setHnoNum($hnoNum) {
        $this->hnoNum = $hnoNum;
    }
    
    /**
     * Returns $hnoPos.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoPos
     */
    public function getHnoPos() {
    	if($this->hnoPos == null)
			return "";
		else
        	return $this->hnoPos;
    }
    
    /**
     * Sets $hnoPos.
     *
     * @param object $hnoPos
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoPos
     */
    public function setHnoPos($hnoPos) {
        $this->hnoPos = $hnoPos;
    }
    
    /**
     * Returns $hnoRange.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoRange
     */
    public function getHnoRange() {
    	if($this->hnoRange == null)
			return "";
		else
        	return $this->hnoRange;
    }
    
    /**
     * Sets $hnoRange.
     *
     * @param object $hnoRange
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoRange
     */
    public function setHnoRange($hnoRange) {
        $this->hnoRange = $hnoRange;
    }
    
    /**
     * Returns $hnoRistanti.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoRistanti
     */
    public function getHnoRistanti() {
    	if($this->hnoRistanti == null)
			return "";
		else
        	return $this->hnoRistanti;
    }
    
    /**
     * Sets $hnoRistanti.
     *
     * @param object $hnoRistanti
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoRistanti
     */
    public function setHnoRistanti($hnoRistanti) {
        $this->hnoRistanti = $hnoRistanti;
    }
    
    /**
     * Returns $hnoZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoZip
     */
    public function getHnoZip() {
    	if($this->hnoZip == null)
			return "";
		else
        	return $this->hnoZip;
    }
    
    /**
     * Sets $hnoZip.
     *
     * @param object $hnoZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$hnoZip
     */
    public function setHnoZip($hnoZip) {
        $this->hnoZip = $hnoZip;
    }
    
    /**
     * Returns $icAdr.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$icAdr
     */
    public function getIcAdr() {
    	if($this->icAdr == null)
			return "";
		else
        	return $this->icAdr;
    }
    
    /**
     * Sets $icAdr.
     *
     * @param object $icAdr
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$icAdr
     */
    public function setIcAdr($icAdr) {
        $this->icAdr = $icAdr;
    }
    
    /**
     * Returns $icArrd.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$icArrd
     */
    public function getIcArrd() {
    	if($this->icArrd == null)
			return "";
		else
        	return $this->icArrd;
    }
    
    /**
     * Sets $icArrd.
     *
     * @param object $icArrd
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$icArrd
     */
    public function setIcArrd($icArrd) {
        $this->icArrd = $icArrd;
    }
    
    /**
     * Returns $langCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$langCode
     */
    public function getLangCode() {
    	if($this->langCode == null)
			return "";
		else
        	return $this->langCode;
    }
    
    /**
     * Sets $langCode.
     *
     * @param object $langCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$langCode
     */
    public function setLangCode($langCode) {
        $this->langCode = $langCode;
    }
    
    /**
     * Returns $line7.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$line7
     */
    public function getLine7() {
    	if($this->line7 == null)
			return "";
		else
        	return $this->line7;
    }
    
    /**
     * Sets $line7.
     *
     * @param object $line7
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$line7
     */
    public function setLine7($line7) {
        $this->line7 = $line7;
    }
    
    /**
     * Returns $mvalOrganisation.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$mvalOrganisation
     */
    public function getMvalOrganisation() {
    	if($this->mvalOrganisation == null)
			return "";
		else
        	return $this->mvalOrganisation;
    }
    
    /**
     * Sets $mvalOrganisation.
     *
     * @param object $mvalOrganisation
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$mvalOrganisation
     */
    public function setMvalOrganisation($mvalOrganisation) {
        $this->mvalOrganisation = $mvalOrganisation;
    }
    
    /**
     * Returns $nielsen.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$nielsen
     */
    public function getNielsen() {
    	if($this->nielsen == null)
			return "";
		else
        	return $this->nielsen;
    }
    
    /**
     * Sets $nielsen.
     *
     * @param object $nielsen
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$nielsen
     */
    public function setNielsen($nielsen) {
        $this->nielsen = $nielsen;
    }
    
    /**
     * Returns $predirStr.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$predirStr
     */
    public function getPredirStr() {
    	if($this->predirStr == null)
			return "";
		else
        	return $this->predirStr;
    }
    
    /**
     * Sets $predirStr.
     *
     * @param object $predirStr
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$predirStr
     */
    public function setPredirStr($predirStr) {
        $this->predirStr = $predirStr;
    }
    
    /**
     * Returns $rdi.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$rdi
     */
    public function getRdi() {
    	if($this->rdi == null)
			return "";
		else
        	return $this->rdi;
    }
    
    /**
     * Sets $rdi.
     *
     * @param object $rdi
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$rdi
     */
    public function setRdi($rdi) {
        $this->rdi = $rdi;
    }
    
    /**
     * Returns $rdiEnhanced.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$rdiEnhanced
     */
    public function getRdiEnhanced() {
    	if($this->rdiEnhanced == null)
			return "";
		else
        	return $this->rdiEnhanced;
    }
    
    /**
     * Sets $rdiEnhanced.
     *
     * @param object $rdiEnhanced
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$rdiEnhanced
     */
    public function setRdiEnhanced($rdiEnhanced) {
        $this->rdiEnhanced = $rdiEnhanced;
    }
    
    /**
     * Returns $region.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$region
     */
    public function getRegion() {
    	if($this->region == null)
			return "";
		else
        	return $this->region;
    }
    
    /**
     * Sets $region.
     *
     * @param object $region
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$region
     */
    public function setRegion($region) {
        $this->region = $region;
    }
    
    /**
     * Returns $regionCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$regionCode
     */
    public function getRegionCode() {
    	if($this->regionCode == null)
			return "";
		else
        	return $this->regionCode;
    }
    
    /**
     * Sets $regionCode.
     *
     * @param object $regionCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$regionCode
     */
    public function setRegionCode($regionCode) {
        $this->regionCode = $regionCode;
    }
    
    /**
     * Returns $resAbbrev.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resAbbrev
     */
    public function getResAbbrev() {
    	if($this->resAbbrev == null)
			return "";
		else
        	return $this->resAbbrev;
    }
    
    /**
     * Sets $resAbbrev.
     *
     * @param object $resAbbrev
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resAbbrev
     */
    public function setResAbbrev($resAbbrev) {
        $this->resAbbrev = $resAbbrev;
    }
    
    /**
     * Returns $resBuildName.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resBuildName
     */
    public function getResBuildName() {
    	if($this->resBuildName == null)
			return "";
		else
        	return $this->resBuildName;
    }
    
    /**
     * Sets $resBuildName.
     *
     * @param object $resBuildName
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resBuildName
     */
    public function setResBuildName($resBuildName) {
        $this->resBuildName = $resBuildName;
    }
    
    /**
     * Returns $resChange.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resChange
     */
    public function getResChange() {
    	if($this->resChange == null)
			return "";
		else
        	return $this->resChange;
    }
    
    /**
     * Sets $resChange.
     *
     * @param object $resChange
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resChange
     */
    public function setResChange($resChange) {
        $this->resChange = $resChange;
    }
    
    /**
     * Returns $resDepDistrict.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resDepDistrict
     */
    public function getResDepDistrict() {
    	if($this->resDepDistrict == null)
			return "";
		else
        	return $this->resDepDistrict;
    }
    
    /**
     * Sets $resDepDistrict.
     *
     * @param object $resDepDistrict
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resDepDistrict
     */
    public function setResDepDistrict($resDepDistrict) {
        $this->resDepDistrict = $resDepDistrict;
    }
    
    /**
     * Returns $resOrganisation.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resOrganisation
     */
    public function getResOrganisation() {
    	if($this->resOrganisation == null)
			return "";
		else
        	return $this->resOrganisation;
    }
    
    /**
     * Sets $resOrganisation.
     *
     * @param object $resOrganisation
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resOrganisation
     */
    public function setResOrganisation($resOrganisation) {
        $this->resOrganisation = $resOrganisation;
    }
    
    /**
     * Returns $resPostField.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPostField
     */
    public function getResPostField() {
    	if($this->resPostField == null)
			return "";
		else
        	return $this->resPostField;
    }
    
    /**
     * Sets $resPostField.
     *
     * @param object $resPostField
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resPostField
     */
    public function setResPostField($resPostField) {
        $this->resPostField = $resPostField;
    }
    
    /**
     * Returns $resRef.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resRef
     */
    public function getResRef() {
    	if($this->resRef == null)
			return "";
		else
        	return $this->resRef;
    }
    
    /**
     * Sets $resRef.
     *
     * @param object $resRef
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resRef
     */
    public function setResRef($resRef) {
        $this->resRef = $resRef;
    }
    
    /**
     * Returns $resSec.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSec
     */
    public function getResSec() {
    	if($this->resSec == null)
			return "";
		else
       	 	return $this->resSec;
    }
    
    /**
     * Sets $resSec.
     *
     * @param object $resSec
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSec
     */
    public function setResSec($resSec) {
        $this->resSec = $resSec;
    }
    
    /**
     * Returns $resSubBuildName.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSubBuildName
     */
    public function getResSubBuildName() {
    	if($this->resSubBuildName == null)
			return "";
		else
        	return $this->resSubBuildName;
    }
    
    /**
     * Sets $resSubBuildName.
     *
     * @param object $resSubBuildName
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resSubBuildName
     */
    public function setResSubBuildName($resSubBuildName) {
        $this->resSubBuildName = $resSubBuildName;
    }
    
    /**
     * Returns $resVariant.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resVariant
     */
    public function getResVariant() {
    	if($this->resVariant == null)
			return "";
		else
        	return $this->resVariant;
    }
    
    /**
     * Sets $resVariant.
     *
     * @param object $resVariant
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resVariant
     */
    public function setResVariant($resVariant) {
        $this->resVariant = $resVariant;
    }
    
    /**
     * Returns $resZipAddOn.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resZipAddOn
     */
    public function getResZipAddOn() {
    	if($this->resZipAddOn == null)
			return "";
		else
        	return $this->resZipAddOn;
    }
    
    /**
     * Sets $resZipAddOn.
     *
     * @param object $resZipAddOn
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$resZipAddOn
     */
    public function setResZipAddOn($resZipAddOn) {
        $this->resZipAddOn = $resZipAddOn;
    }
    
    /**
     * Returns $secTypFull.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$secTypFull
     */
    public function getSecTypFull() {
    	if($this->secTypFull == null)
			return "";
		else
        	return $this->secTypFull;
    }
    
    /**
     * Sets $secTypFull.
     *
     * @param object $secTypFull
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$secTypFull
     */
    public function setSecTypFull($secTypFull) {
        $this->secTypFull = $secTypFull;
    }
    
    /**
     * Returns $serialVersionUID.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$serialVersionUID
     */
    public function getSerialVersionUID() {
    	if($this->serialVersionUID == null)
			return "";
		else
        	return $this->serialVersionUID;
    }
    
    /**
     * Sets $serialVersionUID.
     *
     * @param object $serialVersionUID
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$serialVersionUID
     */
    public function setSerialVersionUID($serialVersionUID) {
        $this->serialVersionUID = $serialVersionUID;
    }
    
    /**
     * Returns $specIcCity.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$specIcCity
     */
    public function getSpecIcCity() {
    	if($this->specIcCity == null)
			return "";
		else
        	return $this->specIcCity;
    }
    
    /**
     * Sets $specIcCity.
     *
     * @param object $specIcCity
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$specIcCity
     */
    public function setSpecIcCity($specIcCity) {
        $this->specIcCity = $specIcCity;
    }
    
    /**
     * Returns $stateFull.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$stateFull
     */
    public function getStateFull() {
    	if($this->stateFull == null)
			return "";
		else
        	return $this->stateFull;
    }
    
    /**
     * Sets $stateFull.
     *
     * @param object $stateFull
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$stateFull
     */
    public function setStateFull($stateFull) {
        $this->stateFull = $stateFull;
    }
    
    /**
     * Returns $strAbbrev.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strAbbrev
     */
    public function getStrAbbrev() {
    	if($this->strAbbrev == null)
			return "";
		else
        	return $this->strAbbrev;
    }
    
    /**
     * Sets $strAbbrev.
     *
     * @param object $strAbbrev
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strAbbrev
     */
    public function setStrAbbrev($strAbbrev) {
        $this->strAbbrev = $strAbbrev;
    }
    
    /**
     * Returns $strKernel.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strKernel
     */
    public function getStrKernel() {
    	if($this->strKernel == null)
			return "";
		else
        	return $this->strKernel;
    }
    
    /**
     * Sets $strKernel.
     *
     * @param object $strKernel
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strKernel
     */
    public function setStrKernel($strKernel) {
        $this->strKernel = $strKernel;
    }
    
    /**
     * Returns $strLangCode.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strLangCode
     */
    public function getStrLangCode() {
		if($this->strLangCode == null)
			return "";
		else
        	return $this->strLangCode;
    }
    
    /**
     * Sets $strLangCode.
     *
     * @param object $strLangCode
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strLangCode
     */
    public function setStrLangCode($strLangCode) {
        $this->strLangCode = $strLangCode;
    }
    
    /**
     * Returns $strNo.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strNo
     */
    public function getStrNo() {
    	if($this->strNo == null)
			return "";
		else
        	return $this->strNo;
    }
    
    /**
     * Sets $strNo.
     *
     * @param object $strNo
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strNo
     */
    public function setStrNo($strNo) {
        $this->strNo = $strNo;
    }
    
    /**
     * Returns $strPostdir.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strPostdir
     */
    public function getStrPostdir() {
    	if($this->strPostdir == null)
			return "";
		else
        	return $this->strPostdir;
    }
    
    /**
     * Sets $strPostdir.
     *
     * @param object $strPostdir
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strPostdir
     */
    public function setStrPostdir($strPostdir) {
        $this->strPostdir = $strPostdir;
    }
    
    /**
     * Returns $strType.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strType
     */
    public function getStrType() {
    	if($this->strType == null)
			return "";
		else
        	return $this->strType;
    }
    
    /**
     * Sets $strType.
     *
     * @param object $strType
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strType
     */
    public function setStrType($strType) {
        $this->strType = $strType;
    }
    
    /**
     * Returns $strZip.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strZip
     */
    public function getStrZip() {
    	if($this->strZip == null)
			return "";
		else
        	return $this->strZip;
    }
    
    /**
     * Sets $strZip.
     *
     * @param object $strZip
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$strZip
     */
    public function setStrZip($strZip) {
        $this->strZip = $strZip;
    }
    
    /**
     * Returns $zipRange.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$zipRange
     */
    public function getZipRange() {
    	if($this->zipRange == null)
			return "";
		else
        	return $this->zipRange;
    }
    
    /**
     * Sets $zipRange.
     *
     * @param object $zipRange
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$zipRange
     */
    public function setZipRange($zipRange) {
        $this->zipRange = $zipRange;
    }
    
    /**
     * Returns $zipSheme.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$zipSheme
     */
    public function getZipSheme() {
    	if($this->zipSheme == null)
			return "";
		else
        	return $this->zipSheme;
    }
    
    /**
     * Sets $zipSheme.
     *
     * @param object $zipSheme
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$zipSheme
     */
    public function setZipSheme($zipSheme) {
        $this->zipSheme = $zipSheme;
    }
    
    /**
     * Returns $zipType.
     *
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$zipType
     */
    public function getZipType() {
    	if($this->zipType == null)
			return "";
		else
        	return $this->zipType;
    }
    
    /**
     * Sets $zipType.
     *
     * @param object $zipType
     * @see OrwellInternationalAddressCheckPoweredByUniservResultElement::$zipType
     */
    public function setZipType($zipType) {
        $this->zipType = $zipType;
    }
}

class OInterAddressCheckResultElement extends  OrwellInternationalAddressCheckPoweredByUniservResultElement {
}
?>