<?php

/*
 *	Created: 	11.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

/**
 * Class OrwellInternationalAddressCheckPoweredByUniserv
 * @internal
 */
class OrwellInternationalAddressCheckPoweredByUniserv {
	
	public function orwellInternationalAddressCheck(OrwellInternationalAddressCheckPoweredByUniservRequest $request){
		$client = new SoapClient(ORWELL_INTERNATIONALADDRESSCHECK_URL);
		
		$authArray = array("login" => ORWELL_LOGIN, "password" => ORWELL_PASSWORD, "tid" => "", "mandator" => ORWELL_MANDATOR);

		$parArray = OrwellUtility::getValuesInArray($request->getParameter());
		$inputArray = OrwellUtility::getValuesInArray($request->getInputAddress());

		$result = $client->orwellInternationalAddressCheck(
			$authArray,
			$inputArray,
			$parArray);
		
		$oiacResult = new OrwellInternationalAddressCheckPoweredByUniservResult($result);
		
		return $oiacResult;
	}
}

class OInterAddressCheck extends OrwellInternationalAddressCheckPoweredByUniserv{
	
}
?>