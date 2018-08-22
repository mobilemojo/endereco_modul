<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

/**
 * Class OrwellAddressCheck
 * @internal
 */
class OrwellAddressCheck {
	
	/**
	 * 
	 * @param OrwellAddressCheckRequest $request
	 * @return OrwellAddressCheckResult 
	 */
	public function addressCheck(OrwellAddressCheckRequest $request){
		
		$client = new SoapClient(ORWELL_ADDRESSCHECK_URL); 
		
		$requestArray = OrwellUtility::getValuesInArray($request, "OrwellAddressCheckRequest");
		
		array_unshift($requestArray, ORWELL_MANDATOR, ORWELL_LOGIN, ORWELL_PASSWORD);

        //return $requestArray;

        $result = $client->__soapCall("addressCheck", $requestArray);
		
		$oacResult = new OrwellAddressCheckResult($result);

		return $oacResult;
	}
}
?>