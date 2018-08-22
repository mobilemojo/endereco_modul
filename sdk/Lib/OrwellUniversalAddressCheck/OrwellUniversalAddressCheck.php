<?php


/**
 * Class OrwellUniversalAddressCheck
 * @internal
 */
class OrwellUniversalAddressCheck extends OrwellAddressCheck {
	
	public function addressCheck(OrwellUniversalAddressCheckRequest $request){
		$result = new OrwellUniversalAddressCheckResult();
		
		switch($request->getCountry()){
			case "DE":
			case "":
				$oac = new OrwellAddressCheck();
				$oacResult = $oac->addressCheck($request);
				$result = new OrwellUniversalAddressCheckResult($oacResult, $request->getCountry());
				break;
			default:
				if(ORWELL_ALLOW_INTERNATIONALADDRESSCHECK){
					$internationalAC = new OrwellInternationalAddressCheckPoweredByUniserv();
					$req = $this->makeInternationalRequest($request);
					$iACResult = $internationalAC->orwellInternationalAddressCheck($req);
					$result = new OrwellUniversalAddressCheckResult($iACResult);
				}
				break;
		}
		
		return $result;
	}
	
	private function makeInternationalRequest(OrwellUniversalAddressCheckRequest $request){
		$internationalRequest = new OrwellInternationalAddressCheckPoweredByUniservRequest();
		
		$input = new OrwellInternationalAddressCheckPoweredByUniservInputAddress();
		$input->setCountry($request->getCountry());
		$input->setZip($request->getPostCode());
		$input->setCity($request->getCity());
		$input->setCityDistrict($request->getDistrict());
		$input->setStr($request->getStreet());
		$input->setHno($request->getHouseNumber());
		
		$param = new OrwellInternationalAddressCheckPoweredByUniservParameter();
		$param->setParCityMval($request->getCitySim());
		$param->setParStrMval($request->getStreetSim());
		$param->setParSelListMax($request->getMaxHits());
		
		$internationalRequest->setInputAddress($input);
		$internationalRequest->setParameter($param);
		
		return $internationalRequest;
			
	}
}
?>