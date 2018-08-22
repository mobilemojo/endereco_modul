<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantPrephoneNumberCheckResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		
		$elem = new OrwellInputAssistantPrephoneNumberCheckResultElement();
		
		$elem->setPrephoneNumber($oiaWSresult->prephoneNumber);
		
		$this->elements[] = $elem;
		
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
	}

	/**
	 * @return OrwellInputAssistantPrephoneNumberCheckResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}
}
?>