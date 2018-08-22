<?php

/*
 *	Created: 	30.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */


/**
 * Class OrwellBankSearch
 * @internal
 */
class OrwellBankSearch {
	private $client = null;
	
	public function __construct(){
		//$this->client = new SoapClient(ORWELL_BANKSEARCH_URL);
		$this->client = new SoapClient(null, array(	'location' 	=> ORWELL_BANKSEARCH_URL,
													'uri'		=> ORWELL_PROTOCOL.'://'.ORWELL_DOMAIN.'/axis/services/OrwellInputAssistantV1_2',
													'style'		=> 'document',
													'use' 		=> 'literal' ));
	}
	
	public function bankSearchSingleFieldInput(OrwellBankSearchSingleFieldInputRequest $request){
		$reqArray = array(
					'mandator' => ORWELL_MANDATOR,
					'login' => ORWELL_LOGIN,
					'password' => ORWELL_PASSWORD,
					'tid' => $request->getTid(),
					'input' => $request->getInput(),
					'bankCodeFuzzy' => $request->getBankCodeFuzzy(),
					'bankFuzzy' => $request->getBankFuzzy(),
					'postCodeFuzzy' => $request->getPostCodeFuzzy(),
					'cityFuzzy' => $request->getCityFuzzy(),
					'bicFuzzy' => $request->getBicFuzzy(),
					'overallFuzzy' => $request->getOverallFuzzy(),
					'maxHits' => $request->getMaxHits(),
					'search' => $request->getSearch(),
					'sort' => $request->getSort(),
					'encoding' => $request->getEncoding()
			);
			
		$result = $this->client->__soapCall("bankSearchSingleFieldInput",$reqArray);
		
		$obsresult = new OrwellBankSearchResult($result);
		
		return $obsresult;
	}
	
	public function bankSearchMultiFieldInput(OrwellBankSearchMultiFieldInputRequest $request){
		
	}
}
?>