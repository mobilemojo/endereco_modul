<?php

/**
 * Class OrwellLibAjaxPort
 * @internal
 */
class OrwellLibAjaxPort {

	public function __construct(){

	}

	/**
	 * @param string $orwellServiceDataJsonString
	 * @return array
	 * @throws Exception
	 */
	public function executeFromJsonParameters($orwellServiceDataJsonString) {
		$orwellServiceData = json_decode($orwellServiceDataJsonString, true);
		return $this->execute($orwellServiceData);
	}

	/**
	 * @param array $orwellServiceData
	 * @return OrwellAbstractResult
	 * @throws Exception
	 */
	public function execute($orwellServiceData) {
		//check for mandatory fields
		if(!isset($orwellServiceData['fieldId']))
			$orwellServiceData['fieldId'] = 'noLongerUsed';
		if(!isset($orwellServiceData['service']))
			throw new Exception("service field not set in request");

		//Make sure the fieldId is included in the JSON Object returned
		$result = array();

		//copy the value from fieldId to a new array
		$result['fieldId'] = $orwellServiceData['fieldId'];
		$result['service'] = $orwellServiceData['service'];
		if(isset($orwellServiceData['callNo']))
			$result['callNo'] = $orwellServiceData['callNo'];

		//get the result of the operation
		$handleResult = $this->handleRequest($orwellServiceData, false);

		/* combine the result so that:
		 * - the operation-result fieldId can overwrite the one in the request
		 *   but if no field with index 'fieldId' is present in the operation-result
		 *   the request copy will be included in the returned JSON obj
		 */

		if(!$handleResult->getFieldId())
			$handleResult->setFieldId($orwellServiceData['fieldId']);
		if(!$handleResult->getCallNo())
			$handleResult->setCallNo($orwellServiceData['callNo']);
		if(!$handleResult->getService())
			$handleResult->setService($orwellServiceData['service']);

		return $this->normalizeOrwellResult($handleResult);
	}

	/**
	 * @deprecated
	 */
	public function run(){

		if(isset($_POST['orwellServiceData'])){
			$request = null;
			try
			{
				$request = $_POST['orwellServiceData'];
				$request = json_decode($request, true);

				//check for mandatory fields
				if(!isset($request['fieldId']))
					throw new Exception("fieldId field not set in request");
				if(!isset($request['service']))
					throw new Exception("service field not set in request");

				//Make sure the fieldId is included in the JSON Object returned
				$result = array();

				//copy the value from fieldId to a new array
				$result['fieldId'] = $request['fieldId'];
				$result['service'] = $request['service'];
				if(isset($request['callNo']))
					$result['callNo'] = $request['callNo'];

				//get the result of the operation
				$handleResult = $this->handleRequest($request);

				/* combine the arrays so that:
				 * - the operation-result fieldId can overwrite the one in the request
				 *   but if no field with index 'fieldId' is present in the operation-result
				 *   the request copy will be included in the returned JSON obj
				 */
				$result = array_merge($result, $handleResult);

				echo json_encode($this->normalizeResult($result));
			}
			catch(Exception $e){
				echo "Error:\n";
				echo $e->getMessage()."\n";
				echo $e->getTraceAsString()."\n";
				return;
			}
		}
	}

	/**
	 * @param array $request
	 * @param bool $bReturnAsArray
	 * @return array|OrwellAbstractResult
	 * @throws Exception
	 */
	private function handleRequest(array $request, $bReturnAsArray = true){
		$result = array();

		$service = null;

		switch(strtolower($request['service'])){
			case "startnewtransaction":
				$result['tid'] = OrwellUtility::calculateTid($request);
				break;
			case "firstnamecheck":
			case "emailaddresscheck":
			case "birthdaycheck":
				$service = new OrwellInputAssistant();
				$request['tid'] = OrwellUtility::calculateTid($request);
				break;
			case "postcodeexpansion":
			case "cityexpansion":
			case "streetexpansion":
				$request['tid'] = OrwellUtility::calculateTid($request);
				if(isset($request['country']) && $request['country'] != "DE")
					/*
                     * uncomment service declaration if the OrwellInternationalInputAssistant
                     * should be used
                     * else set $service null
                     */
//					$service = new OrwellInternationalInputAssistant();
					$service = null;
				else
					$service = new OrwellInputAssistant();
				break;
			case "housenumberexpansion":
			case "prephonenumbercheck":
				if(!isset($request['country']) || $request['country'] == "DE"){
					$service = new OrwellInputAssistant();
					$request['tid'] = OrwellUtility::calculateTid($request);
				}
				break;
			case "banksearchsinglefieldinput":
				$service = new OrwellBankSearch();
				break;
			case "accountcheck":
				$service = new OrwellAccountCheck();
				break;
			case "addresscheck":
				$service = new OrwellAddressCheck();
				//$service = new OrwellUniversalAddressCheck();
				break;
			default:
				throw new Exception("service:".$request['service']." not avaiable");
		}

		//if service is null then a value for service has been found in the
		//above switch statement, but the service variable has not been changed
		//in this case just do nothing and return the $result array
		//which probably has been changed
		if($service != null){
			$result = $this->executeService($service, $request);
			//make array from result object
			if($bReturnAsArray)
				$result = $this->makeArrayFromResult($result);
		}

		return $result;
	}

	private function executeService($service, array $request){
		$srvReflection = new ReflectionObject($service);

		$srvMethod = null;

		foreach($srvReflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method){
			if(strcmp(strtolower($method->getName()),strtolower($request['service'])) == 0){
				if(count($method->getNumberOfParameters() == 1)){
					$srvMethod = $method;
					break;
				}
			}
		}

		if($srvMethod == null){
			throw new Exception('No method "'.$request['service'].'" found acception one parameter');
		}

		$srvMethodParam = $method->getParameters();

		$requestObject = $srvMethodParam[0]->getClass()->newInstance();
		$requestObjectType = new ReflectionObject($requestObject);

		foreach($request as $key => $value){
			$setterName = "set".ucfirst($key);

			if($requestObjectType->hasMethod($setterName)){
				$setter = $requestObjectType->getMethod($setterName);
				$setter->invoke($requestObject, $value);
			}
		}

		$result = $method->invoke($service, $requestObject);

		return $result;
	}

	private function makeArrayFromResult(OrwellAbstractResult $result){
		return OrwellUtility::makeArrayFromResult($result);
	}

	/**
	 * @param array $aResult
	 * @return array
	 */
	private function normalizeResult($aResult) {
		if(ORWELL_SHOW_CITIES_WITH_ADDITIONALS_EVEN_IF_ZIP_IS_EQUAL)
		{
			return $aResult;
		}
		else if(isset($aResult['service']) && $aResult['service'] == 'cityExpansion')
		{
			$aCities = &$aResult['elements'];

			$aZipCodesToCityData = array();
			foreach($aCities as $iKey => &$aCityData) {
				if(isset($aZipCodesToCityData[$aCityData['postCode']]))
				{
					$iExistingLength = strlen($aZipCodesToCityData[$aCityData['postCode']]['city']);

					if(strlen($aCityData['city']) < $iExistingLength)
						$aZipCodesToCityData[$aCityData['postCode']] = $aCityData;
					else
						unset($aCities[$iKey]);
				}
				else
					$aZipCodesToCityData[$aCityData['postCode']] = $aCityData;

			}
			$aResult['elements'] = array_values($aCities);
		}
		return $aResult;
	}


	private function normalizeOrwellResult(OrwellAbstractResult $oResult) {
		if(ORWELL_SHOW_CITIES_WITH_ADDITIONALS_EVEN_IF_ZIP_IS_EQUAL)
		{
			return $oResult;
		}
		else if($oResult->getService() == 'cityExpansion')
		{
			/**
			 * @var $aCities OrwellInputAssistantPostCodeCityExpansionResultElement[]
			 */
			$aCities = &$oResult->getelements();

			/**
			 * @var $aZipCodesToCityData OrwellInputAssistantPostCodeCityExpansionResultElement[]
			 */
			$aZipCodesToCityData = array();
			foreach($aCities as $iKey => &$postCodeAndCity) {
				/**
				 * @var $postCodeAndCity OrwellInputAssistantPostCodeCityExpansionResultElement
				 */
				if(isset($aZipCodesToCityData[$postCodeAndCity->getPostCode()]))
				{
					$iExistingLength = strlen($aZipCodesToCityData[$postCodeAndCity->getPostCode()]->getCity());

					if(strlen($postCodeAndCity->getCity()) < $iExistingLength)
						$aZipCodesToCityData[$postCodeAndCity->getPostCode()] = $postCodeAndCity;
					else
						unset($aCities[$iKey]);
				}
				else
					$aZipCodesToCityData[$postCodeAndCity->getPostCode()] = $postCodeAndCity;

			}
			$oResult->setElements($aCities);
		}
		return $oResult;
	}

}