<?php


class OrwellUtility {

	/**
	 * @param $aRequest
	 * @return EnderecoAbstractRequest
	 */
	public static function arrayToRequest($aRequest) {
		$service = ucfirst($aRequest['service']);

		$sRequestClassName = "Endereco{$service}Request";
		$request = new $sRequestClassName();

		foreach($aRequest as $sName => $mValue) {
			$name = ucfirst($sName);
		    $sMethodName = "set{$name}";
			$request->$sMethodName($mValue);
		}

		return $request;
	}

	/**
	 * @param OrwellAbstractResult $result
	 * @return array
	 */
	public static function makeArrayFromResult(OrwellAbstractResult $result){
		$return = OrwellUtility::getValuesInArray($result);

		$return["elements"] = array();

		$i=0;

		foreach($result->getElements() as $key => $value){
			$return["elements"][$i] = OrwellUtility::getValuesInArray($value);
			$i++;
		}

		return $return;
	}
	
	/**
	 * This function is intended to be used by the SoapClient usage 
	 * in the Service classes (like OrwellAddressCheck), because those methods 
	 * use arrays to send the data to the webservice-endpoint.
	 * all private members in the class hierarchy from the most concrete class up to Abstract Request
	 * are taken into account
	 * @throws RuntimeException		if no getter-method exists for a private property of the class
	 * 								getter-methods must be written as
	 * 									"get".ucfirst(propertyName)
	 * 								and accept no parameter. If no such method is found the exception
	 * 								is thrown	 
	 * @return array 				indexed by the name of the private fields contained in the class
	 *			 					the values behind those indices are the values of the according private
	 * 								field.  
	 */
	public static function getValuesInArray($obj, $startClass = null){
		$ret = array();
		
		$reflect = new ReflectionObject($obj);
		$aMethods = $reflect->getMethods(ReflectionProperty::IS_PUBLIC);
		
		$lowestClass = $reflect->getName();
		
		if($startClass != null){
			while(strcasecmp($lowestClass,"stdClass") != 0 && strcasecmp($lowestClass,$startClass) != 0){
				$lowestClass = $reflect->getParentClass()->getName();
			}		
		}
		
		while(strcasecmp($lowestClass,"stdClass") != 0){
			$currentClass = new ReflectionClass($lowestClass);
			
			//echo "currentClass:".$currentClass->getName()."\n";
			
			foreach($currentClass->getProperties(ReflectionProperty::IS_PRIVATE + ReflectionProperty::IS_PROTECTED) as $prop){
				//echo "\tprop:".$prop->getName()."\n";
				$getterStr = "get".ucfirst($prop->getName());
				$getterMethod = null;
				foreach($aMethods as $method){
					if($method->name == $getterStr)
						$getterMethod = $method;
				}
				
				if($getterMethod == null)
					throw new RuntimeException("Didn't find getter(".$getterStr.") for property ".$prop->getName()." in class ". $reflect->getName());
	
				$ret[$prop->getName()] = $getterMethod->invoke($obj, array());
			}
			
			if($currentClass->getParentClass() == null)
				break;
				
			$lowestClass = $currentClass->getParentClass()->getName();
		}
		
		return $ret;
	}
	
	/**
	 * This function is used to calculate the transaction id (tid in short)
	 * for OrwellInputAssistant Services
	 * 
	 * The function looks up a 3 digit number for field and form based on
	 * the http referer for the form and the fieldId that is transmitted with every
	 * request (assured on entry of the request.By the AjaxPort for example). 
	 * The lookup is really done by another function. This function only uses 
	 * it.
	 * 
	 * After the form and field digits are calculated the function evaluates
	 * the value of the transaction field specified in the array (if present)
	 * and calcualtes the counter part of the tid.
	 * 
	 * After the form and field digits and the counter part are calculated
	 * the whole tid is composed of the PHP-session_id, followed by the
	 * form-digit, the field-digit and the counter part.
	 * 
	 * After composing the tid is returned to the callee
	 * 
	 * @param array $request the request that has been send to the server
	 * 				must have at least the element with index "fieldId"
	 * @return string transactionId (tid)
	 */
	public static function calculateTid(array $request){
		//if session has not been started yet do it now
	 	if(session_id() == "")
			session_start();
		
		//first get the real ids of fields and form
		//for the form we take the http_referer value as the identifier for the form
	 	$formId = $_SERVER['HTTP_REFERER'];
		$fieldId = $request['fieldId'];
		//initialize the counter part to zero for the time being
		$serverCount = 0;
		
		//get the internalIds, which means integer representation of
		//the form and the field
		$internalIds = self::getInternalIds($formId, $fieldId);
		
		//format the values returned above, so that each has
		//three digits, padded with zeros if necessary
		$internalFormId = sprintf("%03d",$internalIds['formId']);
		$internalFieldId = sprintf("%03d",$internalIds['fieldId']);
		
		//check whether a counter value already exists in the session for 
		//the combination of form and field 		
		if(isset($_SESSION[$internalFormId.$internalFieldId])){
			//check whether the transaction attribute has been set in the
			//request	
			if(isset($request['transaction'])){
				//if yes we have to check the value of the attribute
				switch($request['transaction']){
					//if the value is current just set the serverCount variable
					//to the value saved in the session
					case "current" 	: $serverCount = $_SESSION[$internalFormId.$internalFieldId];
										break;
					//if the value is different from currrent (e.g. "new"), then get the value
					//from the session and increase it by one before writing it to the serverCount
					//variable
					default			: $serverCount = $_SESSION[$internalFormId.$internalFieldId] + 1;
										break;
				}
			} else {
				//if the transaction attribute has not been set in the request
				//just increase the counter as it would have if transaction
				//has been specified with a value different from "current"
				$serverCount = $_SESSION[$internalFormId.$internalFieldId] + 1;
			}
		}
		
		//after we have calculated the new value of serverCount variable
		//we write it's value into the session, so that further requests will use
		//the new (probably increased) value for the counter part calculation
		$_SESSION[$internalFormId.$internalFieldId] = $serverCount;
		
		//compose the tid
		$bc_sessionid =  session_id().
						 $internalFormId.
						 $internalFieldId.
						 sprintf("%08d",$serverCount);
		//return the tid			 
		return $bc_sessionid;
	 }
	 
	 /**
	  * This function is used to calculate the internal ids of a form and a field that belongs
	  * to that form.
	  * 
	  * The parameter values are used to index an multi-dimensional array, containing the
	  * internalIds of forms and fields.
	  * 
	  * Example:
	  * $_SESSION['forms'] {
 	  *	 	["http://localhost/OrwellJSClient/index.php"]=>
 	  *	  	array(2) {
      *			["formId"]=>
      *			int(0)
      *			["fields"]=>
      *			array(4) {
      *				["firstname"]=>
      *				int(0)
      *				["lastname"]=>
      *				int(1)
      *				["postcode"]=>
      *				int(2)
      *				["city"]=>
      *				int(3)
      *			}
  	  *		}
	  *	}
	  *
	  * A new array is added to the $_SESSION array, indexed by string values (for example
	  * the http_referer value). This array contains an element indexed by the string "formId",
	  * where the value of this element is the internal formId.
	  * The second element of this array is again an array, indexed by the fieldId-strings passed
	  * to this function. The value of those elements are the internal field Ids
	  * 
	  * The function does a lookup on this structure, creating new fields and sub arrays
	  * as necessary (if it doesn't find the formId or the fieldId in the appropriate array)
	  * 
	  * @param string $formId
	  * @param string $fieldId
	  * @return array  of integers with two elements, indexed with "formId" and "fieldId"
	  */
	 private static function getInternalIds($formId, $fieldId){
	 	$internalFormId = null;
		$internalFieldId = null;
		
		if(!isset($_SESSION['forms']))
			$_SESSION['forms'] = array();
		
		if(isset($_SESSION['forms'][$formId]))
			$internalFormId = $_SESSION['forms'][$formId]['formId'];
		else {
			$internalFormId = count($_SESSION['forms']);
			$_SESSION['forms'][$formId] = array();
			$_SESSION['forms'][$formId]['formId'] = $internalFormId;
			$_SESSION['forms'][$formId]['fields'] = array();
		}
		
		if(isset($_SESSION['forms'][$formId]['fields'][$fieldId]))
			$internalFieldId = $_SESSION['forms'][$formId]['fields'][$fieldId];
		else {
			$internalFieldId = count($_SESSION['forms'][$formId]['fields']);
			$_SESSION['forms'][$formId]['fields'][$fieldId] = $internalFieldId;
		}
		
		return array("formId"=>$internalFormId,"fieldId"=>$internalFieldId);
	 }
	 
	 /**
	  * currently not in use
	  * 
	  * function which would enable the calculation of the tid to work
	  * without the need for the client to specify the transaction attribute
	  * 
	  * problem is, that a change of input fields, like this
	  * 	firstfield->secondfield->firstfield
	  * where no changes occur in the secondfield can not be tracked by the server
	  * because normally no communication between client and server takes place 
	  * in this situation (this problem is solved currently, by issuing a 
	  * request containing "startNewTransaction" as the value of the service field
	  * in an request 
	  * 
	  * @param string $internalFormId the 3 digit string for the internalFormId
	  * @param object $internalFieldId the 3 digit string for the internalFieldId
	  * @return string value of transaction either "new" or "current"
	  */
	 private static function calculateTransaction($internalFormId, $internalFieldId){
	 	/*var_dump($_SESSION);
		echo "internalFormId:".$internalFormId."\n";
		echo "internalFieldId:".$internalFieldId."\n";*/
		
		if(!isset($_SESSION['lastField'])){
			$_SESSION['lastField'] = $internalFormId.$internalFieldId;
		}
		
		$transaction = "new";
		if($_SESSION['lastField'] == ($internalFormId.$internalFieldId)){
			$transaction = "current";
		}
		
		$_SESSION['lastField'] =  $internalFormId.$internalFieldId;
		
		return $transaction;
	 }
}
?>