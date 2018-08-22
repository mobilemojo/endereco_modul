<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */
 
class OrwellAddressCheckResult extends OrwellAbstractResult{
	
	/**
	 * @constructor - 	creates an object of type OrwellAddressCheckResult based on the array
	 * 					representation of the result returned by OrwellAddressCheck WebService
	 * @param array $oacWSresult - containing the result of a SOAP Call to OrwellAddressCheck
	 */
	public function __construct($oacWSresult){
		
		$this->elements = array();
		
		for($i=0; $i < count($oacWSresult->city); $i++){
			$elem = new OrwellAddressCheckResultElement();
			
			$elem->setFirstName($oacWSresult->firstName[$i]);
			$elem->setCity($oacWSresult->city[$i]);
			$elem->setDistrict($oacWSresult->district[$i]);
			$elem->setAlort($oacWSresult->alort[$i]);
			$elem->setFuzzyValue($oacWSresult->fuzzyValue[$i]);
			$elem->setHouseNumber($oacWSresult->houseNumber[$i]);
			$elem->setStreetOld($oacWSresult->streetOld[$i]);
			$elem->setPostCode($oacWSresult->postCode[$i]);
			$elem->setStreetKey($oacWSresult->streetKey[$i]);
			$elem->setCargoCode($oacWSresult->cargoCode[$i]);
			$elem->setFederalState($oacWSresult->federalState[$i]);
			$elem->setType($oacWSresult->type[$i]);
			$elem->setLastName($oacWSresult->lastName[$i]);
			$elem->setCityOld($oacWSresult->cityOld[$i]);
			$elem->setStreet($oacWSresult->street[$i]);
			$elem->setPobNumber($oacWSresult->pobNumber[$i]);
			
			$this->elements[] = $elem;
		}
		
		$this->status = $oacWSresult->status;
	}


	/**
	 * @return OrwellAddressCheckResultElement[]
	 */
	public function getElements()
	{
		return parent::getElements();
	}
}
?>