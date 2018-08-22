<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

/**
 * Class OrwellInputAssistant
 * @internal
 */
class OrwellInputAssistant {
	
	private $client = null;
	
	public function __construct(){
		$this->client = new SoapClient(ORWELL_INPUTASSISTANT_URL);
	}
	
	public function postCodeExpansion(OrwellInputAssistantPostCodeExpansionRequest $request){
		
		$result = $this->client->postCodeExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getPostCode(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding());
		
		$result->tid = $request->getTid();
		
		$oiaresult = new OrwellInputAssistantPostCodeCityExpansionResult($result);
		
		return $oiaresult;
	}
	
	public function cityExpansion(OrwellInputAssistantCityExpansionRequest $request){
		
		$result = $this->client->cityExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getCity(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiaresult = new OrwellInputAssistantPostCodeCityExpansionResult($result);
		
		return $oiaresult;
	}
	
	public function streetExpansion(OrwellInputAssistantStreetExpansionRequest $request){
		
		$result = $this->client->streetExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getPostCode(),
				$request->getCity(),
				$request->getStreet(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiaresult = new OrwellInputAssistantStreetExpansionResult($result);
		
		return $oiaresult;
	}
	
	public function houseNumberExpansion(OrwellInputAssistantHouseNumberExpansionRequest $request){
		
		$result = $this->client->houseNumberExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getPostCode(),
				$request->getCity(),
				$request->getStreet(),
				$request->getHouseNumber(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$ioaresult = new OrwellInputAssistantHouseNumberExpansionResult($result);
		
		return $ioaresult;
	}
	
	public function bankCodeExpansion(OrwellInputAssistantBankCodeExpansionRequest $request){
		
		$result = $this->client->bankCodeExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getBankCode(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiaresult = new OrwellInputAssistantBankCodeExpansionResult($result);
		
		return $oiaresult;
	}
	
	public function prephoneNumberCheck(OrwellInputAssistantPrephoneNumberCheckRequest $request){
		
		$result = $this->client->prephoneNumberCheck(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getPrephoneNumber(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiaresult = new OrwellInputAssistantPrephoneNumberCheckResult($result);
		
		return $oiaresult;
	}
	
	public function firstNameCheck(OrwellInputAssistantFirstNameCheckRequest $request){
		
		$result = $this->client->firstNameCheck(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getFirstName(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiaresult = new OrwellInputAssistantFirstNameCheckResult($result);
		
		return $oiaresult;
				
	}
	
	public function birthDayCheck(OrwellInputAssistantBirthDayCheckRequest $request){
		
		$result = $this->client->birthdayCheck(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getBirthday(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);	
		
		$result->tid = $request->getTid();
			
		$oiaresult = new OrwellInputAssistantBirthDayCheckResult($result);
		
		return $oiaresult;
	}
	
	public function emailAddressCheck(OrwellInputAssistantEmailAddressCheckRequest $request){
		
		$result = $this->client->emailAddressCheck(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getEmailAddress(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
			
		$oiaresult = new OrwellInputAssistantEmailAddressCheckResult($result);
		
		return $oiaresult;
	}
}
?>