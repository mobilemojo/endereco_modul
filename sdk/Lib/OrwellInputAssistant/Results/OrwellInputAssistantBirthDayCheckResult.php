<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantBirthDayCheckResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		
		$elem = new OrwellInputAssistantBirthDayCheckResultElement();
		
		$elem->setBirthDay($oiaWSresult->birthDay);
		
		$this->elements[] = $elem;
		
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
	}
	/**
	 * @return OrwellInputAssistantBirthDayCheckResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}

}
?>