<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantBankCodeExpansionResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		
		for($i=0; $i < count($oiaWSresult->bankCode); $i++){
			$elem = new OrwellInputAssistantBankCodeExpansionResultElement();
			
			$elem->setBankName($oiaWSresult->bankName[$i]);
			$elem->setBankCode($oiaWSresult->bankCode[$i]);
			
			$this->elements[] = $elem;
		}
		
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
	}

	/**
	 * @return OrwellInputAssistantBankCodeExpansionResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}
}
?>