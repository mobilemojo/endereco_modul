<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantFirstNameCheckResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		
		$elem = new OrwellInputAssistantFirstNameCheckResultElement();
		
		$elem->setFirstName($oiaWSresult->firstName);
		
		$this->elements[] = $elem;
		
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
		
	}

	/**
	 * @return OrwellInputAssistantFirstNameCheckResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}
}
?>