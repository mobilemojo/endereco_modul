<?php


class OrwellUniversalAddressCheckResult extends OrwellAddressCheckResult {
	
	public function __construct($result = null, $country = ''){
		$this->status = array();
		$this->elements = array();
		
		if($result == null)
			return; 
			
		$refObj = new ReflectionObject($result);
		
		if($refObj->isSubclassOf("OrwellAddressCheckResult") || strcasecmp($refObj->getName(),"OrwellAddressCheckResult") == 0){
			$this->createFromAddressCheck($result, $country);
		}
		else if($refObj->isSubclassOf("OrwellInternationalAddressCheckPoweredByUniservResult")
				|| strcasecmp($refObj->getName(),"OrwellInternationalAddressCheckPoweredByUniservResult") == 0){
			$this->createFromInternationalAddressCheck($result);
		}
		
	}
	
	private function createFromAddressCheck(OrwellAddressCheckResult $result, $country){
		foreach($result->getElements() as $elem){
			$uniElem = new OrwellUniversalAddressCheckResultElement();
			
			$uniElem->setFirstName($elem->getFirstName());
			$uniElem->setCity($elem->getCity());
			$uniElem->setDistrict($elem->getDistrict());
			$uniElem->setAlort($elem->getAlort());
			$uniElem->setFuzzyValue($elem->getFuzzyValue());
			$uniElem->setHouseNumber($elem->getHouseNumber());
			$uniElem->setStreetOld($elem->getStreetOld());
			$uniElem->setPostCode($elem->getPostCode());
			$uniElem->setStreetKey($elem->getStreetKey());
			$uniElem->setCargoCode($elem->getCargoCode());
			$uniElem->setFederalState($elem->getFederalState());
			$uniElem->setType($elem->getType());
			$uniElem->setLastName($elem->getLastName());
			$uniElem->setCityOld($elem->getCityOld());
			$uniElem->setStreet($elem->getStreet());
			$uniElem->setPobNumber($elem->getPobNumber());
			$uniElem->setCountry($country);
			
			$this->elements[] = $uniElem;
		}
		
		$this->status = $result->getStatus();
	}
	
	private function createFromInternationalAddressCheck(OrwellInternationalAddressCheckPoweredByUniservResult $result){
		/*echo "<pre>";
		var_dump($result);
		echo "</pre>";
		die();*/
		foreach($result->getElements() as $elem){
			$uniElem = new OrwellUniversalAddressCheckResultElement();
			
			$uniElem->setCountry($elem->getCountry());
			$uniElem->setAlort($elem->getCityCode());
			
			//check which address type we got
			if($elem->getZip() != ""){
				//deliveryaddress
				$uniElem->setType('D');
				$uniElem->setFederalState($elem->getRegion());
				$uniElem->setPostCode($elem->getZip());
				$uniElem->setCity($elem->getCity());
				$uniElem->setDistrict($elem->getCityDistrict());
				$uniElem->setStreet($elem->getStr());
			}
			/*else if($elem->getPoBoxZip() != ""){
				//postbox address
				$uniElem->setType('P');
				$uniElem->setPostCode($elem->getPoBoxZip());
				$uniElem->setCity($elem->getPoBoxCity());
				$uniElem->setPobNumber($elem->getPoBoxNumber());
			} 
			else if($elem->getSpecZip()){
				//special address (Großempfänger)
				$uniElem->setType('G');
				$uniElem->setPostCode($elem->getSpecZip());
				$uniElem->setCity($elem->getSpecCity());
			}*/
			
			$this->elements[] = $uniElem;
		}
		
		if(substr($result->status[0],0,2) == "WS"){
			$this->status = $result->status;
			return;
		}
			
		if($result->getRetCount() == 1){
			switch($result->elements[0]->getResultClass()){
				case "1":
					$this->status[0] = "A1000";
					break;
				default:
					$this->status[0] = "A2000";
					break;
			}
		}
		else if($result->getRetCount() == 0){
			$this->status[0] = "A4000";
		}
		else if($result->getRetCount() > 1){
			$this->status[0] = "A3000";
		}
	}
}
?>