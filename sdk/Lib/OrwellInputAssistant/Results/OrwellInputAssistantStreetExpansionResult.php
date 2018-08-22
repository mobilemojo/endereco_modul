<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */
 
class OrwellInputAssistantStreetExpansionResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		
		for($i=0; $i<count($oiaWSresult->city); $i++){
			$elem = new OrwellInputAssistantStreetExpansionResultElement();
			
			$elem->setCity($oiaWSresult->city[$i]);
			$elem->setPostCode($oiaWSresult->postCode[$i]);
			$elem->setStreet($oiaWSresult->street[$i]);
			
			$this->elements[] = $elem;
		}
		
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
	}

	/**
	 * @return OrwellInputAssistantStreetExpansionResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}
}
?>