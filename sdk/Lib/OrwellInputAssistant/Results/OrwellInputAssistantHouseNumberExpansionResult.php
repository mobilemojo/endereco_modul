<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantHouseNumberExpansionResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		
		$elem = new OrwellInputAssistantHouseNumberExpansionResultElement();
			
		$elem->setPostCode($oiaWSresult->postCode);
		$elem->setCity($oiaWSresult->city);
		$elem->setStreet($oiaWSresult->street);
		$elem->setHouseNumber($oiaWSresult->houseNumber);
			
		$this->elements[] = $elem;	
		
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
	}

	/**
	 * @return OrwellInputAssistantHouseNumberExpansionResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}
}
?>