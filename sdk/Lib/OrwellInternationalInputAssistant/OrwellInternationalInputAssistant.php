<?php

/*
 *	Created: 	11.02.2010
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

/**
 * Class OrwellInternationalInputAssistant
 * @internal
 */
class OrwellInternationalInputAssistant {
	
	private $client = null;
	
	public function __construct(){
		$this->client = new SoapClient(ORWELL_INTERNATIONALINPUTASSISTANT_URL);
	}
	
	public function postCodeExpansion(OrwellInternationalInputAssistantPostCodeExpansionRequest $request){
		$result = $this->client->postCodeExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getCountry(),
				$request->getPostCode(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiiar = new OrwellInputAssistantPostCodeCityExpansionResult($result);
		
		$this->workaround($oiiar, $request->getCountry());
		
		return $oiiar;
	}
	
	public function cityExpansion(OrwellInternationalInputAssistantCityExpansionRequest $request){
		$result = $this->client->cityExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getCountry(),
				$request->getCity(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiiar = new OrwellInputAssistantPostCodeCityExpansionResult($result);
		
		$this->workaround($oiiar, $request->getCountry());
		
		return $oiiar;
	}
	
	public function streetExpansion(OrwellInternationalInputAssistantStreetExpansionRequest $request){
		
		$result = $this->client->streetExpansion(
				ORWELL_MANDATOR,
				ORWELL_LOGIN,
				ORWELL_PASSWORD,
				$request->getTid(),
				$request->getCountry(),
				$request->getPostCode(),
				$request->getCity(),
				$request->getStreet(),
				$request->getMaxHits(),
				$request->getSearch(),
				$request->getSort(),
				$request->getEncoding()
				);
		
		$result->tid = $request->getTid();
		
		$oiiar = new OrwellInputAssistantStreetExpansionResult($result);
		
		$this->workaround($oiiar, $request->getCountry());
		
		return $oiiar;
	}
	
	private function workaround(OrwellAbstractResult $result, $country){
		if($country != "CH" && $country != "AT")
			return;
			
		foreach($result->getElements() as $elem){
			if(strlen($elem->getPostCode()) > 4)
				$elem->setPostCode(substr($elem->getPostCode(), 0, 4));
		}
		
	}
}
?>