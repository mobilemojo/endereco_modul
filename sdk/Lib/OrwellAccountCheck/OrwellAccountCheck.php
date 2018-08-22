<?php

/*
 *	Created: 	22.12.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellAccountCheck {
	
	private $client = null;
	
	public function __construct(){
		$this->client = new SoapClient(ORWELL_ACCOUNTCHECK_URL);
	} 
	
	public function accountCheck(OrwellAccountCheckAccountCheckRequest $request){
		
		$result = $this->client->accountCheck(
						ORWELL_MANDATOR,
						ORWELL_LOGIN,
						ORWELL_PASSWORD,
						$request->getTid(),
						$request->getBankCode(),
						$request->getAccountNumber()
					);
		
		$oacResult = new OrwellAccountCheckAccountCheckResult($result);
		
		return $oacResult;
	}
}
?>